<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Upgrade the module to version 2.0.0
 *
 * @since 2.0.0
 * @param Montonio $module The module instance
 * @return bool True if the upgrade was successful, false otherwise
 */
function upgrade_module_2_0_0($module)
{
    error_log('Starting upgrade to 2.0.0');
    if (is_callable('curl_init') === false) {
        error_log('Error: cURL is not enabled.');
        $module->_errors[] = $module->translations['To be able to use this module, please activate cURL (PHP extension).'];
        return false;
    }

    if (!class_exists('DOMDocument') || !class_exists('DOMXPath')) {
        error_log('Error: DOMDocument or DOMXPath is not enabled.');
        $module->_errors[] = $module->translations['To be able to use this module, please activate the PHP extension "dom".'];
        return false;
    }

    // Migrate the configuration
    if (!migrate_configuration_2_0_0($module)) {
        error_log('Error: Failed to migrate configuration.');
        return false;
    }

    error_log('Configuration migration completed successfully.');
    if (!$module->setupHooks()) {
        error_log('Error: Failed to setup hooks.');
        $module->_errors[] = $module->translations['Failed to install module at step: setupHooks'];
        return false;
    }

    error_log('Hooks setup completed successfully.');
    if (!$module->setupDatabase()) {
        error_log('Error: Failed to setup database.');
        $module->_errors[] = $module->translations['Failed to install module at step: setupDatabase'];
        return false;
    }

    if (!$module->setupOrderStatuses()) {
        error_log('Error: Failed to setup order statuses.');
        $module->_errors[] = $module->translations['Failed to install module at step: setupOrderStatuses'];
        return false;
    }

    error_log('Upgrade to 2.0.0 completed successfully.');
    return true;
}

/**
 * Migrate the configuration to version 2.0.0
 *
 * @since 2.0.0
 * @param Montonio $module The module instance
 * @return bool True if the migration was successful, false otherwise
 */
function migrate_configuration_2_0_0($module)
{
    $shops = MontonioHelper::isMultishopEnabled() ? Shop::getShops(true, null, true) : array(null);

    foreach ($shops as $shop) {
        $shopId = is_null($shop) ? null : $shop['id_shop'];
        error_log('Migrating configuration for shop ID: ' . $shopId);

        $oldConfiguration = Configuration::getMultiple(array(
            'MONTONIO_ACCESS_KEY',
            'MONTONIO_SECRET_KEY',
            'MONTONIO_ENVIRONMENT',
            'MONTONIO_ORDER_PREFIX',
            'MONTONIO_MERCHANT_NAME',
            'MONTONIO_ABANDON',
            'MONTONIO_REFUND',

            'MONTONIO_METHOD_1_TYPE',
            'MONTONIO_METHOD_2_TYPE',
            'MONTONIO_METHOD_3_TYPE',
            'MONTONIO_METHOD_4_TYPE',
            'MONTONIO_METHOD_5_TYPE',
            'MONTONIO_METHOD_6_TYPE',
            'MONTONIO_METHOD_7_TYPE',

            'MONTONIO_BLIK_ENABLED',
            'MONTONIO_BLIK_CREATE_ORDER',
            'MONTONIO_BLIK_SHOW_LOGO',
            'MONTONIO_BLIK_IN_CHECKOUT',
            'MONTONIO_BLIK_STYLE',
            'MONTONIO_BLIK_DEFAULT_COUNTRY',
            'MONTONIO_BLIK_PAYMENT_HANDLE_CSS',
            'MONTONIO_BLIK_AUTOMATICALLY_CHANGE_COUNTRY',
            'MONTONIO_BLIK_AUTOMATICALLY_SELECT_METHOD',
            'MONTONIO_BLIK_TRANSLATE_COUNTRY_DROPDOWN',

            'MONTONIO_BNPL_ENABLED',
            'MONTONIO_BNPL_CREATE_ORDER',
            'MONTONIO_BNPL_SHOW_LOGO',
            'MONTONIO_BNPL_STYLE',
            'MONTONIO_BNPL_DEFAULT_COUNTRY',
            'MONTONIO_BNPL_PAYMENT_HANDLE_CSS',
            'MONTONIO_BNPL_AUTOMATICALLY_CHANGE_COUNTRY',
            'MONTONIO_BNPL_AUTOMATICALLY_SELECT_METHOD',
            'MONTONIO_BNPL_TRANSLATE_COUNTRY_DROPDOWN',

            'MONTONIO_CARD_ENABLED',
            'MONTONIO_CARD_CREATE_ORDER',
            'MONTONIO_CARD_SHOW_LOGO',
            'MONTONIO_CARD_IN_CHECKOUT',
            'MONTONIO_CARD_STYLE',
            'MONTONIO_CARD_DEFAULT_COUNTRY',
            'MONTONIO_CARD_PAYMENT_HANDLE_CSS',
            'MONTONIO_CARD_AUTOMATICALLY_CHANGE_COUNTRY',
            'MONTONIO_CARD_AUTOMATICALLY_SELECT_METHOD',
            'MONTONIO_CARD_TRANSLATE_COUNTRY_DROPDOWN',

            'MONTONIO_FINANCING_PAYMENT_ENABLED',
            'MONTONIO_FINANCING_PAYMENT_CREATE_ORDER',
            'MONTONIO_FINANCING_PAYMENT_SHOW_LOGO',
            'MONTONIO_FINANCING_PAYMENT_STYLE',
            'MONTONIO_FINANCING_PAYMENT_DEFAULT_COUNTRY',
            'MONTONIO_FINANCING_PAYMENT_PAYMENT_HANDLE_CSS',
            'MONTONIO_FINANCING_PAYMENT_AUTOMATICALLY_CHANGE_COUNTRY',
            'MONTONIO_FINANCING_PAYMENT_AUTOMATICALLY_SELECT_METHOD',
            'MONTONIO_FINANCING_PAYMENT_TRANSLATE_COUNTRY_DROPDOWN',

            'MONTONIO_PAYMENTS_ENABLED',
            'MONTONIO_PAYMENTS_CREATE_ORDER',
            'MONTONIO_PAYMENTS_SHOW_LOGO',
            'MONTONIO_PAYMENTS_HIDE_COUNTRY',
            'MONTONIO_PAYMENTS_STYLE',
            'MONTONIO_PAYMENTS_DEFAULT_COUNTRY',
            'MONTONIO_PAYMENTS_PAYMENT_HANDLE_CSS',
            'MONTONIO_PAYMENTS_AUTOMATICALLY_CHANGE_COUNTRY',
            'MONTONIO_PAYMENTS_AUTOMATICALLY_SELECT_METHOD',
            'MONTONIO_PAYMENTS_TRANSLATE_COUNTRY_DROPDOWN',
        ), $shopId);

        $defaultConfig = MontonioConfiguration::getDefaultShopConfig();
        // Patch the default configuration with the old configuration (only the keys that are present in the new configuration will be patched, so no old keys will be brought over)

        // Patch the default configuration with the old configuration
        foreach ($defaultConfig as $key => $value) {
            if (isset($oldConfiguration[$key])) {
                $defaultConfig[$key] = $oldConfiguration[$key];
            }
        }

        // Save the patched configuration
        if (!MontonioConfiguration::updateShopConfig($defaultConfig, $shopId)) {
            error_log('Error: Failed to update shop config for shop ID: ' . $shopId);
            return false;
        }

        $paymentMethodsOrder = migration_2_0_0_compose_payment_methods_order($oldConfiguration);
        error_log('Payment methods order for shop ' . $shopId . ': ' . $paymentMethodsOrder);
        Configuration::updateValue('MONTONIO_PAYMENT_METHODS_ORDER', $paymentMethodsOrder, false, null, $shopId);

        $orderProcessingStrategy = migration_2_0_0_resolve_order_processing_strategy($oldConfiguration);
        error_log('Order processing strategy for shop ' . $shopId . ': ' . $orderProcessingStrategy);
        Configuration::updateValue('MONTONIO_ORDER_PROCESSING_STRATEGY', $orderProcessingStrategy, false, null, $shopId);

        if ('before_payment' === $orderProcessingStrategy) {
            Configuration::updateValue('MONTONIO_MERCHANT_REFERENCE_TYPE', 'order_id', false, null, $shopId);
        } else {
            Configuration::updateValue('MONTONIO_MERCHANT_REFERENCE_TYPE', 'cart_id', false, null, $shopId);
        }

        $preselectedPaymentMethod = migration_2_0_0_resolve_preselected_payment_method($oldConfiguration);
        error_log('Preselected payment method for shop ' . $shopId . ': ' . $preselectedPaymentMethod);
        Configuration::updateValue('MONTONIO_PRESELECTED_PAYMENT_METHOD', $preselectedPaymentMethod, false, null, $shopId);

        // Migrate renamed configuration keys
        Configuration::updateValue('MONTONIO_REFUNDS_ENABLED', $oldConfiguration['MONTONIO_REFUND'], false, null, $shopId);
        Configuration::updateValue('MONTONIO_FINANCING_ENABLED', $oldConfiguration['MONTONIO_FINANCING_PAYMENT_ENABLED'], false, null, $shopId);
        Configuration::updateValue('MONTONIO_FINANCING_SHOW_LOGO', $oldConfiguration['MONTONIO_FINANCING_PAYMENT_SHOW_LOGO'], false, null, $shopId);
        Configuration::updateValue('MONTONIO_CARD_PAYMENTS_ENABLED', $oldConfiguration['MONTONIO_CARD_ENABLED'], false, null, $shopId);
        Configuration::updateValue('MONTONIO_CARD_PAYMENTS_SHOW_LOGO', $oldConfiguration['MONTONIO_CARD_SHOW_LOGO'], false, null, $shopId);
        Configuration::updateValue('MONTONIO_CARD_PAYMENTS_IN_CHECKOUT', $oldConfiguration['MONTONIO_CARD_IN_CHECKOUT'], false, null, $shopId);

        error_log('Configuration migration for shop ID: ' . $shopId . ' completed.');
    }

    return true;
}

function migration_2_0_0_resolve_preselected_payment_method($configuration)
{
    // Attempt to find where _AUTOMATICALLY_SELECT_METHOD is set to 'yes' and use that as the preselected method
    // (if there are multiple, the first one found will be used)
    // if none are found, return an empty string
    $keyMap = array(
        'MONTONIO_BLIK_AUTOMATICALLY_SELECT_METHOD' => 'blik',
        'MONTONIO_BNPL_AUTOMATICALLY_SELECT_METHOD' => 'bnpl',
        'MONTONIO_CARD_AUTOMATICALLY_SELECT_METHOD' => 'cardPayments',
        'MONTONIO_FINANCING_PAYMENT_AUTOMATICALLY_SELECT_METHOD' => 'hirePurchase',
        'MONTONIO_PAYMENTS_AUTOMATICALLY_SELECT_METHOD' => 'paymentInitiation',
    );

    foreach ($keyMap as $key => $method) {
        if (isset($configuration[$key]) && 'yes' === $configuration[$key]) {
            return $method;
        }
    }

    return '';
}

/**
 * Compose the payment methods order
 *
 * @since 2.0.0
 * @param array $configuration The configuration
 * @return string The payment methods order
 */
/**
 * Compose the payment methods order
 *
 * @since 2.0.0
 * @param array $configuration The configuration
 * @return string The payment methods order
 */
function migration_2_0_0_compose_payment_methods_order($configuration)
{
    $paymentMethods = [];
    $uniqueMethods = [];

    $paymentMethodIdMap = array(
        'MontonioPayments' => 'paymentInitiation',
        'MontonioBlikPayments' => 'blik',
        'MontonioCardPayments' => 'cardPayments',
        'MontonioBnplPayments' => 'bnpl',
        'MontonioFinancingPayments' => 'hirePurchase',
    );

    $defaultOrder = array('paymentInitiation', 'cardPayments', 'blik', 'bnpl', 'hirePurchase');

    for ($i = 1; $i <= 7; $i++) {
        $methodKey = 'MONTONIO_METHOD_' . $i . '_TYPE';
        if (isset($configuration[$methodKey])) {
            $methodId = $configuration[$methodKey];
            if (isset($paymentMethodIdMap[$methodId])) {
                $paymentMethod = $paymentMethodIdMap[$methodId];
                if (!isset($uniqueMethods[$paymentMethod])) {
                    $paymentMethods[] = $paymentMethod;
                    $uniqueMethods[$paymentMethod] = true;
                }
            }
        }
    }

    // Add missing methods according to the default order
    foreach ($defaultOrder as $method) {
        if (!isset($uniqueMethods[$method])) {
            $paymentMethods[] = $method;
            $uniqueMethods[$method] = true;
        }
    }

    return implode(',', $paymentMethods);
}

/**
 * Resolve the order processing strategy
 *
 * @since 2.0.0
 * @param array $configuration The configuration
 * @return string The order processing strategy
 */
function migration_2_0_0_resolve_order_processing_strategy($configuration)
{
    // 1. get all keys like <PaymentMethod>_CREATE_ORDER from configuration,
    // 2. Figure out if there are more 'before' or 'after' values
    // 3. Set the value to the one that is more common

    $beforeCount = 0;
    $afterCount = 0;

    $keys = array(
        'MONTONIO_BLIK_CREATE_ORDER',
        'MONTONIO_BNPL_CREATE_ORDER',
        'MONTONIO_CARD_CREATE_ORDER',
        'MONTONIO_FINANCING_PAYMENT_CREATE_ORDER',
        'MONTONIO_PAYMENTS_CREATE_ORDER',
    );

    foreach ($keys as $key) {
        if (isset($configuration[$key])) {
            if ('before' === $configuration[$key]) {
                $beforeCount++;
            } else {
                $afterCount++;
            }
        }
    }

    return $beforeCount > $afterCount ? 'before_payment' : 'after_payment';
}
