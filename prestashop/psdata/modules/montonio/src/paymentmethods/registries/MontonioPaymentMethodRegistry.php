<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Montonio payment method registry
 *
 * @since 2.0.0
 */
class MontonioPaymentMethodRegistry
{
    /**
     * Registered payment methods
     *
     * @since 2.0.0
     * @var array<string, MontonioAbstractPaymentMethod>
     */
    private $paymentMethods = [];

    /**
     * Register a payment method
     *
     * @since 2.0.0
     * @param MontonioAbstractPaymentMethod $method Payment method instance
     */
    public function registerPaymentMethod($method)
    {
        $this->paymentMethods[$method->getName()] = $method;
    }

    /**
     * Get payment method by name
     *
     * @since 2.0.0
     * @param string $name Payment method name
     * @return MontonioAbstractPaymentMethod
     * @throws Exception If payment method is not found
     */
    public function getPaymentMethod($name)
    {
        if (!isset($this->paymentMethods[$name])) {
            throw new PrestaShopException("Payment method not found: " . $name);
        }

        return $this->paymentMethods[$name];
    }

    /**
     * Get all registered payment methods in the default order
     * @since 2.0.0
     * @return array<string, MontonioAbstractPaymentMethod> All registered payment methods
     */
    public function getAllPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * Get default order of payment methods
     *
     * @since 2.0.0
     * @return string Default order of payment methods
     */
    public function getDefaultOrder()
    {
        return 'paymentInitiation,cardPayments,blik,bnpl,hirePurchase';
    }

    /**
     * Get all payment methods in current order
     *
     * @since 2.0.0
     * @return array<string, MontonioAbstractPaymentMethod> All payment methods in current order
     */
    public function getAllPaymentMethodsInCurrentOrder()
    {
        $currentOrder = Configuration::get('MONTONIO_PAYMENT_METHODS_ORDER');
        $currentOrder = $currentOrder ? explode(',', $currentOrder) : [];
        $allMethods = $this->getAllPaymentMethods();

        if (empty($currentOrder)) {
            $currentOrder = array_map(function ($method) {
                return $method->getName();
            }, $allMethods);
        }

        usort($allMethods, function ($a, $b) use ($currentOrder) {
            $aIndex = array_search($a->getName(), $currentOrder);
            $bIndex = array_search($b->getName(), $currentOrder);

            // Ensure we have integers for comparison
            $aIndex = (false !== $aIndex) ? (int)$aIndex : PHP_INT_MAX;
            $bIndex = (false !== $bIndex) ? (int)$bIndex : PHP_INT_MAX;

            // Compare based on the indices
            return $aIndex - $bIndex;
        });


        return $allMethods;
    }

    /**
     * Get all registered payment method names
     *
     * @since 2.0.0
     * @return array<string> All registered payment method names
     */
    public function getPaymentMethodNames()
    {
        return array_keys($this->paymentMethods);
    }
}
