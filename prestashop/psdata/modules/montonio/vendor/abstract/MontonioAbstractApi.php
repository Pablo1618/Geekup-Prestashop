<?php

use MontonioFirebase\JWT\MontonioJWT;

abstract class MontonioAbstractApi
{
    /**
     * Get Montonio Access Key
     *
     * @since 2.0.0
     * @return string
     */
    abstract public function getAccessKey();

    /**
     * Get Montonio Secret Key
     *
     * @since 2.0.0
     * @return string
     */
    abstract public function getSecretKey();

    /**
     * Get the bearer token which is used to authenticate the requests
     *
     * @since 2.0.0
     * @param array $data The data to encode in the token
     * @return string The bearer token
     */
    protected function createToken($data = null)
    {
        // Default data
        $defaultData = array(
            'accessKey' => $this->getAccessKey(),
            'iat' => time(),
            'exp' => time() + (60 * 60), // Token valid for 1 hour
        );

        // Use provided data or fall back to default
        $dataToUse = $data ? array_merge($defaultData, $data) : $defaultData;

        return MontonioJWT::encode($dataToUse, $this->getSecretKey());
    }

    /**
     * Decode the order token to get the order data
     *
     * @since 2.0.0
     * @return object The order data
     */
    public function decodeOrderToken($token)
    {
        MontonioJWT::$leeway = 60 * 5; // 5 minutes
        return MontonioJWT::decode($token, $this->getSecretKey(), ['HS256']);
    }

    /**
     * Helper function to make an HTTP request using cURL
     *
     * @param string $url The URL to make the request to
     * @param string $method The HTTP method to use ('GET', 'POST', 'PATCH', etc.)
     * @param array $data The data to send in the request
     * @param array $headers Additional headers to send in the request
     * @param int $timeout The timeout for the request
     * @return array The response data including 'status', 'headers', and 'body'
     */
    protected function httpRequest($url, $method = 'GET', $data = array(), $headers = array(), $timeout = 5)
    {
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the request method
        $method = strtoupper($method);
        if ('POST' === $method) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Use json_encode for JSON content type
        } elseif ('PATCH' === $method || 'PUT' === $method || 'DELETE' === $method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Use json_encode for JSON content type
        }

        // Set headers if provided
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        // Return the response instead of printing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // To get the headers in the response
        curl_setopt($ch, CURLOPT_HEADER, true);

        // Set the timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        // Execute the request
        $response = curl_exec($ch);

        // Separate headers and body
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        // Get the HTTP status code
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL resource
        curl_close($ch);

        return array(
            'status' => $http_code,
            'headers' => $header,
            'body' => json_decode($body, true), // Decode the body from JSON
        );
    }

    /**
     * Generate a random UUID v4
     *
     * @since 2.0.0
     * @return string The unique ID
     */
    protected function uuidV4()
    {
        $data = (function_exists('openssl_random_pseudo_bytes')) ?
        openssl_random_pseudo_bytes(16) : random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
