<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioConfiguration
{
    /**
     * Get default shop config
     *
     * @since 2.0.0
     * @return array Default shop config
     */
    public static function getDefaultShopConfig()
    {
        $config = array(
            'MONTONIO_ACCESS_KEY' => '',
            'MONTONIO_SECRET_KEY' => '',
            'MONTONIO_ENVIRONMENT' => '',
            'MONTONIO_ORDER_PREFIX' => '',
            'MONTONIO_REFUNDS_ENABLED' => '0',
            'MONTONIO_ADVANCED_ORDER_CONFIRMATION_PAGE' => 'order-detail',
            'MONTONIO_PRESELECTED_PAYMENT_METHOD' => '',
            'MONTONIO_ORDER_PROCESSING_STRATEGY' => 'after_payment',
            'MONTONIO_MERCHANT_REFERENCE_TYPE' => 'order_reference',
            'MONTONIO_PAYMENT_METHODS_ORDER' => MontonioHelper::getMontonioModule()->paymentMethodRegistry->getDefaultOrder(),

            'MONTONIO_BLIK_ENABLED' => false,
            'MONTONIO_BLIK_SHOW_LOGO' => '1',
            'MONTONIO_BLIK_IN_CHECKOUT' => '0',

            'MONTONIO_BNPL_ENABLED' => false,
            'MONTONIO_BNPL_SHOW_LOGO' => '1',
            'MONTONIO_BNPL_STYLE' => 'grid_logos',

            'MONTONIO_CARD_PAYMENTS_ENABLED' => false,
            'MONTONIO_CARD_PAYMENTS_SHOW_LOGO' => '1',
            'MONTONIO_CARD_PAYMENTS_IN_CHECKOUT' => '0',

            'MONTONIO_FINANCING_ENABLED' => '0',
            'MONTONIO_FINANCING_SHOW_LOGO' => '1',

            'MONTONIO_PAYMENTS_ENABLED' => false,
            'MONTONIO_PAYMENTS_STYLE' => 'show_banklist',
            'MONTONIO_PAYMENTS_SHOW_LOGO' => '1',
            'MONTONIO_PAYMENTS_HIDE_COUNTRY' => '0',
            'MONTONIO_PAYMENTS_STYLE' => 'grid_logos',
            'MONTONIO_PAYMENTS_DEFAULT_COUNTRY' => 'EE',
            'MONTONIO_PAYMENTS_AUTOMATICALLY_CHANGE_COUNTRY' => 'manual',
            'MONTONIO_PAYMENTS_TRANSLATE_COUNTRY_DROPDOWN' => 'english',

            'MONTONIO_ADVANCED_ERROR_PAGE' => 'checkout',
        );

        $montonioModule = MontonioHelper::getMontonioModule();
        $allPaymentMethods = $montonioModule->paymentMethodRegistry->getAllPaymentMethods();
        foreach ($allPaymentMethods as $paymentMethod) {
            $config = array_merge($config, $paymentMethod->getDefaultConfig());
        }

        return $config;
    }

    /**
     * Get current shop config
     *
     * @since 2.0.0
     * @return array Shop config
     */
    public static function getCurrentShopConfig()
    {
        $config = self::getDefaultShopConfig();

        foreach ($config as $key => $value) {
            $config[$key] = Configuration::get($key);
        }

        return $config;
    }

    /**
     * Get submitted config when saving settings
     *
     * @since 2.0.0
     * @return array Submitted config
     */
    public static function getSubmittedShopConfig()
    {
        $config = self::getDefaultShopConfig();

        foreach ($config as $key => $value) {
            $config[$key] = Tools::getValue($key);
        }

        return $config;
    }

    /**
     * Validate shop config when saving settings
     *
     * @since 2.0.0
     * @param array $config Configuration to validate
     * @return array The errors if any
     */
    public static function validateShopConfig($config)
    {
        $errors = array();

        if (empty($config['MONTONIO_ACCESS_KEY'])) {
            $errors[] = MontonioHelper::translate('Access key is required');
        }

        if (empty($config['MONTONIO_SECRET_KEY'])) {
            $errors[] = MontonioHelper::translate('Secret key is required');
        }

        if (empty($config['MONTONIO_ENVIRONMENT'])) {
            $errors[] = MontonioHelper::translate('Environment is required');
        }

        if (self::validateApiKeys(
            $config['MONTONIO_ACCESS_KEY'],
            $config['MONTONIO_SECRET_KEY'],
            $config['MONTONIO_ENVIRONMENT']) === false
        ) {
            $errors[] = MontonioHelper::translate('Error validating API keys. Please check your keys and try again.');
        }

        return $errors;
    }

    /**
     * Update shop config
     *
     * @since 2.0.0
     * @param array $config Configuration to update
     * @param int $shopId Shop ID
     * @return bool True if config was updated successfully, false otherwise
     */
    public static function updateShopConfig($config, $shopId = null)
    {
        foreach ($config as $key => $value) {
            if (!Configuration::updateValue($key, $value, false, null, $shopId)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Sets up shop configuration on module installation.
     *
     * @since 2.0.0
     * @return bool True if setup was successful, false otherwise
     */
    public static function setupShopConfig()
    {
        $module = MontonioHelper::getMontonioModule();
        $config = self::getDefaultShopConfig();
        $shops = MontonioHelper::isMultishopEnabled() ? Shop::getShops(true, null, true) : array(null);
        foreach ($shops as $shop) {
            $shopId = is_null($shop) ? null : $shop['id_shop'];
            if (!MontonioConfiguration::updateShopConfig($config, $shopId)) {
                $module->_errors[] = MontonioHelper::translate('Failed to update shop config');
                return false;
            }
        }

        return true;
    }

    /**
     * Validates that the API keys are correct by making a small request to the Montonio API
     *
     * @param string $accessKey The Montonio Access Key
     * @param string $secretKey The Montonio Secret Key
     * @param string $environment The Montonio Environment
     * @return void
     */
    private static function validateApiKeys($accessKey, $secretKey, $environment)
    {
        $api = new MontonioStargateApi($accessKey, $secretKey, $environment);
        $response = $api->getPaymentMethods();

        if (in_array($response['status'], array(201, 200))) {
            return true;
        }

        return false;
    }
}
