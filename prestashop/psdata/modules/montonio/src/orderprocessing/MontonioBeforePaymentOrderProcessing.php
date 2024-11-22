<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioBeforePaymentOrderProcessing - handles the order processing before the payment is made
 *
 * @since 2.0.0
 */
class MontonioBeforePaymentOrderProcessing implements MontonioOrderProcessingStrategy
{
    public function onPlaceOrderClicked()
    {
        $context = Context::getContext();
        $cartId = $context->cart->id;
        $this->checkIfOrderExists($cartId);

        $paymentMethod = MontonioPaymentMethodHelper::getMontonioPaymentMethod(Tools::getValue('method'));
        $module = MontonioHelper::getMontonioModule();

        $wasPlaceOrderSuccessful = $module->validateOrder(
            $context->cart->id,
            Configuration::get('PS_OS_MONTONIO_PAYMENT_PENDING'),
            $context->cart->getOrderTotal(),
            $paymentMethod->getDisplayName(),
            null,
            null,
            null,
            false,
            $context->customer->secure_key
        );

        if (!$wasPlaceOrderSuccessful) {
            throw new PrestaShopException('Failed to place order with ' . $paymentMethod->getName());
        }

        $orderId = $module->currentOrder;
        $order = new Order($orderId);
        $merchantReference = $this->getMerchantReference($order);
        $result = $paymentMethod->placeOrder($merchantReference);

        if ($result['status'] >= 200 && $result['status'] < 300) {
            MontonioOrdersTableManager::upsertMontonioOrder(array(
                'montonio_order_uuid' => $result['body']['uuid'],
                'payment_method' => $paymentMethod->getName(),
                'cart_id' => $context->cart->id,
                'order_reference' => $order->reference,
                'order_id' => $orderId,
            ));
        } else {
            $order->setCurrentState(Configuration::get('PS_OS_ERROR'));
            $order->save();
        }

        MontonioHelper::setCookie('montonio_last_cart_id', $cartId);

        return $result;
    }

    /**
     * Get the merchant reference according to the configuration setting. Adds the order prefix if set.
     *
     * @since 2.0.0
     * @param Order $order The order object
     * @return string|int The merchant reference
     */
    private function getMerchantReference($order)
    {
        $merchantReferenceType = Configuration::get('MONTONIO_MERCHANT_REFERENCE_TYPE');
        $orderPrefix = Configuration::get('MONTONIO_ORDER_PREFIX');
        $merchantReference = $order->reference;

        if ('cart_id' === $merchantReferenceType) {
            $merchantReference = $order->id_cart;
        } elseif ('order_id' === $merchantReferenceType) {
            $merchantReference = $order->id;
        }

        return MontonioOrderPrefixManager::addPrefix($orderPrefix, $merchantReference);
    }

    /**
     * Check if the order already exists for the given cart ID.
     *
     * @since 2.0.0
     * @param int $cartId The cart ID.
     * @throws Exception If the order already exists.
     */
    private function checkIfOrderExists($cartId)
    {
        if (Context::getContext()->cart->orderExists() || MontonioOrdersTableManager::getRowByCartId($cartId)) {
            throw new PrestaShopException('This cart has already been transformed into a Montonio order and cannot be used again.');
        }
    }

}
