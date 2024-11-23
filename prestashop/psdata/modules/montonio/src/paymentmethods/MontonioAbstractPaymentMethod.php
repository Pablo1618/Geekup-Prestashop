<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Abstract class for Montonio payment methods
 *
 * @since 2.0.0
 */
abstract class MontonioAbstractPaymentMethod
{
    /**
     * Get the configuration form for the payment method
     *
     * @since 2.0.0
     * @return array The configuration form structure
     */
    abstract public function getConfigForm();
    /**
     * Get the default configuration for the payment method
     *
     * @since 2.0.0
     * @return array The default configuration
     */
    abstract public function getDefaultConfig();
    /**
     * Get the PrestaShop payment option to be displayed at checkout
     *
     * @since 2.0.0
     * @return PaymentOption The PrestaShop payment option
     */
    abstract public function getPaymentOption();
    /**
     * Get the data to redirect the customer to Montonio's payment gateway after clicking Place Order
     *
     * @param string $orderReference The order reference
     * @since 2.0.0
     * @return array The data which is used to redirect the customer to Montonio's payment gateway
     */
    abstract public function placeOrder($orderReference);

    /**
     * Check if the cart currency is supported by the payment method
     *
     * @since 2.0.0
     * @return bool True if the cart currency is supported, false otherwise
     */
    public function isCartCurrencySupported()
    {
        try {
            $idCurrency = (int) Context::getContext()->cart->id_currency;
            $currency = new Currency($idCurrency);
            $currencyCode = $currency->iso_code;

            return isset($currencyCode) && in_array($currencyCode, $this->getSupportedCurrencies());
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Will collect the base order data for the Montonio order creation
     *
     * @since 2.0.0
     * @return array The base order data
     */
    public function getBaseOrderData($orderReference)
    {
        $context = Context::getContext();
        $cart = $context->cart;
        $customer = $context->customer;
        $montonioModule = MontonioHelper::getMontonioModule();
        $merchantReference = $orderReference;
        $notificationUrlArgs = array(
            'method' => $this->getName(),
            'id_cart' => $cart->id,
            'id_module' => $montonioModule->id,
            'key' => $customer->secure_key,
            'is_notification' => 'yes',
        );
        $returnUrlArgs = array(
            'method' => $this->getName(),
            'id_cart' => $cart->id,
            'id_module' => $montonioModule->id,
            'key' => $customer->secure_key,
        );

         // Shipping modules' Integration ********************************************************
         $carrier = new Carrier($cart->id_carrier);
         $carrierInfo = null;
         $carrierName = $carrier->external_module_name;
         if ($carrierName) {
             $key = $carrierName . '_' . $cart->id_address_delivery;
             if (isset($context->cookie->$key)) {
                 $carrierInfo = $context->cookie->$key;
             }
         }
 
         if ($carrierInfo) {
            $notificationUrlArgs['extra_data'] = array($key => $carrierInfo);
            $returnUrlArgs['extra_data'] = array($key => $carrierInfo);
         }
         // /Shipping modules' Integration *******************************************************
        
        $currency = new Currency($cart->id_currency);
        $grandTotal = MontonioHelper::formatPrice($cart->getOrderTotal(true, Cart::BOTH));
        $customerLanguage = new Language($customer->id_lang);
        $data = array(
            'accessKey' => Configuration::get('MONTONIO_ACCESS_KEY'),
            'merchantReference' => $merchantReference,
            'returnUrl' => $context->link->getModuleLink('montonio', 'webhook', $returnUrlArgs),
            'notificationUrl' => $context->link->getModuleLink('montonio', 'webhook', $notificationUrlArgs),
            'currency' => $currency->iso_code,
            'grandTotal' => $grandTotal,
            'locale' => in_array($customerLanguage->iso_code, $this->getSupportedLocales()) ? $customerLanguage->iso_code : 'en',
        );

        $addressData = MontonioCartHelper::getAddressData();
        $data = array_merge($data, $addressData);

        return $data;
    }

    /**
     * Create an order in Montonio
     *
     * @since 2.0.0
     * @param array $data The order data
     * @return array The response data
     */
    public function createOrder($data)
    {
        $api = new MontonioStargateApi(
            Configuration::get('MONTONIO_ACCESS_KEY'),
            Configuration::get('MONTONIO_SECRET_KEY'),
            Configuration::get('MONTONIO_ENVIRONMENT')
        );

        Hook::exec('actionMontonioBeforeCreateOrder', array('data' => &$data));

        return $api->createOrder($data);
    }

    /**
     * Create a refund in Montonio
     *
     * @since 2.0.0
     * @param Order $order The order
     * @param float $amount The amount to refund
     * @return array|null The refund response or null if the refund failed.
     * @throws Exception if the method is not implemented
     */
    public function createRefund($order, $amount)
    {
        throw new PrestaShopException('Method not implemented');
    }

    /**
     * Get the name of the module for when calling PaymentModule::validateOrder()
     *
     * @since 2.0.0
     * @return string
     */
    public function getNameForPlacingOrder($orderTokenData)
    {
        return $this->getDisplayName();
    }

    /**
     * Get the action URL for the payment method
     *
     * @since 2.0.0
     * @param array $args The arguments to be added to the URL
     * @return string The action URL
     */
    public function getAction($args = array())
    {
        if (!is_array($args)) {
            $args = array();
        }
        return Context::getContext()->link->getModuleLink('montonio', 'payment', array_merge($args, array('method' => $this->getName())));
    }

    /**
     * Render the payment option for PrestaShop 1.6
     *
     * @since 2.0.0
     * @return void The method renders the payment option directly and does not return anything
     */
    public function prepareLegacyPaymentOption()
    {
        if (!$this->isEnabled() || !$this->isCartCurrencySupported()) {
            return;
        }

        $context = Context::getContext();
        $montonio_payment_options = $context->smarty->getTemplateVars('montonio_payment_options');
        $data = $this->prepareLegacyPaymentOptionData();
        if ($data) {
            $montonio_payment_options[] = $data;
        }

        $context->smarty->assign('montonio_payment_options', $montonio_payment_options);
    }

    /**
     * Get the data for the legacy payment option
     *
     * @since 2.0.0
     * @return array The data for the legacy payment option
     */
    public function prepareLegacyPaymentOptionData()
    {
        return array(
            'name' => $this->getName(),
            'display_name' => $this->getDisplayName(),
            'config_key' => $this->getConfigKey(),
            'action' => $this->getAction(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'show_logo' => $this->shouldShowLogo(),
            'logo_url' => $this->getLogoUrl(),
            'is_embedded' => $this->isEmbedded(),
            'html' => '',
        );
    }

    /**
     * Check if the payment method is currently set to be embedded in the checkout.
     *
     * @since 2.0.0
     * @return boolean
     */
    public function isEmbedded()
    {
        return false;
    }

    /**
     * Check if the payment method is refundable.
     *
     * @since 2.0.0
     * @return boolean
     */
    public function isRefundable()
    {
        return false;
    }

}
