<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MontonioBlik extends MontonioAbstractPaymentMethod
{
    use MontonioEmbeddedPaymentMethodTrait;
    use MontonioRefundablePaymentMethodTrait;

    public function __construct()
    {
        $this->name = 'blik';
        $this->displayName = 'Montonio BLIK';
        $this->title = MontonioHelper::translate('Pay with BLIK');
        $this->description = MontonioHelper::translate('Pay using your BLIK code');
        $this->configKey = 'MONTONIO_BLIK';
        $this->logoUrl = 'https://public.montonio.com/images/logos/blik-logo.png';
        $this->embeddedLogoUrl = 'https://public.montonio.com/images/logos/blik-logo.png';
        $this->supportedCurrencies = array('PLN');
        $this->supportedLocales = array('en', 'pl');
    }

    public function getConfigForm()
    {
        return array(
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable Montonio BLIK'),
                'desc' => MontonioHelper::translate('When enabled, show Montonio BLIK as a payment option at checkout'),
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
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable BLIK in checkout'),
                'desc' => MontonioHelper::translate('Show BLIK code input in the checkout instead of redirecting to gateway page.'),
                'is_bool' => true,
                'name' => $this->getConfigKey() . '_IN_CHECKOUT',
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
    }

    public function getDefaultConfig()
    {
        return array(
            $this->getConfigKey() . '_ENABLED' => '0',
            $this->getConfigKey() . '_SHOW_LOGO' => '1',
            $this->getConfigKey() . '_IN_CHECKOUT' => '0',
        );
    }

    public function getPaymentOption()
    {
        if (!$this->isEnabled() || !$this->isCartCurrencySupported()) {
            return;
        }

        if ($this->isEmbedded()) {
            $paymentOption = $this->getEmbeddedPaymentOption();
            if ($paymentOption) {
                return $paymentOption;
            }
        }

        $paymentOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        $paymentOption
            ->setCallToActionText($this->getTitle())
            ->setAction($this->getAction())
            ->setAdditionalInformation($this->getDescription());

        if ($this->shouldShowLogo()) {
            $paymentOption->setLogo($this->getLogoUrl());
        }

        return $paymentOption;
    }

    public function placeOrder($orderReference)
    {
        $data = $this->getBaseOrderData($orderReference);
        $data['payment'] = array(
            'method' => $this->name,
            'methodOptions' => array(
                'preferredLocale' => $data['locale'],
            ),
            'amount' => $data['grandTotal'],
            'currency' => $data['currency'],
        );

        return $this->createOrder($data);
    }
}
