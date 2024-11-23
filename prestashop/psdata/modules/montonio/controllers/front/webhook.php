<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioWebhookModuleFrontController - for handling the return from Montonio's payment gateway
 *
 * @since 2.0.0
 */
class MontonioWebhookModuleFrontController extends MontonioAbstractFrontController
{

    /**
     * Validate coming back from Montonio's payment gateway
     *
     * @since 2.0.0
     * @since 2.0.1 Lock is now released if an exception occurs.
     * @return void
     */
    public function postProcess()
    {
        $orderTokenData = $this->decodeOrderToken();
        try {
            if ($orderTokenData) {
                $this->validateCallback($orderTokenData);
                $this->processCallback($orderTokenData);
            }
        } catch (Exception $e) {
            // release the lock if it was acquired
            $lockManager = new MontonioLocksTableManager();
            $this->logAndRedirect($e->getMessage(), $lockManager, $orderTokenData->uuid);
        }
    }

    private function validateCallback($orderTokenData)
    {
        try {
            if (!$this->module->active) {
                http_response_code(500);
                exit('Montonio is not active.');
            }

            $cart = new Cart(Tools::getValue('id_cart'));
            $customerKey = Tools::getValue('key');
            $customer = new Customer($cart->id_customer);

            $this->validateCustomerKeysMatch($cart->secure_key, $customerKey);
            $this->validateCustomerIsLoaded($customer);
            $this->validatePaymentMethod(Tools::getValue('method'));
        } catch (Exception $e) {
            $this->logAndRedirect($e->getMessage());
        }
    }

    /**
     * Process the order
     *
     * @since 2.0.0
     * @param object $orderTokenData The decoded order token data.
     * @param int $retry The number of retries.
     * @return void
     */
    private function processCallback($orderTokenData, $retry = 0)
    {
        $lockManager = new MontonioLocksTableManager();
        if ($this->acquireLockWithRetry($lockManager, $orderTokenData->uuid, $retry)) {
            $this->processOrder($orderTokenData, $lockManager);
            if (in_array($orderTokenData->paymentStatus, array('AUTHORIZED', 'PAID'))) {
                $lockManager->releaseLock($orderTokenData->uuid);
                $this->redirectCustomerToConfirmation();
            } else {
                $this->logAndRedirect(
                    'Unable to finish the payment. Please try again or choose a different payment method.',
                    $lockManager,
                    $orderTokenData->uuid,
                    1
                );
            }
        }
    }

    /**
     * Acquire lock with retry mechanism
     *
     * @since 2.0.0
     * @param MontonioLocksTableManager $lockManager
     * @param string $uuid
     * @param int $retry
     * @return bool
     */
    private function acquireLockWithRetry($lockManager, $uuid, $retry)
    {
        try {
            if ($lockManager->acquireLock($uuid)) {
                return true;
            }

            if ($retry < 20) {
                sleep(1);
                return $this->acquireLockWithRetry($lockManager, $uuid, $retry + 1);
            } else {
                MontonioLogger::addLog('Failed to acquire lock for order ' . $uuid, 3);
                http_response_code(503);
                die();
            }
        } catch (Exception $e) {
            MontonioLogger::addLog(
                'Unhandled exception occurred while acquiring lock for order ' . $uuid . ': ' . $e->getMessage(),
                3
            );
            http_response_code(503);
            die();
        }

        return false;
    }

    /**
     * Handle the actual order processing
     *
     * @since 2.0.0
     * @param object $orderTokenData
     * @param MontonioLocksTableManager $lockManager
     * @return void
     */
    private function processOrder($orderTokenData, $lockManager)
    {
        $cart = new Cart(Tools::getValue('id_cart'));
        $paymentStatus = $orderTokenData->paymentStatus;
        if ($this->isOrderAlreadyCreated($cart)) {
            $order = MontonioOrderHelper::getOrderByCartId($cart->id);
            if (MontonioOrderHelper::shouldUpdateOrderStatus($order, $paymentStatus)) {
                $newOrderStatus = MontonioOrderHelper::getNewOrderStatus($paymentStatus);
                if ($newOrderStatus) {
                    $order->setCurrentState($newOrderStatus);
                }
            }
        } else {
            if (in_array($paymentStatus, array('AUTHORIZED', 'PAID'))) {
                $newOrderStatus = MontonioOrderHelper::getNewOrderStatus($paymentStatus);
                if ($newOrderStatus) {
                    $this->createNewOrder($cart, $orderTokenData, $newOrderStatus);
                } else {
                    $this->logAndRedirect('Unexpected error happened. Please contact the store owner.', $lockManager, $orderTokenData->uuid);
                    return;
                }
            } else {
                $this->logAndRedirect('Unable to finish the payment. Please try again or choose a different payment method.', $lockManager, $orderTokenData->uuid, 1);
                return;
            }
        }
    }

    /**
     * Check if an order is already created for the cart
     *
     * @since 2.0.0
     * @param Cart $cart
     * @return bool
     */
    private function isOrderAlreadyCreated($cart)
    {
        // OrderExists will cache the result, so we need to clear the cache key to get up to date information.
        MontonioHelper::clearCacheKey('Cart::orderExists_' . $cart->id);
        if ($cart->OrderExists()) {
            return true;
        }

        return false;
    }

    /**
     * Create a new order
     *
     * @since 2.0.0
     * @param Cart $cart The cart object.
     * @param object $orderTokenData The decoded order token data.
     * @param int $orderStatus The order status.
     * @return void
     */
    private function createNewOrder($cart, $orderTokenData, $orderStatus)
    {
        // Shipping modules' Integration ********************************************************
        $extraData = Tools::getValue('extra_data', []);
        foreach ($extraData as $key => $value) {
            Context::getContext()->cookie->$key = $value;
        }
        // /Shipping modules' Integration *******************************************************
        $method = Tools::getValue('method');
        $montonioModule = MontonioHelper::getMontonioModule();
        $paymentMethod = $montonioModule->paymentMethodRegistry->getPaymentMethod($method);
        $this->module->validateOrder(
            $cart->id,
            $orderStatus,
            $orderTokenData->grandTotal,
            $paymentMethod->getNameForPlacingOrder($orderTokenData),
            null,
            array(
                'transaction_id' => $orderTokenData->uuid,
            ),
            null,
            false,
            $cart->secure_key
        );

        // Check if the order moved to PS_OS_ERROR due to amount mismatch
        $order = MontonioOrderHelper::getOrderByCartId($cart->id);
        if ($order->getCurrentState() === Configuration::get('PS_OS_ERROR')) {
            MontonioLogger::addLog('Order amount mismatch. Cart ID: ' . $cart->id . ', Order ID: ' . $order->id, 4);
            $order->setCurrentState(Configuration::get('PS_OS_MONTONIO_PAYMENT_AMOUNT_ERROR'));
        }

        MontonioOrdersTableManager::updateMontonioOrder(array(
            'cart_id' => $cart->id,
            'order_id' => $order->id,
            'montonio_order_uuid' => $orderTokenData->uuid,
            'payment_provider_name' => $orderTokenData->paymentProviderName,
            'payment_status' => $orderTokenData->paymentStatus,
        ));
    }

    /**
     * Redirect the customer to the order confirmation page
     *
     * @since 2.0.0
     * @param Cart $cart
     * @return void
     */
    private function redirectCustomerToConfirmation()
    {
        $cart = new Cart(Tools::getValue('id_cart'));
        $orderId = MontonioOrderHelper::getOrderIdByCartId($cart->id);
        // This is done so that we wouldn't restore the cart from the cookie in the confirmation page.
        // Order paid for successfully - no need to restore the cart.
        MontonioHelper::clearCookie('montonio_last_cart_id');
        MontonioCheckoutHelper::redirectCustomerToThankyouPage(
            $cart->id,
            $orderId,
            Tools::getValue('id_module'),
            Tools::getValue('key')
        );
    }

    /**
     * Validate the order token and redirect the customer to the cart if it's invalid
     *
     * @since 2.0.0
     * @return object|void Returns the decoded order token data if it's valid, otherwise redirects the customer to the cart.
     */
    private function decodeOrderToken()
    {
        $orderToken = Tools::getValue('order-token');
        $idCart = Tools::getValue('id_cart');

        if (!$orderToken) {
            $this->logAndRedirect('Unable to verify integrity of the request - missing order token');
            return;
        }

        try {
            $data = $this->getDecodedOrderTokenData($orderToken);
            if (!$this->isOrderTokenValid($data, $idCart)) {
                $this->logAndRedirect('Unable to verify integrity of the request - invalid cart or order token');
                return;
            }

            return $data;
        } catch (Exception $e) {
            MontonioLogger::addLog($e->getMessage(), 3);
            MontonioCheckoutHelper::showErrorPage($this, array($e->getMessage()));
            return;
        }
    }

    /**
     * Log error and redirect customer to cart
     *
     * @since 2.0.0
     * @param string $message
     * @param MontonioLocksTableManager|null $lockManager
     * @param string|null $uuid
     * @return void
     */
    private function logAndRedirect($message, $lockManager = null, $uuid = null, $severity = 3)
    {
        MontonioLogger::addLog($message, $severity);

        if ($lockManager && $uuid) {
            $lockManager->releaseLock($uuid);
        }

        MontonioCheckoutHelper::showErrorPage($this, array($message));
    }

    /**
     * Get decoded order token data
     *
     * @since 2.0.0
     * @param string $orderToken
     * @return object
     */
    private function getDecodedOrderTokenData($orderToken)
    {
        $api = new MontonioStargateApi(
            Configuration::get('MONTONIO_ACCESS_KEY'),
            Configuration::get('MONTONIO_SECRET_KEY'),
            Configuration::get('MONTONIO_ENVIRONMENT')
        );

        return $api->decodeOrderToken($orderToken);
    }

    /**
     * Validate if the order token matches the cart ID
     *
     * @since 2.0.0
     * @param object $data
     * @param int $idCart
     * @return bool
     */
    private function isOrderTokenValid($data, $idCart)
    {
        $montonioOrderUuid = $data->uuid;
        $montonioOrder = MontonioOrdersTableManager::getRowByMontonioOrderUuid($montonioOrderUuid);

        return $montonioOrder && $montonioOrder['cart_id'] == $idCart;
    }
}
