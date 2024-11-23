<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioCheckoutHelper - Helper class for methods related to the checkout
 *
 * @since 2.0.0
 */
class MontonioCheckoutHelper
{
    /**
     * Adds a style tag to fix the logo size for Montonio payment options.
     * Normally this is done by just slapping a fixed height on the image tag with CSS,
     * however this is a more robust solution.
     *
     * @since 2.0.0
     * @return void
     */
    public static function fixImageSizeForPaymentOptions()
    {
        $montonioPaymentOptions = self::getMontonioPaymentOptionsFromPaymentOptionsFinder();
        if (!empty($montonioPaymentOptions)) {
            $style = '<style type="text/css">';
            foreach ($montonioPaymentOptions as $paymentOption) {
                $style .= '#' . htmlspecialchars($paymentOption['id']) . '-container img { height: 25px; }';
            }
            $style .= '</style>';

            echo $style;
        }
    }

    /**
     * Preselects a Montonio payment method in the checkout
     *
     * @since 2.0.0
     * @param string $id the payment method id
     * @return void
     */
    public static function preselectPaymentMethod()
    {
        $name = Configuration::get('MONTONIO_PRESELECTED_PAYMENT_METHOD');
        if (empty($name)) {
            return;
        }
        $montonioPaymentOptions = self::getMontonioPaymentOptionsFromPaymentOptionsFinder();
        if (!empty($montonioPaymentOptions)) {
            foreach ($montonioPaymentOptions as $paymentOption) {
                if ($paymentOption['montonio_payment_method'] === $name) {
                    echo '
                        <script id="montonio-payment-top">
                        document.addEventListener("DOMContentLoaded", function() {
                            setTimeout(function() {
                                document.getElementById("' . htmlspecialchars($paymentOption['id']) . '").click();
                            }, 0);
                        });
                        </script>
                    ';
                    break;
                }
            }
        }
    }

    /**
     * Redirects the customer when payment was unsuccessful. 
     *
     * @param Controller $controller the controller instance
     * @since 2.0.0
     * @since 2.0.1 triggers the hook to allow modification of the redirect URL
     * @return void
     */
    public static function showErrorPage($controller, $notifications)
    {
        MontonioHelper::setMontonioErrors($notifications);

        $redirectToErrorPageHandler = new MontonioRedirectToErrorPageHandler($controller);
        $redirectToCheckoutPageHandler = new MontonioRedirectToCheckoutErrorPageHandler($controller);

        $redirectToErrorPageHandler->setNext($redirectToCheckoutPageHandler);
        $redirectToErrorPageHandler->handle();
    }

    /**
     * Redirects the customer to the Order Thankyou page after the order has been created
     *
     * @since 2.0.0
     * @param int $idCart the cart ID
     * @param int $idOrder the order ID
     * @param int $idModule the module ID
     * @param string $key the customer secret key
     * @return void
     */
    public static function redirectCustomerToThankyouPage($idCart, $idOrder, $idModule, $key)
    {
        $context = Context::getContext();
        $thankyouPage = 'order-confirmation';

        if (MontonioHelper::isPrestashop16() && !$context->customer->isGuest()) {
            $orderConfirmationPageSetting = Configuration::get('MONTONIO_ADVANCED_ORDER_CONFIRMATION_PAGE');

            if ('order-detail' === $orderConfirmationPageSetting) {
                $thankyouPage = 'order-detail';
            }
        }

        Tools::redirect($context->link->getPageLink($thankyouPage, true, null, array(
            'id_cart' => $idCart,
            'id_module' => $idModule,
            'id_order' => $idOrder,
            'key' => $key,
        )));
    }

    /**
     * Gets the Montonio payment options from the PaymentOptionsFinder
     *
     * @since 2.0.0
     * @version 1.7+
     * @return array the Montonio payment options
     */
    private static function getMontonioPaymentOptionsFromPaymentOptionsFinder()
    {
        if (version_compare(MontonioHelper::getPrestashopVersion(), '1.7', '>=') && class_exists('PaymentOptionsFinder')) {
            $paymentOptionsFinder = new PaymentOptionsFinder();
            $paymentOptions = $paymentOptionsFinder->present();

            if (!isset($paymentOptions['montonio'])) {
                return [];
            }

            $montonioModule = MontonioHelper::getMontonioModule();
            $montonioPaymentMethods = $montonioModule->paymentMethodRegistry->getPaymentMethodNames();
            $paymentOptions['montonio'] = array_map(function ($option) use ($montonioPaymentMethods) {
                foreach ($montonioPaymentMethods as $method) {
                    if (strpos($option['action'], $method) !== false) {
                        $option['montonio_payment_method'] = $method;
                        break;
                    }
                }
                return $option;
            }, $paymentOptions['montonio']);

            return $paymentOptions['montonio'];
        }

        return array();
    }
}
