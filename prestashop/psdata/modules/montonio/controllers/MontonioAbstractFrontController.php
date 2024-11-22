<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Abstract class for Montonio front controllers
 *
 * @since 2.0.0
 */
abstract class MontonioAbstractFrontController extends ModuleFrontController
{
    /**
     * Validate that the customer object is loaded.
     *
     * @since 2.0.0
     * @param Customer $customer The customer object
     * @throws Exception if the customer is not loaded
     */
    protected function validateCustomerIsLoaded($customer)
    {
        if (!Validate::isLoadedObject($customer)) {
            throw new PrestaShopException(MontonioHelper::translate('Failed to validate customer'));
        }
    }

    /**
     * Validate that the customer keys match.
     *
     * @since 2.0.0
     * @param string $key1 The first customer key
     * @param string $key2 The second customer key
     * @throws Exception if the customer keys do not match
     */
    protected function validateCustomerKeysMatch($key1, $key2)
    {
        if ($key1 !== $key2) {
            throw new PrestaShopException(MontonioHelper::translate('Failed to validate customer key'));
        }
    }

    /**
     * Validate the cart properties.
     *
     * @since 2.0.0
     * @param Cart $cart The cart object
     * @param array $properties The list of properties to check
     * @throws Exception if any cart property is missing or empty
     */
    protected function validateCartProperties($cart, $properties)
    {
        foreach ($properties as $property) {
            if (empty($cart->{$property})) {
                throw new PrestaShopException(MontonioHelper::translate('Failed to validate cart. Missing:' . $property));
            }
        }
    }

    /**
     * Validate that the payment method belongs to Montonio's payment method registry.
     *
     * @since 2.0.0
     * @param string $method The payment method name
     * @throws Exception if the payment method is not valid
     */
    protected function validatePaymentMethod($method)
    {
        if (!MontonioPaymentMethodHelper::getMontonioPaymentMethod($method)) {
            throw new PrestaShopException(MontonioHelper::translate('Failed to validate payment method'));
        }
    }

    /**
     * Validate that the payment method is available for placing an order.
     *
     * @since 2.0.0
     * @param string $method The payment method name
     * @throws Exception if the payment method is not available
     */
    protected function validatePaymentMethodIsAvailable($method)
    {
        $paymentMethod = MontonioPaymentMethodHelper::getMontonioPaymentMethod($method);
        if (!$paymentMethod->isEnabled() || !$paymentMethod->isCartCurrencySupported()) {
            throw new PrestaShopException(MontonioHelper::translate('Failed to validate payment method'));
        }
    }

    /**
     * Validate that the payment intent UUID is present for embedded payments.
     *
     * @since 2.0.0
     * @param string $method The payment method name
     * @throws Exception if the payment intent UUID is missing for embedded payments
     */
    protected function validatePaymentIntentUuid($method)
    {
        $paymentMethod = MontonioPaymentMethodHelper::getMontonioPaymentMethod($method);
        if ($paymentMethod->isEmbedded() && empty(Tools::getValue('paymentIntentUuid'))) {
            throw new PrestaShopException(MontonioHelper::translate('Missing payment intent UUID which is required for embedded payments'));
        }
    }
}
