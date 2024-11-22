<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioPluginTelemetryService - Service for sending telemetry data to Montonio API
 *
 * @since 2.0.0
 */
class MontonioPluginTelemetryService
{
    /**
     * Send telemetry data to Montonio API
     *
     * @since 2.0.0
     * @return array|null Response from the API or null if some unhandled exception occurred
     */
    public static function sendTelemetryData()
    {
        try {
            $telemetryData = self::collectTelemetryData();
            return self::sendDataToApiSafely($telemetryData);
        } catch (Exception $e) {
            self::logError('Error sending telemetry data: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send telemetry data along with the deactivatedAt timestamp to Montonio API when the plugin is uninstalled
     *
     * @since 2.0.0
     * @return array|null Response from the API or null if some unhandled exception occurred
     */
    public static function sendUninstallTelemetryData()
    {
        try {
            $telemetryData = self::collectTelemetryData();
            self::addDeactivationTimestamp($telemetryData);
            return self::sendDataToApiSafely($telemetryData);
        } catch (Exception $e) {
            self::logError('Error sending telemetry data: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Refresh telemetry data when 24 hours have passed since the last refresh
     *
     * @since 2.0.0
     */
    public static function refreshTelemetryDataIfNecessary()
    {
        $lastTelemetryDataRefresh = Configuration::get('MONTONIO_LAST_TELEMETRY_DATA_REFRESH');
        $refreshInterval = 86400; // 24 hours

        if (self::shouldRefreshTelemetryData($lastTelemetryDataRefresh, $refreshInterval)) {
            self::sendTelemetryData();
            Configuration::updateValue('MONTONIO_LAST_TELEMETRY_DATA_REFRESH', time());
        }
    }

    /**
     * Determine if telemetry data should be refreshed.
     *
     * @param int $lastTelemetryDataRefresh Timestamp of the last refresh.
     * @param int $refreshInterval Interval in seconds to refresh the data.
     * @return bool True if data should be refreshed, false otherwise.
     */
    private static function shouldRefreshTelemetryData($lastTelemetryDataRefresh, $refreshInterval)
    {
        return !$lastTelemetryDataRefresh || time() - $lastTelemetryDataRefresh > $refreshInterval;
    }

    /**
     * Collect standard telemetry data for the plugin usage in PrestaShop
     *
     * @since 2.0.0
     * @return array Associative array with the telemetry data
     */
    private static function collectTelemetryData()
    {
        $module = MontonioHelper::getMontonioModule();
        $defaultLanguage = new Language(Configuration::get('PS_LANG_DEFAULT'));
        $supportedLanguages = self::getSupportedLanguages();
        $defaultCurrency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $supportedCurrencies = self::getSupportedCurrencies();
        $config = MontonioConfiguration::getCurrentShopConfig();
        self::sanitizeConfig($config);

        return array(
            'storeUrl' => Tools::getShopDomain(true),
            'platform' => 'prestashop',
            'storeInfo' => array(
                'phpVersion' => phpversion(),
                'prestashopVersion' => _PS_VERSION_,
                'montonioPluginVersion' => $module->version,
                'prestashopInfo' => array(
                    'defaultLanguage' => $defaultLanguage->iso_code,
                    'supportedLanguages' => $supportedLanguages,
                    'currency' => $defaultCurrency->iso_code,
                    'supportedCurrencies' => $supportedCurrencies,
                    'timezone' => Configuration::get('PS_TIMEZONE'),
                    'siteName' => Configuration::get('PS_SHOP_NAME'),
                    'merchantReferenceType' => Configuration::get('MONTONIO_MERCHANT_REFERENCE_TYPE'),
                    'config' => $config,
                ),
            ),
        );
    }

    /**
     * Get supported languages
     *
     * @since 2.0.0
     * @return array List of supported languages
     */
    private static function getSupportedLanguages()
    {
        $languages = Language::getLanguages();
        return array_map(function ($language) {
            return $language['iso_code'];
        }, $languages);
    }

    /**
     * Get supported currencies
     *
     * @since 2.0.0
     * @return array List of supported currencies
     */
    private static function getSupportedCurrencies()
    {
        $currencies = Currency::getCurrencies();
        return array_map(function ($currency) {
            return $currency['iso_code'];
        }, $currencies);
    }

    /**
     * Sanitize configuration by removing sensitive data
     *
     * @since 2.0.0
     * @param array $config Configuration array to sanitize
     */
    private static function sanitizeConfig(&$config)
    {
        unset($config['MONTONIO_ACCESS_KEY']);
        unset($config['MONTONIO_SECRET_KEY']);
    }

    /**
     * Add deactivation timestamp to telemetry data
     *
     * @since 2.0.0
     * @param array $telemetryData Telemetry data array
     */
    private static function addDeactivationTimestamp(&$telemetryData)
    {
        if (!isset($telemetryData['storeInfo'])) {
            $telemetryData['storeInfo'] = array();
        }
        $telemetryData['storeInfo']['deactivatedAt'] = date('Y-m-d H:i:s');
    }

    /**
     * Safely send telemetry data to Montonio API
     *
     * @since 2.0.0
     * @param array $telemetryData Telemetry data array
     * @return array|null Response from the API or null if some unhandled exception occurred
     */
    private static function sendDataToApiSafely($telemetryData)
    {
        try {
            return self::sendDataToApi($telemetryData);
        } catch (Exception $e) {
            self::logError('Error sending telemetry data: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send telemetry data to Montonio API
     *
     * @since 2.0.0
     * @param array $telemetryData Telemetry data array
     * @return array Response from the API
     */
    private static function sendDataToApi($telemetryData)
    {
        $api = new MontonioPluginTelemetryApi(
            Configuration::get('MONTONIO_ACCESS_KEY'),
            Configuration::get('MONTONIO_SECRET_KEY')
        );

        return $api->sendTelemetryData($telemetryData);
    }

    /**
     * Log an error message
     *
     * @since 2.0.0
     * @param string $message Error message to log
     */
    private static function logError($message)
    {
        MontonioLogger::addLog($message, 3);
    }
}
