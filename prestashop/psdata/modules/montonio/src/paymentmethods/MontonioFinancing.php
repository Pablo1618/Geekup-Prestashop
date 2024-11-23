<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioFinancing extends MontonioAbstractPaymentMethod
{
    use MontonioPaymentMethodConfigTrait;
    use MontonioGrandTotalConstraintTrait;

    public function __construct()
    {
        $this->name = 'hirePurchase';
        $this->displayName = 'Montonio Financing';
        $this->title = MontonioHelper::translate('Financing');
        $this->description = MontonioHelper::translate('Pay for your order in 3-72 instalments');
        $this->configKey = 'MONTONIO_FINANCING';
        $this->logoUrl = 'https://public.montonio.com/images/logos/inbank-general.svg';
        $this->supportedCurrencies = array('EUR');
        $this->supportedLocales = array('en', 'et', 'lt', 'lv');
        $this->defaultGrandTotalConstraints = array(
            'min' => 100,
            'max' => 10000,
        );
    }

    public function getConfigForm()
    {
        $inputs = array(
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable Montonio Financing'),
                'desc' => MontonioHelper::translate('When enabled, show Montonio Financing as a payment option at checkout'),
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
        );

        $inputs = array_merge($inputs, $this->getGrandTotalConfig());

        return $inputs;
    }

    public function getDefaultConfig()
    {
        $defaultConfig = array(
            $this->getConfigKey() . '_ENABLED' => '0',
            $this->getConfigKey() . '_SHOW_LOGO' => '1',
        );

        $defaultConfig = array_merge($defaultConfig, $this->getDefaultGrandTotalConfig());

        return $defaultConfig;
    }

    public function getPaymentOption()
    {
        if (!$this->isEnabled() || !$this->isCartCurrencySupported() || !$this->isGrandTotalInConstraints()) {
            return;
        }

        $paymentOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        $paymentOption
            ->setModuleName($this->getName())
            ->setCallToActionText($this->getTitle())
            ->setAction($this->getAction())
            ->setAdditionalInformation($this->getDescription());

        if ($this->shouldShowLogo()) {
            $paymentOption->setLogo($this->getLogoUrl());
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

    public function placeOrder($orderReference)
    {
        $data = $this->getBaseOrderData($orderReference);
        $data['payment'] = array(
            'method' => $this->name,
            'amount' => (float) $data['grandTotal'],
            'currency' => $data['currency'],
        );

        return $this->createOrder($data);
    }
}
