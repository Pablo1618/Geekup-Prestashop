<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioOrdersTableManager
 * Handles the creation and management of Montonio's Order UUIDs in the database.
 *
 * @since 2.0.0
 */
class MontonioOrdersTableManager
{
    const TABLE_NAME = _DB_PREFIX_ . 'montonio_orders';

    /**
     * Creates the Montonio Orders table if it does not already exist.
     *
     * @since 2.0.0
     * @return bool Returns true if the table creation query was successful, false otherwise.
     */
    public static function createMontonioOrdersTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . self::TABLE_NAME . '` (
            `cart_id` INT UNSIGNED NOT NULL,
            `order_id` INT UNSIGNED DEFAULT NULL,
            `order_reference` VARCHAR(255) DEFAULT NULL,
            `montonio_order_uuid` VARCHAR(36) DEFAULT NULL,
            `payment_method` VARCHAR(255) DEFAULT NULL,
            `payment_status` VARCHAR(255) DEFAULT NULL,
            `payment_provider_name` VARCHAR(255) DEFAULT NULL,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`cart_id`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Drops the Montonio orders table if it exists.
     *
     * @since 2.0.0
     * @return bool Returns true if the table drop query was successful, false otherwise.
     */
    public static function dropMontonioOrdersTable()
    {
        $sql = 'DROP TABLE IF EXISTS `' . self::TABLE_NAME . '`';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Updates the order details for a cart.
     *
     * @since 2.0.0
     * @param array $updateOrderData Associative array of order data to update. Supported keys:
     *   - 'cart_id' (int): The cart ID to update (required).
     *   - 'montonio_order_uuid' (string|null): The Montonio order UUID (optional).
     *   - 'order_id' (int|null): The order ID to associate with the cart (optional).
     *   - 'order_reference' (string|null): The order reference to associate with the cart (optional).
     *   - 'payment_method' (string|null): The payment method name (optional).
     *   - 'payment_provider_name' (string|null): The payment provider name (optional).
     *   - 'payment_status' (string|null): The payment status (optional).
     * @return bool True if the update was successful, false otherwise.
     * @throws Exception if the required key 'cart_id' is missing or empty.
     */
    public static function updateMontonioOrder($updateOrderData)
    {
        if (!isset($updateOrderData['cart_id']) || empty($updateOrderData['cart_id'])) {
            throw new PrestaShopException('Missing required key: cart_id');
        }

        $cartId = (int) pSQL($updateOrderData['cart_id']);
        $fields = array();

        if (isset($updateOrderData['montonio_order_uuid'])) {
            $fields[] = '`montonio_order_uuid` = "' . pSQL($updateOrderData['montonio_order_uuid']) . '"';
        }

        if (isset($updateOrderData['order_id'])) {
            $fields[] = '`order_id` = ' . (int) pSQL($updateOrderData['order_id']);
        }

        if (isset($updateOrderData['order_reference'])) {
            $fields[] = '`order_reference` = "' . pSQL($updateOrderData['order_reference']) . '"';
        }

        if (isset($updateOrderData['payment_provider_name'])) {
            $fields[] = '`payment_provider_name` = "' . pSQL($updateOrderData['payment_provider_name']) . '"';
        }

        if (isset($updateOrderData['payment_status'])) {
            $fields[] = '`payment_status` = "' . pSQL($updateOrderData['payment_status']) . '"';
        }

        if (isset($updateOrderData['payment_method'])) {
            $fields[] = '`payment_method` = "' . pSQL($updateOrderData['payment_method']) . '"';
        }

        if (empty($fields)) {
            return false; // No fields to update
        }

        $sql = 'UPDATE `' . self::TABLE_NAME . '`
                SET ' . implode(', ', $fields) . '
                WHERE `cart_id` = ' . $cartId;

        return Db::getInstance()->execute($sql);
    }

    /**
     * Upserts a Montonio Order into the table.
     *
     * @since 2.0.0
     * @param array $orderData Associative array of data to insert or update. Supported keys:
     *   - 'cart_id' (int|null): The cart ID (required).
     *   - 'montonio_order_uuid' (string): The Montonio order UUID (required).
     *   - 'payment_method' (string): The payment method name (required).
     *   - 'order_reference' (string|null): The order reference to associate with the cart (required).
     *   - 'order_id' (int|null): The order ID to associate with the cart (optional).
     *   - 'payment_provider_name' (string|null): The payment provider name (optional).
     *   - 'payment_status' (string|null): The payment status (optional).
     * @return bool Returns true if the query was successful, false otherwise.
     * @throws Exception if any required key is missing or empty.
     */
    public static function upsertMontonioOrder($orderData)
    {
        $requiredKeys = array('cart_id', 'payment_method', 'order_reference');
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $orderData) || empty($orderData[$key])) {
                throw new PrestaShopException('Missing required key: ' . $key);
            }
        }

        // Prepare the fields and values for the SQL query
        $fields = array(
            'cart_id' => (int) $orderData['cart_id'],
            'payment_method' => pSQL($orderData['payment_method']),
            'order_reference' => pSQL($orderData['order_reference']),
        );

        if (isset($orderData['order_id'])) {
            $fields['order_id'] = (int) $orderData['order_id'];
        }

        if (isset($orderData['montonio_order_uuid'])) {
            $fields['montonio_order_uuid'] = pSQL($orderData['montonio_order_uuid']);
        }

        if (isset($orderData['payment_provider_name'])) {
            $fields['payment_provider_name'] = pSQL($orderData['payment_provider_name']);
        }

        if (isset($orderData['payment_status'])) {
            $fields['payment_status'] = pSQL($orderData['payment_status']);
        }

        // Build the SQL query
        $columns = array_keys($fields);
        $values = array_values($fields);
        $updateFields = array();
        foreach ($fields as $key => $value) {
            $updateFields[] = "`$key` = VALUES(`$key`)";
        }

        $sql = 'INSERT INTO `' . self::TABLE_NAME . '` (' . implode(', ', $columns) . ') VALUES ("' . implode('", "', $values) . '")
                ON DUPLICATE KEY UPDATE ' . implode(', ', $updateFields);

        return Db::getInstance()->execute($sql);
    }

    /**
     * Retrieves a row from the Montonio orders table by Montonio order UUID.
     *
     * @since 2.0.0
     * @param string $montonioOrderUuid The Montonio order UUID to search for.
     * @return array|null Returns the row if it exists, null otherwise.
     */
    public static function getRowByMontonioOrderUuid($montonioOrderUuid)
    {
        $montonioOrderUuid = pSQL($montonioOrderUuid);

        $sql = 'SELECT *
                FROM `' . self::TABLE_NAME . '`
                WHERE `montonio_order_uuid` = "' . $montonioOrderUuid . '"';
        $result = Db::getInstance()->getRow($sql);

        return $result ? $result : null;
    }

    /**
     * Retrieves a row from the Montonio orders table by Order Reference.
     *
     * @since 2.0.0
     * @param int $orderReference The order reference to search for.
     * @return array|null Returns the row if it exists, null otherwise.
     */
    public static function getRowByOrderReference($orderReference)
    {
        $orderReference = pSQL($orderReference);

        $sql = 'SELECT *
                FROM `' . self::TABLE_NAME . '`
                WHERE `order_reference` = "' . $orderReference . '"';
        $result = Db::getInstance()->getRow($sql);

        return $result ? $result : null;
    }

    /**
     * Retrieves a row from the Montonio orders table by Cart ID.
     *
     * @since 2.0.0
     * @param int $cartId The cart ID to search for.
     * @return array|null Returns the row if it exists, null otherwise.
     */
    public static function getRowByCartId($cartId)
    {
        $cartId = (int) $cartId;

        $sql = 'SELECT *
                FROM `' . self::TABLE_NAME . '`
                WHERE `cart_id` = ' . $cartId;
        $result = Db::getInstance()->getRow($sql);

        return $result ? $result : null;
    }

    /**
     * Updates the payment method names for Montonio Bank Payments orders in the ps_order_history table.
     *
     * @since 2.0.0
     * @param string $displayNameMode The display name mode for the payment method.
     * @return bool Returns true if the update query was successful, false otherwise.
     */
    public static function updatePaymentMethodsForMontonioPaymentsOrders($displayNameMode)
    {
        // Define the new payment method names based on the display name mode
        switch ($displayNameMode) {
            case 'payment_method_name_and_payment_provider_name':
                $orderPaymentSql = 'UPDATE `ps_order_payment` op
                                        JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON op.`order_reference` = mo.`order_reference`
                                        SET op.`payment_method` = CONCAT("Montonio Bank Payments", " (", mo.`payment_provider_name`, ")")
                                        WHERE mo.`payment_method` = "paymentInitiation"';
                $orderSql = 'UPDATE `ps_orders` o
                                 JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON o.`reference` = mo.`order_reference`
                                 SET o.`payment` = CONCAT("Montonio Bank Payments", " (", mo.`payment_provider_name`, ")")
                                 WHERE mo.`payment_method` = "paymentInitiation"';
                break;

            case 'payment_method_name':
                $orderPaymentSql = 'UPDATE `ps_order_payment` op
                                        JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON op.`order_reference` = mo.`order_reference`
                                        SET op.`payment_method` = "Montonio Bank Payments"
                                        WHERE mo.`payment_method` = "paymentInitiation"';
                $orderSql = 'UPDATE `ps_orders` o
                                 JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON o.`reference` = mo.`order_reference`
                                 SET o.`payment` = "Montonio Bank Payments"
                                 WHERE mo.`payment_method` = "paymentInitiation"';
                break;

            case 'module_display_name':
                $orderPaymentSql = 'UPDATE `ps_order_payment` op
                                        JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON op.`order_reference` = mo.`order_reference`
                                        SET op.`payment_method` = "Montonio"
                                        WHERE mo.`payment_method` = "paymentInitiation"';
                $orderSql = 'UPDATE `ps_orders` o
                                 JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON o.`reference` = mo.`order_reference`
                                 SET o.`payment` = "Montonio"
                                 WHERE mo.`payment_method` = "paymentInitiation"';
                break;

            case 'payment_provider_name':
                $orderPaymentSql = 'UPDATE `ps_order_payment` op
                                        JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON op.`order_reference` = mo.`order_reference`
                                        SET op.`payment_method` = mo.`payment_provider_name`
                                        WHERE mo.`payment_method` = "paymentInitiation"';
                $orderSql = 'UPDATE `ps_orders` o
                                 JOIN `' . MontonioOrdersTableManager::TABLE_NAME . '` mo ON o.`reference` = mo.`order_reference`
                                 SET o.`payment` = mo.`payment_provider_name`
                                 WHERE mo.`payment_method` = "paymentInitiation"';
                break;

            default:
                return false;
        }

        // Execute the SQL query to update the payment method names
        $db = Db::getInstance();
        $result1 = $db->execute($orderPaymentSql);
        $result2 = $db->execute($orderSql);

        return $result1 && $result2;
    }
}
