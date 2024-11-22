<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioPaymentMethodHelper
{
    /**
     * Checks if the payment method belongs to Montonio
     *
     * @since 2.0.0
     * @param string $method the payment method
     * @return bool Returns true if the payment method belongs to Montonio, false otherwise
     */
    public static function isMontonioPaymentMethod($method)
    {
        $module = MontonioHelper::getMontonioModule();
        $methods = $module->paymentMethodRegistry->getPaymentMethodNames();

        return in_array($method, $methods);
    }

    /**
     * Checks if it is time to sync payment methods
     *
     * @since 2.0.0
     * @return bool Returns true if 24 hours have passed since the last sync or if the environment has changed, false otherwise
     */
    public static function isTimeToSyncPaymentMethods()
    {
        $environmentThatWasUsedToSync = Configuration::get('MONTONIO_LAST_SYNCED_AT_ENVIRONMENT');
        $lastSyncedAt = Configuration::get('MONTONIO_LAST_SYNCED_AT_TIMESTAMP');
        $currentTimestamp = time();

        if (Configuration::get('MONTONIO_ENVIRONMENT') !== $environmentThatWasUsedToSync) {
            return true;
        }

        return !$lastSyncedAt || ($currentTimestamp - $lastSyncedAt) > 24 * 60 * 60; // 24 hours
    }

    /**
     * Gets the Montonio payment method
     *
     * @since 2.0.0
     * @param string $method the payment method as defined in Montonio's payment method registry
     * @return MontonioAbstractPaymentMethod the Montonio payment method
     * @throws Exception if the payment method is not found
     */
    public static function getMontonioPaymentMethod($method)
    {
        $module = MontonioHelper::getMontonioModule();
        return $module->paymentMethodRegistry->getPaymentMethod($method);
    }

    /**
     * Get the specific Montonio Payment Method that was used for the order.
     *
     * @since 2.0.0
     * @since 2.0.5 Now returns null if the Montonio order is not found instead of throwing an exception.
     * @param Order $order The order to get the payment method from.
     * @return MontonioAbstractPaymentMethod|null The Montonio payment method or null if not found.
     */
    public static function getPaymentMethodByOrder($order)
    {
        $montonioOrder = MontonioOrdersTableManager::getRowByOrderReference($order->reference);
        if (!$montonioOrder) {
            return null;
        }

        return self::getMontonioPaymentMethod($montonioOrder['payment_method']);
    }
}
