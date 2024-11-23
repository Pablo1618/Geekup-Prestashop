<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioPayments extends MontonioAbstractPaymentMethod
{
    use MontonioPaymentMethodConfigTrait;
    use MontonioPaymentsCheckoutTrait;
    use MontonioRefundablePaymentMethodTrait;

    public function __construct()
    {
        $this->name = 'paymentInitiation';
        $this->displayName = 'Montonio Bank Payments';
        $this->title = MontonioHelper::translate('Pay with your bank');
        $this->description = MontonioHelper::translate('Complete the purchase with a direct payment from your bank account.');
        $this->configKey = 'MONTONIO_PAYMENTS';
        $this->logoUrl = 'https://public.montonio.com/logo/montonio-logomark-s.png';
        $this->supportedCurrencies = array('EUR', 'PLN');
        $this->supportedLocales = array('de', 'en', 'et', 'fi', 'lt', 'lv', 'pl');
    }

    public function getConfigForm()
    {
        return array(
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable Montonio Bank Payments'),
                'desc' => MontonioHelper::translate('When enabled, show Montonio Bank Payments as a payment option at checkout'),
                'is_bool' => true,
                'name' => $this->getConfigKey() . '_ENABLED',
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => 'Yes',
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => 'No',
                    ),
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Payment method name'),
                'desc' => MontonioHelper::translate('Select the way the payment method name is shown in order details and in the admin panel.')
                . '<br><strong>' . MontonioHelper::translate('NB! Ticking the "Update old orders" checkbox might not be not performant if you have a lot of orders.')
                . '</strong>',
                'name' => $this->getConfigKey() . '_DISPLAY_NAME_MODE',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'payment_method_name_and_payment_provider_name',
                            'name' => MontonioHelper::translate('Montonio Bank Payments (Bank Name)'),
                        ),
                        array(
                            'id' => 'payment_method_name',
                            'name' => MontonioHelper::translate('Montonio Bank Payments'),
                        ),
                        array(
                            'id' => 'module_display_name',
                            'name' => 'Montonio',
                        ),
                        array(
                            'id' => 'payment_provider_name',
                            'name' => MontonioHelper::translate('Bank Name'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Checkout Style'),
                'desc' => MontonioHelper::translate('Select the way the Montonio Bank Payments will be displayed at checkout'),
                'name' => $this->getConfigKey() . '_STYLE',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'banklist',
                            'name' => MontonioHelper::translate('Bank Selection at Checkout'),
                        ),
                        array(
                            'id' => 'title',
                            'name' => MontonioHelper::translate('Show title only'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Show logo?'),
                'desc' => MontonioHelper::translate("You can turn this off if you do not want to show Montonio logo at checkout"),
                'is_bool' => true,
                'name' => $this->getConfigKey() . '_SHOW_LOGO',
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => 'Yes',
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => 'No',
                    ),
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Default Country'),
                'desc' => MontonioHelper::translate('The country whose banks to show first at checkout.'),
                'name' => $this->getConfigKey() . '_DEFAULT_COUNTRY',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'EE',
                            'name' => MontonioHelper::translate('Estonia'),
                        ),
                        array(
                            'id' => 'FI',
                            'name' => MontonioHelper::translate('Finland'),
                        ),
                        array(
                            'id' => 'LV',
                            'name' => MontonioHelper::translate('Latvia'),
                        ),
                        array(
                            'id' => 'LT',
                            'name' => MontonioHelper::translate('Lithuania'),
                        ),
                        array(
                            'id' => 'PL',
                            'name' => MontonioHelper::translate('Poland'),
                        ),
                        array(
                            'id' => 'DE',
                            'name' => MontonioHelper::translate('Germany'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Hide Country Selection Dropdown'),
                'desc' => MontonioHelper::translate('You can turn this off if you do not want to show country select element at checkout.'),
                'is_bool' => true,
                'name' => $this->getConfigKey() . '_HIDE_COUNTRY',
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => 'Yes',
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => 'No',
                    ),
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Country by checkout data'),
                'desc' => MontonioHelper::translate('Should we attempt to change the selected country by checkout data?')
                . ' ' . MontonioHelper::translate('If unsuccessful, we revert to your configured Default Country.'),
                'name' => $this->getConfigKey() . '_AUTOMATICALLY_CHANGE_COUNTRY',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'manual',
                            'name' => MontonioHelper::translate('No, show the configured Default Country'),
                        ),
                        array(
                            'id' => 'byLocaleIso',
                            'name' => MontonioHelper::translate('Select country by locale'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Country Dropdown Language'),
                'desc' => MontonioHelper::translate('How should the countries in the checkout dropdown be shown?'),
                'name' => $this->getConfigKey() . '_TRANSLATE_COUNTRY_DROPDOWN',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'english',
                            'name' => MontonioHelper::translate('in English'),
                        ),
                        array(
                            'id' => 'translated',
                            'name' => MontonioHelper::translate('Translated'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
        );
    }

    public function getDefaultConfig()
    {
        return array(
            $this->getConfigKey() . '_ENABLED' => '0',
            $this->getConfigKey() . '_DISPLAY_NAME_MODE' => 'payment_method_name_and_payment_provider_name',
            $this->getConfigKey() . '_CREATE_ORDER' => 'before',
            $this->getConfigKey() . '_SHOW_LOGO' => '1',
            $this->getConfigKey() . '_HIDE_COUNTRY' => '0',
            $this->getConfigKey() . '_DEFAULT_COUNTRY' => 'EE',
            $this->getConfigKey() . '_PAYMENT_HANDLE_CSS' => '',
            $this->getConfigKey() . '_AUTOMATICALLY_CHANGE_COUNTRY' => 'manual',
            $this->getConfigKey() . '_AUTOMATICALLY_SELECT_METHOD' => 'no',
            $this->getConfigKey() . '_TRANSLATE_COUNTRY_DROPDOWN' => 'english',
        );
    }

    /**
     * Get Payment Option to be displayed at checkout
     *
     * @return PaymentOption|null Payment option instance or null if not enabled or some other condition is not met
     */
    public function getPaymentOption()
    {
        if (!$this->isEnabled() || !$this->isCartCurrencySupported()) {
            return;
        }

        $montonioModule = MontonioHelper::getMontonioModule();
        $paymentForm = '';

        if ('banklist' === Configuration::get($this->getConfigKey() . '_STYLE')) {
            $paymentForm = $this->getContentHtml();
        }

        $paymentOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        $paymentOption
            ->setModuleName($montonioModule->name)
            ->setAction($this->getAction())
            ->setCallToActionText($this->getTitle());

        if (!empty($paymentForm)) {
            $paymentOption->setForm($paymentForm);
        }

        $shouldShowLogo = Configuration::get($this->getConfigKey() . '_SHOW_LOGO');
        if ('0' != $shouldShowLogo) {
            $paymentOption->setLogo($this->getLogoUrl());
        }

        return $paymentOption;
    }

    /**
     * Adds HTML content to the payment option
     *
     * @since 2.0.0
     * @return void
     */
    public function prepareLegacyPaymentOptionData()
    {
        $data = parent::prepareLegacyPaymentOptionData();

        if (Configuration::get($this->getConfigKey() . '_STYLE') !== 'title') {
            $data['html'] = $this->getContentHtml(
                $this->getTitle()
            );
            // Makes sure we don't submit the form if the user has not selected a bank
            $data['action'] = 'javascript:void(0);';
        }

        return $data;
    }

    /**
     * Get the bank list and cache it for 24 hours
     *
     * @since 2.0.0
     * @return array The list of banks to show at checkout
     */
    public function getBanklist()
    {
        $shouldSync = MontonioPaymentMethodHelper::isTimeToSyncPaymentMethods();
        if ($shouldSync) {
            $environment = Configuration::get('MONTONIO_ENVIRONMENT');
            $api = new MontonioStargateApi(
                Configuration::get('MONTONIO_ACCESS_KEY'),
                Configuration::get('MONTONIO_SECRET_KEY'),
                $environment
            );

            $response = $api->getPaymentMethods();

            if (200 != $response['status']) {
                MontonioLogger::addLog('Failed to get bank list from Montonio API', 2);
                return array();
            }

            Configuration::updateValue('MONTONIO_BANKLIST', json_encode($response['body']));
            Configuration::updateValue('MONTONIO_LAST_SYNCED_AT_TIMESTAMP', time());
            Configuration::updateValue('MONTONIO_LAST_SYNCED_AT_ENVIRONMENT', $environment);
        }

        return Configuration::get('MONTONIO_BANKLIST');
    }

    /**
     * Place an order with Montonio Bank Payments
     *
     * @since 2.0.0
     * @return array The response from the Montonio API
     */
    public function placeOrder($orderReference)
    {
        $data = $this->getBaseOrderData($orderReference);
        $data['payment'] = array(
            'method' => $this->name,
            'methodOptions' => array(
                'paymentDescription' => strip_tags('Payment for card ' . $data['merchantReference']),
                'preferredCountry' => $this->getPreselectedCountry(),
                'preferredLocale' => $data['locale'],
                'preferredProvider' => Tools::getValue('preselectedAspsp') ? Tools::getValue('preselectedAspsp') : null,
            ),
            'amount' => $data['grandTotal'],
            'currency' => $data['currency'],
        );

        return $this->createOrder($data);
    }

    /**
     * Get the preselected country for the checkout banklist dropdown
     *
     * @return string The preselected country code (ISO 3166-1 alpha-2)
     */
    private function getPreselectedCountry()
    {
        $preselectedCountry = Configuration::get($this->getConfigKey() . '_DEFAULT_COUNTRY');
        if (empty($preselectedCountry)) {
            $preselectedCountry = 'EE';
        }

        $countryPreselectionMode = Configuration::get($this->getConfigKey() . '_AUTOMATICALLY_CHANGE_COUNTRY');
        if ('byLocaleIso' == $countryPreselectionMode) {
            $customerLocale = Context::getContext()->language->iso_code;
            $regionsByLanguage = array(
                'et' => 'EE',
                'fi' => 'FI',
                'lv' => 'LV',
                'lt' => 'LT',
                'pl' => 'PL',
                'de' => 'DE',
            );

            if (isset($regionsByLanguage[$customerLocale])) {
                $preselectedCountry = $regionsByLanguage[$customerLocale];
            }
        }

        // if there is a submitted preselectedCountry and it's not empty, we use it
        if (Tools::getValue('preselectedCountry') && !empty(Tools::getValue('preselectedCountry'))) {
            $preselectedCountry = Tools::getValue('preselectedCountry');
        }

        return $preselectedCountry;
    }

    /**
     * Get the name of the module for when calling PaymentModule::validateOrder()
     *
     * @since 2.0.0
     * @param object $orderTokenData The token data object containing order details
     * @return string
     */
    public function getNameForPlacingOrder($orderTokenData)
    {
        $displayNameMode = Configuration::get($this->getConfigKey() . '_DISPLAY_NAME_MODE');
        $paymentProviderName = !empty($orderTokenData->paymentProviderName) ? $orderTokenData->paymentProviderName : '';

        switch ($displayNameMode) {
            case 'payment_method_name_and_payment_provider_name':
                return 'Montonio Bank Payments' . ($paymentProviderName ? " ($paymentProviderName)" : '');
            case 'payment_provider_name':
                return $paymentProviderName ? $paymentProviderName : $this->getDisplayName();
            case 'module_display_name':
                return 'Montonio';
            default:
                return $this->getDisplayName();
        }
    }
}
