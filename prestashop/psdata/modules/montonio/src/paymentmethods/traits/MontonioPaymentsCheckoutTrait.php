<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Trait MontonioPaymentsCheckoutTrait - handles the UI for Montonio Bank Payments
 *
 * @since 2.0.0
 */
trait MontonioPaymentsCheckoutTrait
{

    /**
     * Regions to show at the dropdown
     *
     * @since 2.0.0
     * @var array<string, string> ISO 3166-1 alpha-2 country code => Country name
     */
    protected $regions = [
        'EE' => 'Estonia',
        'LT' => 'Lithuania',
        'LV' => 'Latvia',
        'FI' => 'Finland',
        'PL' => 'Poland',
        'DE' => 'Germany',
    ];

    /**
     * Generates the content HTML for the checkout page
     *
     * @since 2.0.0
     * @param string $title The title for the payment button
     * @param string $description The description to show under the country selector
     * @return string
     */
    public function getContentHtml($title = '', $description = '')
    {
        $context = Context::getContext();
        $idCurrency = $context->cart->id_currency;
        $paymentCurrency = new Currency($idCurrency);

        if (empty($this->getBankList()) || !isset($paymentCurrency->iso_code)) {
            return '';
        }

        $setupData = json_decode($this->getBankList(), true);
        $storeSetupData = $this->getFilteredBankList($setupData, $this->getPreselectedCountry(), (int) Configuration::get('MONTONIO_PAYMENTS_HIDE_COUNTRY'));
        $regionNames = null;
        if (Configuration::get('MONTONIO_PAYMENTS_TRANSLATE_COUNTRY_DROPDOWN') == 'translated') {
            $regionNames = array(
                'EE' => MontonioHelper::translate('Estonia'),
                'LT' => MontonioHelper::translate('Lithuania'),
                'LV' => MontonioHelper::translate('Latvia'),
                'FI' => MontonioHelper::translate('Finland'),
                'PL' => MontonioHelper::translate('Poland'),
                'DE' => MontonioHelper::translate('Germany'),
            );
        }

        $regions = null;
        if (Configuration::get('MONTONIO_PAYMENTS_HIDE_COUNTRY') == '1') {
            $regions = array($this->getPreselectedCountry());
        };

        $args = array(
            'form_action' => $this->getAction(),
            'payment_option_title' => empty($title) ? null : $title,
            'description' => empty($description) ? null : $description,
            'store_setup_data' => json_encode($storeSetupData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'currency' => $paymentCurrency->iso_code,
            'regions' => $regions,
            'region_names' => $regionNames,
            'default_region' => $this->getPreselectedCountry(),
        );

        return MontonioHelper::renderTemplate(_PS_MODULE_DIR_ . 'montonio/views/templates/front/montonio_payments.tpl', $args);
    }

    /**
     * Filters the bank list based on the provided criteria
     *
     * @since 2.0.0
     * @param array $bankList
     * @param string $defaultCountry
     * @param int $hideCountry
     * @return array
     */
    public function getFilteredBankList(array $bankList, $defaultCountry, $hideCountry = 0)
    {
        if ('1' == $hideCountry) {
            $bankList['paymentMethods']['paymentInitiation']['setup'] = array_filter(
                $bankList['paymentMethods']['paymentInitiation']['setup'],
                function ($var) use ($defaultCountry) {
                    return $var == $defaultCountry;
                },
                ARRAY_FILTER_USE_KEY
            );
        }
        return $bankList;
    }
}
