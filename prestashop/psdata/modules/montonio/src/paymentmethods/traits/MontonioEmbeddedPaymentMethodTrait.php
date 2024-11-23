<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioEmbeddedPaymentMethodTrait
 * - adds support for embedded payment methods for an MontonioAbstractPaymentMethod
 *
 * @since 2.0.0
 */
trait MontonioEmbeddedPaymentMethodTrait
{
    use MontonioEmbeddedPaymentMethodConfigTrait;

    /**
     * Get the embedded payment option
     *
     * @since 2.0.0
     * @since 2.0.2 - always creates a new PaymentIntent draft, instead of reusing an existing one.
     * @return PaymentOption|false The payment option or false if the request failed
     */
    public function getEmbeddedPaymentOption()
    {
        $paymentIntentDraft = $this->createPaymentIntentDraft($this->name);

        if (null === $paymentIntentDraft) {
            MontonioHelper::setMontonioErrors(array('Failed to initialize payment fields in checkout.'));
            return false;
        }

        $formAction = $this->getAction(array(
            'paymentIntentUuid' => $paymentIntentDraft['payment_intent_uuid'],
            'isAjax' => '1',
            'isEmbedded' => '1',
        ));

        $locale = Language::getIsoById(Context::getContext()->cookie->id_lang);
        $country = 'EE';
        $address = MontonioCartHelper::getAddressData();
        if (isset($address['shippingAddress']['country'])) {
            $country = $address['shippingAddress']['country'];
        } else if (isset($address['billingAddress']['country'])) {
            $country = $address['billingAddress']['country'];
        }

        Context::getContext()->smarty->assign(array(
            'montonio_embedded_form_submit_text' => '',
            'montonio_embedded_form_action' => $formAction,
            'montonio_embedded_error_controller_url' => Context::getContext()->link->getModuleLink('montonio', 'error', array(), true),
            'montonio_embedded_form_id' => 'montonio-embedded-form-' . $paymentIntentDraft['payment_intent_uuid'],
            'montonio_embedded_payment_intent_uuid' => $paymentIntentDraft['payment_intent_uuid'],
            'montonio_embedded_stripe_client_secret' => $paymentIntentDraft['stripe_client_secret'],
            'montonio_embedded_stripe_public_key' => $paymentIntentDraft['stripe_public_key'],
            'montonio_embedded_is_sandbox' => Configuration::get('MONTONIO_ENVIRONMENT') === 'sandbox',
            'montonio_embedded_locale' => $locale,
            'montonio_embedded_country' => $country,
            'montonio_embedded_method_name' => $this->getName(),
        ));

        $paymentOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        $paymentOption
            ->setModuleName('montonio')
            ->setAction($formAction)
            ->setCallToActionText($this->getTitle());

        if ($this->shouldShowLogo()) {
            $paymentOption->setLogo($this->getLogoUrl());
        }

        $montonioModule = MontonioHelper::getMontonioModule();
        $paymentForm = $montonioModule->fetch('module:montonio/views/templates/front/montonio_embedded_payment.tpl');
        $paymentOption->setForm($paymentForm);

        return $paymentOption;
    }

    /**
     * Prepare the embedded legacy payment option data
     *
     * @since 2.0.0
     * @since 2.0.2 - returns the API response without saving the entity to the database.
     * @return array|false The payment option data or false if the request failed
     */
    public function prepareEmbeddedLegacyPaymentOptionData()
    {
        $paymentIntentDraft = $this->createPaymentIntentDraft($this->name);
        if (null === $paymentIntentDraft) {
            MontonioHelper::setMontonioErrors(array('Failed to initialize payment fields in checkout.'));
            return false;
        }

        $locale = Language::getIsoById(Context::getContext()->cookie->id_lang);
        $country = 'EE';
        $address = MontonioCartHelper::getAddressData();
        if (isset($address['shippingAddress']['country'])) {
            $country = $address['shippingAddress']['country'];
        } else if (isset($address['billingAddress']['country'])) {
            $country = $address['billingAddress']['country'];
        }

        Context::getContext()->smarty->assign(array(
            'montonio_embedded_form_submit_text' => $this->getTitle(),
            'montonio_embedded_form_id' => 'montonio-embedded-form-' . $paymentIntentDraft['payment_intent_uuid'],
            'montonio_embedded_is_sandbox' => Configuration::get('MONTONIO_ENVIRONMENT') === 'sandbox',
            'montonio_embedded_is_embedded' => true,
            'montonio_embedded_stripe_public_key' => $paymentIntentDraft['stripe_public_key'],
            'montonio_embedded_payment_intent_uuid' => $paymentIntentDraft['payment_intent_uuid'],
            'montonio_embedded_form_action' => $this->getAction(array(
                'paymentIntentUuid' => $paymentIntentDraft['payment_intent_uuid'],
                'isAjax' => '1',
                'isEmbedded' => '1',
            )),
            'montonio_embedded_stripe_client_secret' => $paymentIntentDraft['stripe_client_secret'],
            'montonio_embedded_error_controller_url' => Context::getContext()->link->getModuleLink('montonio', 'error', array(), true),
            'montonio_embedded_locale' => $locale,
            'montonio_embedded_country' => $country,
            'montonio_embedded_method_name' => $this->getName(),
        ));

        return array(
            'name' => $this->getName(),
            'display_name' => $this->getDisplayName(),
            'config_key' => $this->getConfigKey(),
            'action' => 'javascript:void(0);',
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'show_logo' => $this->shouldShowLogo(),
            'logo_url' => $this->getLogoUrl(),
            'locale' => $locale,
            'country' => $country,
            'is_embedded' => true,
            'html' => MontonioHelper::renderTemplate(_PS_MODULE_DIR_ . 'montonio/views/templates/front/montonio_embedded_payment.tpl'),
        );
    }

    /**
     * Create a payment intent draft in the Montonio API and store it in the database
     *
     * @since 2.0.0
     * @since 2.0.2 - returns the API response without saving the entity to the database.
     * @param string $method The payment method. Supported values are 'cardPayments' and 'blik'
     * @return array|null The response data or null if the request failed
     */
    private function createPaymentIntentDraft($method)
    {
        $api = new MontonioStargateApi(
            Configuration::get('MONTONIO_ACCESS_KEY'),
            Configuration::get('MONTONIO_SECRET_KEY'),
            Configuration::get('MONTONIO_ENVIRONMENT')
        );

        $response = $api->createPaymentIntentDraft(array(
            'method' => $method,
        ));

        if (!in_array($response['status'], array(200, 201))) {
            $message = isset($response['body']['message']) ? $response['body']['message'] : 'Unknown error';
            MontonioLogger::addLog('Failed to create payment intent draft with error: ' . $message, 2);
            return null;
        }

        return array(
            'cart_id' => (int) Context::getContext()->cart->id,
            'is_sandbox' => Configuration::get('MONTONIO_ENVIRONMENT') === 'sandbox',
            'customer_id' => (int) Context::getContext()->cart->id_customer,
            'stripe_public_key' => $response['body']['stripePublicKey'],
            'payment_intent_uuid' => $response['body']['uuid'],
            'stripe_client_secret' => $response['body']['stripeClientSecret'],
            'montonio_payment_method' => $method,
        );
    }

    /**
     * Get the base order data
     *
     * @since 2.0.0
     * @param string $orderReference The order reference
     * @return string The logo URL
     */
    public function getBaseOrderData($orderReference)
    {
        $data = parent::getBaseOrderData($orderReference);
        if ($this->isEmbedded()) {
            $paymentIntentUuid = Tools::getValue('paymentIntentUuid');
            if (!MontonioHelper::isValidUuid($paymentIntentUuid)) {
                throw new PrestaShopException('Invalid payment intent UUID');
            }

            $data['paymentIntentUuid'] = Tools::getValue('paymentIntentUuid');
        }

        return $data;
    }

    /**
     * Prepare the legacy payment option data (overrides the parent method)
     *
     * @since 2.0.0
     * @return array The payment option data
     */
    public function prepareLegacyPaymentOptionData()
    {
        if ($this->isEmbedded()) {
            return $this->prepareEmbeddedLegacyPaymentOptionData();
        }

        return parent::prepareLegacyPaymentOptionData();
    }
}
