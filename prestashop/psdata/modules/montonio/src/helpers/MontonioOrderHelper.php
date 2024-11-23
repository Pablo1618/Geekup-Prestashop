<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioOrderHelper registers new order statuses and updates order statuses based on payment statuses.
 *
 * @since 2.0.0
 * @package Montonio
 */
class MontonioOrderHelper
{
    /**
     * The mapping of payment statuses to order statuses
     *
     * @since 2.0.0
     * @var array
     */
    const NEW_ORDER_STATUS_MAP = array(
        'ABANDONED' => 'PS_OS_MONTONIO_PAYMENT_ABANDONED',
        'PENDING' => 'PS_OS_MONTONIO_PAYMENT_PENDING',
        'PAID' => 'PS_OS_PAYMENT',
        'VOIDED' => 'PS_OS_MONTONIO_PAYMENT_VOIDED',
        'PARTIALLY_REFUNDED' => 'PS_OS_MONTONIO_PAYMENT_PARTIALLY_REFUNDED',
        'REFUNDED' => 'PS_OS_REFUND',
        'AUTHORIZED' => 'PS_OS_MONTONIO_PAYMENT_AUTHORIZED',
    );

    /**
     * The priority of payment statuses
     *
     * @since 2.0.0
     * @var array
     */
    const STATUS_PRIORITY = [
        'UNKNOWN' => 0,
        'PENDING' => 1,
        'ABANDONED' => 2,
        'CANCELED' => 3,
        'AUTHORIZED' => 4,
        'PAID' => 5,
        'VOIDED' => 6,
        'PARTIALLY_REFUNDED' => 7,
        'REFUNDED' => 8,
    ];

    /**
     * Registers Montonio order statuses.
     *
     * @since 2.0.0
     * @return bool Returns true after all statuses are registered.
     */
    public static function registerMontonioOrderStatuses()
    {
        $statuses = [
            'Montonio Payment Pending' => '#FFD700',
            'Montonio Payment Abandoned' => '#2C3E50',
            'Montonio Payment Authorized' => '#34209E',
            'Montonio Payment Voided' => '#2C3E50',
            'Montonio Partially Refunded' => '#01B887',
            'Montonio Payment Amount Error' => '#E74C3C',
        ];

        foreach ($statuses as $name => $color) {
            self::ensureOrderStateExists($name, $color, 'montonio');
        }

        return true;
    }

    /**
     * Ensures that an order state exists. If it doesn't, it creates it.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @param string $color The color of the order state.
     * @param string $moduleName The module name associated with the order state.
     * @return void
     */
    private static function ensureOrderStateExists($name, $color, $moduleName)
    {
        $state = self::getOrderStateByName($name);
        if ($state) {
            self::updateConfiguration($name, $state['id_order_state']);
        } else {
            $stateId = self::createOrderState($name, $color, $moduleName);
            self::updateConfiguration($name, $stateId);
        }
    }

    /**
     * Gets an order state by its name.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @return array|false The order state if found, false otherwise.
     */
    private static function getOrderStateByName($name)
    {
        $states = OrderState::getOrderStates((int) Context::getContext()->language->id);
        foreach ($states as $state) {
            if (in_array($name, $state)) {
                return $state;
            }
        }
        return false;
    }

    /**
     * Creates a new order state.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @param string $color The color of the order state.
     * @param string $moduleName The module name associated with the order state.
     * @return int|null The ID of the created order state, or null if creation failed.
     */
    private static function createOrderState($name, $color, $moduleName)
    {
        $orderState = new OrderState();
        $orderState->color = $color;
        $orderState->send_email = false;
        $orderState->module_name = $moduleName;
        $orderState->visibility = '1';
        $orderState->name = self::getOrderStateNames($name);
        $orderState->add();
        Cache::clean('OrderState::getOrderStates_*');

        $state = self::getOrderStateByName($name);
        return $state ? $state['id_order_state'] : null;
    }

    /**
     * Gets the names for an order state in all languages.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @return array The order state names indexed by language ID.
     */
    private static function getOrderStateNames($name)
    {
        $names = [];
        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $names[$language['id_lang']] = $name;
        }
        return $names;
    }

    /**
     * Updates the configuration with the order state ID.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @param int $stateId The ID of the order state.
     * @return void
     */
    private static function updateConfiguration($name, $stateId)
    {
        $configKey = self::getConfigKey($name);
        if ($configKey) {
            Configuration::updateValue($configKey, (int) $stateId);
        }
    }

    /**
     * Gets the configuration key for a given order state name.
     *
     * @since 2.0.0
     * @param string $name The name of the order state.
     * @return string|null The configuration key, or null if no key is found.
     */
    private static function getConfigKey($name)
    {
        switch ($name) {
            case 'Montonio Payment Pending':
                return 'PS_OS_MONTONIO_PAYMENT_PENDING';
            case 'Montonio Payment Abandoned':
                return 'PS_OS_MONTONIO_PAYMENT_ABANDONED';
            case 'Montonio Payment Authorized':
                return 'PS_OS_MONTONIO_PAYMENT_AUTHORIZED';
            case 'Montonio Payment Voided':
                return 'PS_OS_MONTONIO_PAYMENT_VOIDED';
            case 'Montonio Partially Refunded':
                return 'PS_OS_MONTONIO_PAYMENT_PARTIALLY_REFUNDED';
            case 'Montonio Payment Amount Error':
                return 'PS_OS_MONTONIO_PAYMENT_AMOUNT_ERROR';
            default:
                return null;
        }
    }

    /**
     * Check if order has ever been in a specific status.
     *
     * @since 2.0.0
     * @param int $orderId Order ID to check.
     * @param int $statusId Status ID to check for.
     * @return bool Returns true if the status has been applied, false otherwise.
     */
    public static function hasStatusBeenApplied($orderId, $statusId)
    {
        // Escape the inputs to prevent SQL injection
        $orderId = (int) $orderId;
        $statusId = (int) $statusId;

        // Prepare SQL with the escaped values
        $sql = '
            SELECT COUNT(*) as status_count
            FROM ' . _DB_PREFIX_ . 'order_history oh
            WHERE oh.id_order = ' . $orderId . ' AND oh.id_order_state = ' . $statusId;

        // Execute the query
        $query = Db::getInstance()->getRow($sql);

        // Return true if count is more than 0
        return (int) $query['status_count'] > 0;
    }

    /**
     * Get the new order status based on the payment status from Montonio.
     *
     * @since 2.0.0
     * @param string $paymentStatus The payment status from Montonio.
     * @return int|false The new order status ID, or false if no status is found.
     */
    public static function getNewOrderStatus($paymentStatus)
    {
        return self::NEW_ORDER_STATUS_MAP[$paymentStatus]
        ? Configuration::get(self::NEW_ORDER_STATUS_MAP[$paymentStatus])
        : false;
    }

    /**
     * Get the current status of an order.
     *
     * @since 2.0.0
     * @param Order $order
     * @return string
     */
    private static function getCurrentPaymentStatus($order)
    {
        $currentState = $order->getCurrentState();
        foreach (self::NEW_ORDER_STATUS_MAP as $status => $stateName) {
            if (Configuration::get($stateName) == $currentState) {
                return $status;
            }
        }
        return 'UNKNOWN';
    }

    /**
     * Check if the order status should be updated.
     *
     * @since 2.0.0
     * @since 2.0.6 Now returns false if the order is not a Montonio order.
     * @param Order $order The order to check.
     * @param string $paymentStatus The payment status from Montonio.
     * @return boolean
     */
    public static function shouldUpdateOrderStatus($order, $paymentStatus)
    {
        // if the order is not montonio order, do not update status
        if ($order->module !== 'montonio') {
            return false;
        }

        // Check if order has already been in this payment status
        $paymentStatusId = Configuration::get(self::NEW_ORDER_STATUS_MAP[$paymentStatus]);
        if (self::hasStatusBeenApplied($order->id, $paymentStatusId)) {
            return false;
        }

        // Get the current payment status
        $currentPaymentStatus = self::getCurrentPaymentStatus($order);
        return self::STATUS_PRIORITY[$paymentStatus] > self::STATUS_PRIORITY[$currentPaymentStatus];
    }

    /**
     * Gets the order ID by the cart ID
     *
     * @since 2.0.0
     * @param $cartId the cart ID
     * @return int the order ID
     */
    public static function getOrderIdByCartId($cartId)
    {
        if (method_exists('Order', 'getIdByCartId')) {
            return Order::getIdByCartId($cartId);
        } else {
            return Order::getOrderByCartId($cartId);
        }
    }

    /**
     * Gets the order by the cart ID
     *
     * @since 2.0.0
     * @param $cartId the cart ID
     * @return Order the order
     */
    public static function getOrderByCartId($cartId)
    {
        $id = self::getOrderIdByCartId($cartId);
        return new Order($id);
    }

    /**
     * Get the current order processing strategy based on shop configuration
     *
     * @since 2.0.0
     * @return MontonioOrderProcessingStrategy The order processing strategy
     */
    public static function getCurrentOrderProcessingStrategy()
    {
        $strategy = Configuration::get('MONTONIO_ORDER_PROCESSING_STRATEGY');
        return self::getOrderProcessingStrategy($strategy);
    }

    /**
     * Get the order processing strategy based on the provided strategy
     *
     * @since 2.0.0
     * @param string $strategy The order processing strategy
     * @return MontonioOrderProcessingStrategy The order processing strategy
     */
    public static function getOrderProcessingStrategy($strategy)
    {
        switch ($strategy) {
            case 'before_payment':
                return new MontonioBeforePaymentOrderProcessing();
            default:
                return new MontonioAfterPaymentOrderProcessing();
        }
    }
}
