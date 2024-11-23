<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioPaymentIntentDraftsTableManager
 * Handles the creation and management of Montonio's Payment Intent Drafts in the database.
 *
 * @since 2.0.0
 */
class MontonioPaymentIntentDraftsTableManager
{
    const TABLE_NAME = _DB_PREFIX_ . 'montonio_payment_intent_drafts';

    /**
     * Creates the Montonio Payment Intent Drafts table if it does not already exist.
     *
     * @since 2.0.0
     * @return bool Returns true if the table creation query was successful, false otherwise.
     */
    public static function createMontonioPaymentIntentDraftsTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . self::TABLE_NAME . '` (
            `cart_id` INT UNSIGNED NOT NULL,
            `payment_intent_uuid` VARCHAR(36) NOT NULL,
            `stripe_public_key` VARCHAR(255) DEFAULT NULL,
            `stripe_client_secret` VARCHAR(255) DEFAULT NULL,
            `montonio_payment_method` VARCHAR(255) NOT NULL,
            `customer_id` INT UNSIGNED,
            `is_sandbox` BOOLEAN DEFAULT FALSE,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Drops the Montonio Payment Intent Drafts table if it exists.
     *
     * @since 2.0.0
     * @return bool Returns true if the table drop query was successful, false otherwise.
     */
    public static function dropMontonioPaymentIntentDraftsTable()
    {
        $sql = 'DROP TABLE IF EXISTS `' . self::TABLE_NAME . '`';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Finds payment intent drafts by cart ID.
     *
     * @since 2.0.0
     * @param int $cartId The cart ID to search for.
     * @param string $montonioPaymentMethod The Montonio payment method identifier to search for.
     * @return array|null Returns an array of payment intent drafts if found, null otherwise.
     */
    public static function findDraftByCartAndMethod($cartId, $montonioPaymentMethod)
    {
        $cartId = (int) $cartId;

        $sql = 'SELECT *
                FROM `' . self::TABLE_NAME . '`
                WHERE `cart_id` = ' . $cartId . ' AND `montonio_payment_method` = "' . pSQL($montonioPaymentMethod) . '"';
        $result = Db::getInstance()->getRow($sql);

        return $result ? $result : null;
    }

    /**
     * Creates a new payment intent draft.
     *
     * @since 2.0.0
     * @param array $data Associative array of data to insert. Supported keys:
     *   - 'cart_id' (int): The cart ID (required).
     *   - 'payment_intent_uuid' (string): The payment intent draft UUID (required).
     *   - 'customer_id' (int): The customer ID (optional).
     *   - 'stripe_public_key' (string): The Stripe public key (optional).
     *   - 'stripe_client_secret' (string): The Stripe client secret (optional).
     *   - 'montonio_payment_method' (string): The payment method identifier as Montonio's API expects (optional).
     *   - 'is_sandbox' (bool): Whether the payment intent draft is in sandbox mode (optional, default: false).
     *   - 'created_at' (datetime): The creation timestamp (optional).
     *   - 'updated_at' (datetime): The update timestamp (optional).
     * @return bool Returns true if the insert query was successful, false otherwise.
     * @throws Exception if any required key is missing or empty.
     */
    public static function createPaymentIntentDraft($data)
    {
        $requiredKeys = array('cart_id', 'payment_intent_uuid');
        foreach ($requiredKeys as $key) {
            if (empty($data[$key])) {
                throw new PrestaShopException("Missing required key: $key");
            }
        }

        $fields = [
            'cart_id' => (int) $data['cart_id'],
            'payment_intent_uuid' => pSQL($data['payment_intent_uuid']),
            'customer_id' => isset($data['customer_id']) ? (int) $data['customer_id'] : null,
            'montonio_payment_method' => isset($data['montonio_payment_method']) ? pSQL($data['montonio_payment_method']) : null,
            'stripe_public_key' => isset($data['stripe_public_key']) ? pSQL($data['stripe_public_key']) : null,
            'stripe_client_secret' => isset($data['stripe_client_secret']) ? pSQL($data['stripe_client_secret']) : null,
            'is_sandbox' => isset($data['is_sandbox']) && $data['is_sandbox'] ? 1 : 0,
            'created_at' => isset($data['created_at']) ? pSQL($data['created_at']) : 'NOW()',
            'updated_at' => isset($data['updated_at']) ? pSQL($data['updated_at']) : 'NOW()',
        ];

        $columns = array_keys($fields);
        $values = array_map(function ($value) {
            return is_string($value) ? "'" . $value . "'" : $value;
        }, array_values($fields));

        $sql = 'INSERT INTO `' . self::TABLE_NAME . '` (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $values) . ')';

        return Db::getInstance()->execute($sql);
    }

}
