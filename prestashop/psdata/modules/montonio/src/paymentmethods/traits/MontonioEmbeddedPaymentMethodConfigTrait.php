<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioEmbeddedPaymentMethodConfigTrait
 * Provides common properties and methods for Montonio embedded payment methods.
 *
 * @since 2.0.0
 */
trait MontonioEmbeddedPaymentMethodConfigTrait
{
    use MontonioPaymentMethodConfigTrait;

    /**
     * Sometimes the logo is different for embedded payment methods than for regular payment methods.
     *
     * @since 2.0.0
     * @var string The URL to the embedded payment method's logo.
     */
    protected $embeddedLogoUrl;

    /**
     * Check if the payment method is embedded.
     *
     * @since 2.0.0
     * @return boolean
     */
    public function isEmbedded()
    {
        return Configuration::get($this->getConfigKey() . '_IN_CHECKOUT') === '1';
    }

    /**
     * Get the URL to the payment method's logo.
     *
     * @since 2.0.0
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->isEmbedded() ? $this->embeddedLogoUrl : $this->logoUrl;
    }
}
