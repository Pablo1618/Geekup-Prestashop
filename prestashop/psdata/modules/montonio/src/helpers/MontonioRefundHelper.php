<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioRefundHelper
{
    /**
     * Handles the hookActionObjectOrderSlipAddAfter event.
     *
     * @since 2.0.0
     * @param array $params Hook parameters
     * @return void
     */
    public static function handleRefundCreationHook($params)
    {
        $orderId = isset($params['object']->id_order) ? (int) $params['object']->id_order : null;
        if (!$orderId) {
            return;
        }

        $order = new Order($orderId);
        if ('montonio' !== $order->module) {
            return;
        }

        $paymentMethod = MontonioPaymentMethodHelper::getPaymentMethodByOrder($order);
        if (!$paymentMethod) {
            return;
        }

        if (!$paymentMethod->isRefundable()) {
            return;
        }

        $refundAmount = isset($params['object']->total_products_tax_incl) && isset($params['object']->total_shipping_tax_incl)
        ? $params['object']->total_products_tax_incl + $params['object']->total_shipping_tax_incl
        : 0;

        $refundAmount = MontonioHelper::formatPrice($refundAmount);

        $response = $paymentMethod->createRefund($order, $refundAmount);
        if (!$response || !in_array($response['status'], array(200, 201))) {
            $errorMessage = 'Failed to create refund: ' . json_encode($response);
            MontonioLogger::addLog($errorMessage, 3);
            Context::getContext()->controller->errors[] = $errorMessage . '. Credit slip was created, please verify the refund in the Montonio Partner System.';
            return;
        }

        $successMessage = 'Refund created in Montonio for order ' . $orderId . ' with amount ' . $response['body']['amount'] . ' ' . $response['body']['currency'];

        $orderMessage = new Message();
        $orderMessage->id_order = $orderId;
        $orderMessage->message = $successMessage;
        $orderMessage->private = true;
        $orderMessage->save();

        MontonioLogger::addLog($successMessage, 1);
    }
}
