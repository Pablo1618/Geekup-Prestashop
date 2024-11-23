<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioRefundablePaymentMethodTrait - provides methods to handle refunds for Montonio payment methods.
 *
 * @since 2.0.0
 */
trait MontonioRefundablePaymentMethodTrait
{
    /**
     * Check if the payment method is refundable.
     *
     * @since 2.0.0
     * @return bool True if refundable, false otherwise.
     */
    public function isRefundable()
    {
        return $this->isRefundsEnabled();
    }

    /**
     * Create a refund for an order.
     *
     * @since 2.0.0
     * @param Order $order The order object.
     * @param float $amount The amount to refund.
     * @return array|null The refund response or null if the refund failed.
     */
    public function createRefund($order, $amount)
    {
        $montonioOrder = $this->getMontonioOrderByCartId($order->id_cart);
        if (!$this->validateMontonioOrder($montonioOrder)) {
            MontonioLogger::addLog('Failed to create refund: Montonio order data is invalid.', 3);
            return null;
        }

        return $this->initializeMontonioApi()->createRefund($montonioOrder['montonio_order_uuid'], $amount);
    }

    /**
     * Check if refunds are enabled in the configuration.
     *
     * @since 2.0.0
     * @return bool True if refunds are enabled, false otherwise.
     */
    private function isRefundsEnabled()
    {
        return Configuration::get('MONTONIO_REFUNDS_ENABLED') === '1';
    }

    /**
     * Get Montonio order data by cart ID.
     *
     * @since 2.0.0
     * @param int $cartId The cart ID.
     * @return array|null The Montonio order data or null if not found.
     */
    private function getMontonioOrderByCartId($cartId)
    {
        return MontonioOrdersTableManager::getRowByCartId($cartId);
    }

    /**
     * Initialize the Montonio API client.
     *
     * @since 2.0.0
     * @return MontonioStargateApi The Montonio API client.
     */
    private function initializeMontonioApi()
    {
        return new MontonioStargateApi(
            Configuration::get('MONTONIO_ACCESS_KEY'),
            Configuration::get('MONTONIO_SECRET_KEY'),
            Configuration::get('MONTONIO_ENVIRONMENT')
        );
    }

    /**
     * Validate Montonio order data.
     *
     * @since 2.0.0
     * @param array $montonioOrder The Montonio order data.
     * @return bool True if the order data is valid, false otherwise.
     */
    private function validateMontonioOrder($montonioOrder)
    {
        return isset($montonioOrder['montonio_order_uuid']);
    }
}
