<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioPaymentMethodConfigTrait
 * Provides common properties and methods for Montonio payment methods.
 *
 * @since 2.0.0
 */
trait MontonioPaymentMethodConfigTrait
{
    /**
     * @var string The display name of the payment method.
     */
    protected $displayName;

    /**
     * @var string The title of the payment method displayed at checkout.
     */
    protected $title;

    /**
     * @var string The description of the payment method displayed at checkout.
     */
    protected $description;

    /**
     * @var string The configuration key used to store settings in the database.
     */
    protected $configKey;

    /**
     * @var string The name identifier for the payment method. This goes to the Montonio API.
     */
    protected $name;

    /**
     * @var string The URL to the payment method's logo.
     */
    protected $logoUrl;

    /**
     * @var array The supported currencies for the payment method.
     */
    protected $supportedCurrencies;

    /**
     * @var array The supported locales for the payment method.
     */
    protected $supportedLocales;

    /**
     * Check if the payment method is enabled.
     *
     * @since 2.0.0
     * @return boolean
     */
    public function isEnabled()
    {
        return Configuration::get($this->getConfigKey() . '_ENABLED') === '1';
    }

    /**
     * Check if the payment method should show the logo at checkout.
     *
     * @since 2.0.0
     * @return boolean
     */
    public function shouldShowLogo()
    {
        return Configuration::get($this->getConfigKey() . '_SHOW_LOGO') === '1';
    }

    /**
     * Get the display name of the payment method.
     *
     * @since 2.0.0
     * @return string The display name of the payment method.
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Get the title of the payment method displayed at checkout.
     *
     * @since 2.0.0
     * @return string The title of the payment method.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the description of the payment method displayed at checkout.
     *
     * @since 2.0.0
     * @return string The description of the payment method.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the configuration key used to store settings in the database.
     *
     * @since 2.0.0
     * @return string The configuration key.
     */
    public function getConfigKey()
    {
        return $this->configKey;
    }

    /**
     * Get the name identifier for the payment method.
     *
     * @since 2.0.0
     * @return string The name identifier.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the URL to the payment method's logo.
     *
     * @since 2.0.0
     * @return string The logo URL.
     */
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * Get the supported currencies for the payment method.
     *
     * @since 2.0.0
     * @return array The supported currencies.
     */
    public function getSupportedCurrencies()
    {
        return $this->supportedCurrencies;
    }

    /**
     * Get the supported locales for the payment method.
     *
     * @since 2.0.0
     * @return array The supported locales.
     */
    public function getSupportedLocales()
    {
        return $this->supportedLocales;
    }
}
