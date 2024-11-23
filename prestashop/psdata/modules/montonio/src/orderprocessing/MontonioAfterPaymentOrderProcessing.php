<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioAfterPaymentOrderProcessing implements MontonioOrderProcessingStrategy
{
    public function onPlaceOrderClicked()
    {
        $context = Context::getContext();
        $montonioOrder = MontonioOrdersTableManager::getRowByCartId($context->cart->id);
        $orderReference = $montonioOrder ? $montonioOrder['order_reference'] : MontonioHelper::generateOrderReference();
        $merchantReference = $this->getMerchantReference($orderReference, $context->cart->id);
        $paymentMethod = MontonioPaymentMethodHelper::getMontonioPaymentMethod(Tools::getValue('method'));
        $result = $paymentMethod->placeOrder($merchantReference);

        if ($result['status'] >= 200 && $result['status'] < 300) {
            MontonioOrdersTableManager::upsertMontonioOrder(array(
                'montonio_order_uuid' => $result['body']['uuid'],
                'payment_method' => $paymentMethod->getName(),
                'cart_id' => $context->cart->id,
                'order_reference' => $orderReference,
            ));
        }

        return $result;
    }

    /**
     * Get the merchant reference according to the configuration setting. Adds the order prefix if set.
     *
     * @since 2.0.0
     * @param string $orderReference The order reference
     * @param int $cartId The cart ID
     * @return string|int The merchant reference
     */
    private function getMerchantReference($orderReference, $cartId)
    {
        $merchantReferenceType = Configuration::get('MONTONIO_MERCHANT_REFERENCE_TYPE');
        $orderPrefix = Configuration::get('MONTONIO_ORDER_PREFIX');
        $merchantReference = 'cart_id' === $merchantReferenceType ? $cartId : $orderReference;

        return MontonioOrderPrefixManager::addPrefix($orderPrefix, $merchantReference);
    }
}
