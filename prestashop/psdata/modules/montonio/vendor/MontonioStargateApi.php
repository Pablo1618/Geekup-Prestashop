<?php

/**
 * Class MontonioStargateApi - enables communication with Montonio Stargate API
 *
 * @since 2.0.0
 */
class MontonioStargateApi extends MontonioAbstractApi
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
     * Montonio Environment
     *
     * @since 2.0.0
     * @var string
     */
    private $environment;

    /**
     * Montonio Stargate Application URL
     *
     * @since 2.0.0
     * @var string
     */
    const MONTONIO_PAYMENTS_APPLICATION_URL = 'https://stargate.montonio.com/api';

    /**
     * Montonio Stargate Sandbox Application URL
     *
     * @since 2.0.0
     * @var string
     */
    const MONTONIO_PAYMENTS_SANDBOX_APPLICATION_URL = 'https://sandbox-stargate.montonio.com/api';

    /**
     * MontonioStargateApi constructor.
     *
     * @since 2.0.0
     * @param $accessKey
     * @param $secretKey
     * @param $environment
     */
    public function __construct($accessKey, $secretKey, $environment)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->environment = $environment;
    }

    /**
     * Get the enabled payment methods for the store
     *
     * @since 2.0.0
     * @return array The response data
     */
    public function getPaymentMethods()
    {
        $url = $this->getBaseUrl() . '/stores/payment-methods';
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->createToken(),
        );

        return $this->httpRequest($url, 'GET', [], $headers);
    }

    /**
     * Create a new order in Montonio
     *
     * @since 2.0.0
     * @param array $orderData The order data
     * @return array The response data
     */
    public function createOrder($orderData)
    {
        $url = $this->getBaseUrl() . '/orders';
        $headers = array(
            'Content-Type: application/json',
        );
        $data = array(
            'data' => $this->createToken($orderData),
        );

        return $this->httpRequest($url, 'POST', $data, $headers);
    }

    /**
     * Get the order data from Montonio
     *
     * @since 2.0.0
     * @param string $uuid The order UUID
     * @return array The response data
     */
    public function getOrder($uuid)
    {
        $url = sprintf('%s/orders/%s', $this->getBaseUrl(), $uuid);
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->createToken(),
        );

        return $this->httpRequest($url, 'GET', [], $headers);
    }

    /**
     * Create a new payment intent draft in Montonio
     *
     * @since 2.0.0
     * @param array $data The payment intent data
     * @return array The response data
     */
    public function createPaymentIntentDraft($data = [])
    {
        $url = $this->getBaseUrl() . '/payment-intents/draft';
        $headers = array(
            'Content-Type: application/json',
        );
        $data = array(
            'data' => $this->createToken($data),
        );

        return $this->httpRequest($url, 'POST', $data, $headers);
    }

    /**
     * Create a new refund in Montonio
     *
     * @since 2.0.0
     * @param string $orderUuid The order UUID
     * @param float $amount The refund amount
     * @return array The response data
     */
    public function createRefund($orderUuid, $amount)
    {
        $url = $this->getBaseUrl() . '/refunds';
        $headers = array(
            'Content-Type: application/json',
        );

        $data = array(
            'data' => $this->createToken(
                array(
                    'orderUuid' => $orderUuid,
                    'amount' => $amount,
                    'idempotencyKey' => $this->uuidV4(),
                )
            ),
        );

        return $this->httpRequest($url, 'POST', $data, $headers);
    }

    /**
     * Get the base URL for the Stargate API
     *
     * @since 2.0.0
     * @return string The URL string
     */
    private function getBaseUrl()
    {
        return 'sandbox' === $this->environment
        ? self::MONTONIO_PAYMENTS_SANDBOX_APPLICATION_URL
        : self::MONTONIO_PAYMENTS_APPLICATION_URL;
    }

    public function getAccessKey()
    {
        return $this->accessKey;
    }

    public function getSecretKey()
    {
        return $this->secretKey;
    }
}
