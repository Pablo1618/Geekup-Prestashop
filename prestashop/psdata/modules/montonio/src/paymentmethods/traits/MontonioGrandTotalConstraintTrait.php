<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioGrandTotalConstraintTrait - Provides methods for checking if the cart total is within the constraints.
 *
 * @since 2.0.0
 */
trait MontonioGrandTotalConstraintTrait
{
    /**
     * Get the configuration key for the payment method.
     *
     * @since 2.0.0
     * @var array The default grand total constraints.
     */
    protected $defaultGrandTotalConstraints;

    /**
     * Get the grand total constraints.
     *
     * @since 2.0.0
     * @return array|null Array with min and max values or null if not set.
     */
    public function getGrandTotalConstraints()
    {
        $min = $this->getGrandTotalMin();
        $max = $this->getGrandTotalMax();

        if (null === $min || null === $max) {
            return $this->getDefaultGrandTotalConstraints();
        }

        return array('min' => $min, 'max' => $max);
    }

    /**
     * Get the minimum grand total from configuration.
     *
     * @since 2.0.0
     * @return float|null
     */
    private function getGrandTotalMin()
    {
        return $this->getValidatedFloat(Configuration::get($this->getConfigKey() . '_GRAND_TOTAL_MIN'));
    }

    /**
     * Get the maximum grand total from configuration.
     *
     * @since 2.0.0
     * @return float|null
     */
    private function getGrandTotalMax()
    {
        return $this->getValidatedFloat(Configuration::get($this->getConfigKey() . '_GRAND_TOTAL_MAX'));
    }

    /**
     * Validates and converts a configuration value to a float.
     *
     * @since 2.0.0
     * @param mixed $value The configuration value to validate and convert.
     * @return float|null The float value if valid, or null if not.
     */
    private function getValidatedFloat($value)
    {
        if (null === $value || false === $value || '' === $value) {
            return null;
        }

        $floatValue = (float) $value;
        return is_numeric($value) ? $floatValue : null;
    }

    /**
     * Check if the cart total is within the constraints.
     *
     * @since 2.0.0
     * @return bool
     *     - True if the cart total is within the constraints
     *     - True if any of the constraints is empty
     *     - False if the cart total is outside the constraints
     */
    public function isGrandTotalInConstraints()
    {
        $cart = Context::getContext()->cart;
        $grandTotal = $cart->getOrderTotal(true, Cart::BOTH);
        $constraints = $this->getGrandTotalConstraints();

        if (empty($constraints)) {
            return true;
        }

        return $this->isWithinConstraints($grandTotal, $constraints);
    }

    /**
     * Determine if a value is within the specified constraints.
     *
     * @since 2.0.0
     * @param float $value The value to check.
     * @param array $constraints The constraints array with 'min' and 'max'.
     * @return bool
     */
    private function isWithinConstraints($value, $constraints)
    {
        $min = $constraints['min'];
        $max = $constraints['max'];

        return $value >= $min && $value <= $max;
    }

    /**
     * Get the configuration fields for the grand total constraints.
     *
     * @since 2.0.0
     * @return array
     */
    public function getGrandTotalConfig()
    {
        return array(
            array(
                'type' => 'text',
                'label' => MontonioHelper::translate('Minimum Grand Total'),
                'desc' => MontonioHelper::translate('Set the minimum grand total for the payment method to be available'),
                'name' => $this->getConfigKey() . '_GRAND_TOTAL_MIN',
                'required' => 'true',
            ),
            array(
                'type' => 'text',
                'label' => MontonioHelper::translate('Maximum Grand Total'),
                'desc' => MontonioHelper::translate('Set the maximum grand total for the payment method to be available'),
                'name' => $this->getConfigKey() . '_GRAND_TOTAL_MAX',
                'required' => 'true',
            ),
        );
    }

    /**
     * Get the default grand total constraints for module configuration.
     *
     * @since 2.0.0
     * @return array|null Array with min and max values or null if not set.
     */
    public function getDefaultGrandTotalConfig()
    {
        $defaultConstraints = $this->getDefaultGrandTotalConstraints();

        if (empty($defaultConstraints)) {
            return array(
                $this->getConfigKey() . '_GRAND_TOTAL_MIN' => '',
                $this->getConfigKey() . '_GRAND_TOTAL_MAX' => '',
            );
        }

        return array(
            $this->getConfigKey() . '_GRAND_TOTAL_MIN' => $defaultConstraints['min'],
            $this->getConfigKey() . '_GRAND_TOTAL_MAX' => $defaultConstraints['max'],
        );
    }

    /**
     * Get the default grand total constraints.
     *
     * @since 2.0.0
     * @return array|null
     */
    protected function getDefaultGrandTotalConstraints()
    {
        return $this->defaultGrandTotalConstraints;
    }
}
