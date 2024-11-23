<?php

/**
 * Class MontonioOrderPrefixManager
 *
 * In multistore solutions, adding a prefix to an order ID
 * is a common way to distinguish between orders from different stores
 * in the Montonio Partner System.
 *
 * This class provides methods to add and remove this prefix in a uniform way
 *
 * @since 2.0.0
 */
class MontonioOrderPrefixManager
{
    /**
     * The separator used to separate the prefix from the merchant reference
     *
     * @since 2.0.0
     * @var string
     */
    const SEPARATOR = '-';

    /**
     * Add a prefix to the merchant reference
     *
     * @since 2.0.0
     * @param string $prefix The prefix to add
     * @param string|int $merchantReference The merchant reference
     * @return string The merchant reference with the prefix added
     */
    public static function addPrefix($prefix, $merchantReference)
    {
        if (!empty($prefix)) {
            return $prefix . self::SEPARATOR . $merchantReference;
        }

        return (string) $merchantReference;
    }

    /**
     * Remove the prefix from the merchant reference
     *
     * @since 2.0.0
     * @param string $merchantReference The merchant reference
     * @return string The merchant reference with the prefix removed
     */
    public static function removePrefix($merchantReference)
    {
        if (!is_string($merchantReference) && !is_int($merchantReference)) {
            throw new InvalidArgumentException('Merchant reference must be a string or an integer.');
        }

        $parts = explode(self::SEPARATOR, (string) $merchantReference);

        return end($parts);
    }
}
