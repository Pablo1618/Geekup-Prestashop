<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioBnpl extends MontonioAbstractPaymentMethod
{
    use MontonioPaymentMethodConfigTrait;
    use MontonioGrandTotalConstraintTrait;

    public function __construct()
    {
        $this->name = 'bnpl';
        $this->displayName = 'Montonio BNPL';
        $this->title = MontonioHelper::translate('Buy Now, Pay Later');
        $this->description = MontonioHelper::translate('Pay for your order in up to 3 interest-free instalments');
        $this->configKey = 'MONTONIO_BNPL';
        $this->logoUrl = 'https://public.montonio.com/images/logos/inbank-general.svg';
        $this->supportedCurrencies = array('EUR');
        $this->supportedLocales = array('en', 'et', 'lt', 'lv');
        $this->defaultGrandTotalConstraints = array(
            'min' => 30,
            'max' => 2500,
        );
    }

    public function getConfigForm()
    {
        $inputs = array(
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable Montonio BNPL'),
                'desc' => MontonioHelper::translate('When enabled, show Montonio BNPL as a payment option at checkout'),
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
                'label' => MontonioHelper::translate('Checkout Style'),
                'desc' => MontonioHelper::translate('Select the way Montonio BNPL is shown at checkout'),
                'name' => $this->getConfigKey() . '_STYLE',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'period_selection',
                            'name' => MontonioHelper::translate('Period selection at checkout'),
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
        );

        $inputs = array_merge($inputs, $this->getGrandTotalConfig());

        return $inputs;
    }

    public function getDefaultConfig()
    {
        $defaultConfig = array(
            $this->getConfigKey() . '_ENABLED' => '0',
            $this->getConfigKey() . '_SHOW_LOGO' => '1',
            $this->getConfigKey() . '_STYLE' => 'period_selection',
        );

        $defaultConfig = array_merge($defaultConfig, $this->getDefaultGrandTotalConfig());

        return $defaultConfig;
    }

    public function getPaymentOption()
    {
        if (!$this->isEnabled() || !$this->isCartCurrencySupported()) {
            return;
        }

        $paymentOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        $paymentOption
            ->setModuleName('montonio')
            ->setCallToActionText($this->getTitle())
            ->setAction($this->getAction());

        if (Configuration::get($this->getConfigKey() . '_STYLE') == 'period_selection') {
            $paymentOption->setForm(MontonioHelper::renderTemplate(_PS_MODULE_DIR_ . 'montonio/views/templates/front/montonio_bnpl.tpl', array(
                'title' => '',
                'form_action' => $this->getAction(),
                'grand_total' => MontonioHelper::formatPrice(Context::getContext()->cart->getOrderTotal(true, Cart::BOTH)),
                'add_more_message' => MontonioHelper::translate('Add #amount to the cart to make this option available.'),
                'over_max_amount_message' => MontonioHelper::translate('Cart total exceeds maximum limit for this option.'),
                'pay_next_month' => MontonioHelper::translate('Pay next month'),
                'pay_in_two_parts' => MontonioHelper::translate('Pay in two parts'),
                'pay_in_three_parts' => MontonioHelper::translate('Pay in three parts'),
            )));
        } else {
            $paymentOption->setAdditionalInformation($this->getDescription());
        }

        if ($this->shouldShowLogo()) {
            $paymentOption->setLogo($this->logoUrl);
        }

        return $paymentOption;
    }

    public function prepareLegacyPaymentOption()
    {
        if (!$this->isGrandTotalInConstraints()) {
            return;
        }

        return parent::prepareLegacyPaymentOption();
    }

    /**
     * Adds data to smarty for the BNPL payment option to be displayed at checkout
     *
     * @since 2.0.0
     * @return void
     */
    public function prepareLegacyPaymentOptionData()
    {
        $data = parent::prepareLegacyPaymentOptionData();

        if (Configuration::get($this->getConfigKey() . '_STYLE') == 'period_selection') {
            $data['html'] = MontonioHelper::renderTemplate(_PS_MODULE_DIR_ . 'montonio/views/templates/front/montonio_bnpl.tpl', array(
                'form_action' => $data['action'],
                'title' => $data['title'],
                'grand_total' => MontonioHelper::formatPrice(Context::getContext()->cart->getOrderTotal(true, Cart::BOTH)),
                'add_more_message' => MontonioHelper::translate('Add #amount to the cart to make this option available.'),
                'over_max_amount_message' => MontonioHelper::translate('Cart total exceeds maximum limit for this option.'),
                'pay_next_month' => MontonioHelper::translate('Pay next month'),
                'pay_in_two_parts' => MontonioHelper::translate('Pay in two parts'),
                'pay_in_three_parts' => MontonioHelper::translate('Pay in three parts'),
            ));

            $data['action'] = 'javascript:void(0)';
        }

        return $data;
    }

    public function placeOrder($orderReference)
    {
        $data = $this->getBaseOrderData($orderReference);
        $data['payment'] = array(
            'method' => $this->name,
            'methodOptions' => array(
                'period' => $this->findSuitableLoanPeriod($data['grandTotal']),
            ),
            'amount' => (float) $data['grandTotal'],
            'currency' => $data['currency'],
        );

        return $this->createOrder($data);
    }

    /**
     * Find the most suitable loan period for the given grand total
     *
     * @since 2.0.0
     * @param float $grandTotal The grand total of the cart
     * @return int The most suitable loan period
     */
    private function findSuitableLoanPeriod($grandTotal)
    {
        if (Tools::getValue('montonio_bnpl_period')) {
            return (int) Tools::getValue('montonio_bnpl_period');
        }

        $period = 3;
        $grandTotal = (float) $grandTotal;
        // If the grand total is 30-74.99, the only available period is 1 month
        if ($grandTotal >= 30 && $grandTotal <= 74.99) {
            $period = 1;
        }

        return $period;
    }
}
