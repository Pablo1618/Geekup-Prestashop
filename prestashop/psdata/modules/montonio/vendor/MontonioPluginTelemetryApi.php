<?php

/**
 * Class MontonioPluginTelemetryApi - API for sending telemetry data to Montonio API
 *
 * @since 2.0.0
 */
class MontonioPluginTelemetryApi extends MontonioAbstractApi
{
    /**
     * Montonio Access Key
     *
     * @since 2.0.0
     * @var string
     */
    private $accessKey;

    /**
     * Montonio Secret Key
     *
     * @since 2.0.0
     * @var string
     */
    private $secretKey;

    /**
     * Montonio Plugin Telemetry URL
     *
     * @since 2.0.0
     * @var string
     */
    const MONTONIO_PLUGIN_TELEMETRY_URL = 'https://plugin-telemetry.montonio.com/api';

    /**
     * MontonioPluginTelemetryService constructor.
     *
     * @since 2.0.0
     * @param $accessKey
     * @param $secretKey
     * @param $environment
     */
    public function __construct($accessKey, $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Send telemetry data to Montonio API
     *
     * @since 2.0.0
     * @param array $orderData The order data
     * @return array The response data
     */
    public function sendTelemetryData($telemetryData)
    {
        $url = $this->getBaseUrl() . '/store-telemetry-data';
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->createToken(),
        );

        return $this->httpRequest($url, 'PATCH', $telemetryData, $headers);
    }

    /**
     * Get the base URL for the telemetry service
     *
     * @since 2.0.0
     * @return string The URL string
     */
    private function getBaseUrl()
    {
        return self::MONTONIO_PLUGIN_TELEMETRY_URL;
    }

    /**
     * Get Montonio Access Key
     *
     * @since 2.0.0
     * @return string
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * Get Montonio Secret Key
     *
     * @since 2.0.0
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }
}
