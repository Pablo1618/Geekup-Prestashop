<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'montonio/vendor/montoniojwt/MontonioJWT.php';
require_once _PS_MODULE_DIR_ . 'montonio/vendor/abstract/MontonioAbstractApi.php';

require_once _PS_MODULE_DIR_ . 'montonio/vendor/MontonioStargateApi.php';
require_once _PS_MODULE_DIR_ . 'montonio/vendor/MontonioPluginTelemetryApi.php';
require_once _PS_MODULE_DIR_ . 'montonio/vendor/MontonioOrderPrefixManager.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/loggers/MontonioLogger.php';

require_once _PS_MODULE_DIR_ . 'montonio/controllers/MontonioAbstractFrontController.php';
require_once _PS_MODULE_DIR_ . 'montonio/controllers/MontonioAbstractErrorPageHandler.php';
require_once _PS_MODULE_DIR_ . 'montonio/controllers/MontonioRedirectToErrorPageHandler.php';
require_once _PS_MODULE_DIR_ . 'montonio/controllers/MontonioReloadCurrentPageHandler.php';
require_once _PS_MODULE_DIR_ . 'montonio/controllers/MontonioRedirectToCheckoutErrorPageHandler.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioHelper.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioCartHelper.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioOrderHelper.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioCheckoutHelper.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioPaymentMethodHelper.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/helpers/MontonioRefundHelper.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/telemetry/MontonioPluginTelemetryService.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/orderprocessing/MontonioOrderProcessingStrategy.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/orderprocessing/MontonioAfterPaymentOrderProcessing.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/orderprocessing/MontonioBeforePaymentOrderProcessing.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/database/MontonioLocksTableManager.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/database/MontonioOrdersTableManager.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/configuration/MontonioConfiguration.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/configuration/MontonioConfigurationForm.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioPaymentMethodConfigTrait.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioEmbeddedPaymentMethodConfigTrait.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioEmbeddedPaymentMethodTrait.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioPaymentsCheckoutTrait.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioGrandTotalConstraintTrait.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/traits/MontonioRefundablePaymentMethodTrait.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioAbstractPaymentMethod.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/registries/MontonioPaymentMethodRegistry.php';

require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioBnpl.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioBlik.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioPayments.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioFinancing.php';
require_once _PS_MODULE_DIR_ . 'montonio/src/paymentmethods/MontonioCardPayments.php';

define('MONTONIO_FILE', __FILE__);

/**
 * Class Montonio - Main module class
 *
 * @since 2.0.0
 */
class Montonio extends PaymentModule
{
    /**
     * Payment method registry holding all Montonio payment methods
     *
     * @since 2.0.0
     * @var MontonioPaymentMethodRegistry
     */
    public $paymentMethodRegistry;

    /**
     * Constructor for the Montonio module
     *
     * @since 2.0.0
     */
    public function __construct()
    {
        // PaymentModule properties
        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        // Module properties
        $this->name = 'montonio';
        $this->displayName = 'Montonio';
        $this->description = 'Montonio for PrestaShop';
        $this->confirmUninstall = 'Are you sure you want to uninstall Montonio?';
        $this->tab = 'payments_gateways';
        $this->version = '2.0.9';
        $this->author = 'Montonio';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->is_eu_compatible = 1;
        $this->module_key = 'not-distributed-in-the-market';
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        parent::__construct();

        $this->registerTranslations();
        $this->registerPaymentMethods();
    }

    /**
     * Register all Montonio payment methods
     *
     * @since 2.0.0
     * @return void
     */
    public function registerPaymentMethods()
    {
        $this->paymentMethodRegistry = new MontonioPaymentMethodRegistry();
        $this->paymentMethodRegistry->registerPaymentMethod(new MontonioPayments());
        $this->paymentMethodRegistry->registerPaymentMethod(new MontonioCardPayments());
        $this->paymentMethodRegistry->registerPaymentMethod(new MontonioBlik());
        $this->paymentMethodRegistry->registerPaymentMethod(new MontonioBnpl());
        $this->paymentMethodRegistry->registerPaymentMethod(new MontonioFinancing());
    }

    /**
     * Install module
     *
     * @since 2.0.0
     * @return bool True if install was successful, false otherwise
     */
    public function install()
    {
        if (is_callable('curl_init') === false) {
            $this->_errors[] = $this->translations['To be able to use this module, please activate cURL (PHP extension).'];
            return false;
        }

        if (!class_exists('DOMDocument') || !class_exists('DOMXPath')) {
            $this->_errors[] = $this->translations['To be able to use this module, please activate the PHP extension "dom".'];
            return false;
        }

        if (!parent::install()) {
            $this->_errors[] = $this->translations['Failed to install module at step: parent::install'];
            return false;
        }

        if (!$this->setupHooks()) {
            $this->_errors[] = $this->translations['Failed to install module at step: setupHooks'];
            return false;
        }

        if (!$this->setupShopConfig()) {
            $this->_errors[] = $this->translations['Failed to install module at step: setupShopConfig'];
            return false;
        }

        if (!$this->setupDatabase()) {
            $this->_errors[] = $this->translations['Failed to install module at step: setupDatabase'];
            return false;
        }

        if (!$this->setupOrderStatuses()) {
            $this->_errors[] = $this->translations['Failed to install module at step: setupOrderStatuses'];
            return false;
        }

        return true;
    }

    /**
     * Uninstall module
     *
     * @since 2.0.0
     * @return bool True if uninstall was successful, false otherwise
     */
    public function uninstall()
    {
        MontonioPluginTelemetryService::sendUninstallTelemetryData();

        if (!parent::uninstall()) {
            $this->_errors[] = $this->translations['Failed to uninstall module'];
            return false;
        }

        return true;
    }

    /**
     * Returns a string containing the HTML necessary to generate a configuration screen on the admin panel
     *
     * @since 2.0.0
     * @return string
     */
    public function getContent()
    {
        Context::getContext()->controller->addJqueryUI('ui.sortable');

        MontonioHelper::registerJS(
            'module-' . $this->name . '-admin',
            _PS_MODULE_DIR_ . 'montonio/views/js/admin/admin.js'
        );

        MontonioHelper::registerCSS(
            'module-' . $this->name . '-admin',
            _PS_MODULE_DIR_ . 'montonio/views/css/admin/admin.css'
        );

        return MontonioConfigurationForm::getContentHtml($this);
    }

    /**
     * Setup store config with default values
     *
     * @since 2.0.0
     * @return bool True if setup was successful, false otherwise
     */
    private function setupShopConfig()
    {
        return MontonioConfiguration::setupShopConfig($this);
    }

    /**
     * Setup module hooks
     *
     * @since 2.0.0
     * @return bool True if setup was successful, false otherwise
     */
    public function setupHooks()
    {
        $hooks = [
            'actionFrontControllerSetMedia',
            'actionObjectOrderSlipAddAfter',
            'actionObjectOrderAddBefore',
        ];

        if (version_compare(_PS_VERSION_, '1.7', '>=')) {
            $hooks = array_merge(['paymentOptions', 'displayPaymentTop'], $hooks);
        } else if (MontonioHelper::isPrestashop16()) {
            $hooks = array_merge(['payment', 'paymentTop'], $hooks);
        } else {
            $this->_errors[] = $this->translations['Unsupported PrestaShop version'];
            return false;
        }

        foreach ($hooks as $hook) {
            if (!$this->registerHook($hook)) {
                $this->_errors[] = $this->translations['Failed to register hooks'];
                return false;
            }
        }

        return true;
    }

    /**
     * Setup the database
     *
     * @since 2.0.0
     * @return bool True if setup was successful, false otherwise
     */
    public function setupDatabase()
    {
        return MontonioLocksTableManager::createMontonioLocksTable()
        && MontonioOrdersTableManager::createMontonioOrdersTable();
    }

    /**
     * Setup order statuses
     *
     * @since 2.0.0
     * @return bool True if setup was successful, false otherwise
     */
    public function setupOrderStatuses()
    {
        return MontonioOrderHelper::registerMontonioOrderStatuses();
    }

    /**
     * This hook is used to display the payment methods on the checkout page on PrestaShop 1.7+
     *
     * @since 2.0.0
     * @version 1.7+
     * @param array $params Hook parameters
     * @return PaymentOption[] Payment options
     */
    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        $paymentOptions = array_map(function ($paymentMethod) {
            return $paymentMethod->getPaymentOption();
        }, $this->paymentMethodRegistry->getAllPaymentMethodsInCurrentOrder());

        return array_filter($paymentOptions, function ($paymentOption) {
            return $paymentOption instanceof PrestaShop\PrestaShop\Core\Payment\PaymentOption;
        });
    }

    /**
     * This hook is used to display the payment methods on the checkout page on PrestaShop 1.6
     *
     * @since 2.0.0
     * @version 1.6
     * @param array $params Hook parameters
     * @return string HTML content for the payment methods at checkout
     */
    public function hookPayment($params)
    {
        if (!$this->active) {
            return;
        }

        $context = Context::getContext();
        $context->smarty->assign('montonio_payment_options', array());

        $methods = $this->paymentMethodRegistry->getAllPaymentMethodsInCurrentOrder();
        array_walk($methods, function ($paymentMethod) {
            $paymentMethod->prepareLegacyPaymentOption($this);
        });

        return $this->display(__FILE__, 'views/templates/hook/payment.tpl');
    }

    /**
     * This hook is used to display error messages on the checkout page on PrestaShop 1.7+
     *
     * @since 2.0.0
     * @version 1.7+
     * @param array $params Hook parameters
     * @return string HTML content for the error messages
     */
    public function hookDisplayPaymentTop($params)
    {
        if (!$this->active) {
            return;
        }

        MontonioCheckoutHelper::fixImageSizeForPaymentOptions();
        MontonioCheckoutHelper::preselectPaymentMethod();

        // Display Montonio errors when something happened when trying to create the order
        $montonioErrors = MontonioHelper::getMontonioErrors();
        if (!empty($montonioErrors)) {
            Context::getContext()->smarty->assign('montonio_errors', $montonioErrors);
            MontonioHelper::clearMontonioErrors();

            if (MontonioHelper::isPrestashop16()) {
                return $this->display(__FILE__, 'views/templates/front/montonio_errors.tpl');
            } else {
                return $this->fetch('module:montonio/views/templates/front/montonio_errors.tpl');
            }
        }
    }

    /**
     * This hook is used to display error messages on the checkout page on PrestaShop 1.6
     *
     * @since 2.0.0
     * @version 1.6
     * @param array $params Hook parameters
     * @return string HTML content for the error messages
     */
    public function hookPaymentTop($params)
    {
        if (!$this->active) {
            return;
        }

        if (isset($this->context->cookie->montonio_errors)) {
            $errors = json_decode($this->context->cookie->montonio_errors);
            $this->context->smarty->assign('montonio_errors', $errors);
            // Clear the session errors
            unset($this->context->cookie->montonio_errors);

            return $this->display(__FILE__, 'views/templates/front/montonio_errors.tpl');
        }
    }

    /**
     * This hook is used to modify the order reference before it is saved to the database.
     * This way we have a way to use the order reference as the merchantReference in Montonio.
     *
     * @since 2.0.0
     * @see MontonioConfigurationForm::getShopConfigHtml() for the configuration of the order reference
     * @param array $params Hook parameters
     * @return void
     */
    public function hookActionObjectOrderAddBefore($params)
    {
        if (!isset($params['object']) || !($params['object'] instanceof Order)) {
            MontonioLogger::addLog('Hook actionObjectOrderAddBefore: Invalid order object', 3);
            return;
        }

        $order = $params['object'];
        if ('montonio' !== $order->module) {
            return;
        }

        $montonioOrder = MontonioOrdersTableManager::getRowByCartId($order->id_cart);
        if ($montonioOrder && isset($montonioOrder['order_reference'])) {
            $order->reference = $montonioOrder['order_reference'];
        }
    }

    /**
     * This hook runs early on the page.
     *
     * @since 2.0.0
     * @param array $params Hook parameters
     * @return void
     */
    public function hookActionFrontControllerSetMedia($params)
    {
        if (!$this->active) {
            return;
        }

        MontonioCartHelper::restoreCartIfNecessary();

        MontonioHelper::registerJS('module-' . $this->name . '-load-queue', $this->_path . 'views/js/sdk/montonio-load-queue.js');
        MontonioHelper::registerJS('module-' . $this->name . '-sdk', 'https://public.montonio.com/assets/montonio-js/2.x/montonio.bundle.js?ver=2.0.0');

        if (MontonioHelper::isPrestashop16()) {
            MontonioHelper::registerCSS('module-' . $this->name . '-style', $this->_path . 'views/css/1.6/payment.css');
        } else {
            MontonioHelper::registerCSS('module-' . $this->name . '-style', $this->_path . 'views/css/1.7/payment.css');
        }

        MontonioPluginTelemetryService::refreshTelemetryDataIfNecessary();
    }

    /**
     * This hook is fired after a refund (Order Slip) is added to an order. Creates a new Refund in Montonio if needed.
     *
     * @since 2.0.0
     * @param array $params Hook parameters
     * @return void
     */
    public function hookActionObjectOrderSlipAddAfter($params)
    {
        MontonioRefundHelper::handleRefundCreationHook($params);
    }

    /**
     * List all translatable strings for the module. If they are called in this main montonio.php file, they will be
     * available in the admin panel for translation. If we remove this function, those strings are still translated
     * with the language files, however, they are not modifiable in the admin panel.
     *
     * @todo Figure out a cleaner way to handle translations
     * @since 2.0.0
     * @see MontonioHelper::translate()
     * @return void
     */
    public function registerTranslations()
    {
        $this->l('Failed to install module at step: parent::install', 'montonio');
        $this->l('Failed to install module at step: setupHooks', 'montonio');
        $this->l('Failed to install module at step: setupShopConfig', 'montonio');
        $this->l('Failed to install module at step: setupDatabase', 'montonio');
        $this->l('Failed to install module at step: setupOrderStatuses', 'montonio');
        $this->l('Failed to register hooks', 'montonio');
        $this->l('Failed to uninstall module', 'montonio');
        $this->l('Unsupported PrestaShop version', 'montonio');
        $this->l('To be able to use this module, please activate cURL (PHP extension).', 'montonio');
        $this->l('To be able to use this module, please activate the PHP extension "dom".', 'montonio');
        $this->l('Montonio module is not active', 'montonio');
        $this->l('Failed to validate customer', 'montonio');
        $this->l('Failed to validate customer key', 'montonio');
        $this->l('Failed to validate cart. Missing:', 'montonio');
        $this->l('Failed to validate payment method', 'montonio');
        $this->l('Failed to validate payment method is available', 'montonio');
        $this->l('Missing payment intent UUID which is required for embedded payments', 'montonio');
        $this->l('Failed to update shop config', 'montonio');
        $this->l('Settings updated', 'montonio');
        $this->l('Payment method names backfilled', 'montonio');
        $this->l('API Settings', 'montonio');
        $this->l('Save', 'montonio');
        $this->l('Environment', 'montonio');
        $this->l('Use sandbox mode for development only', 'montonio');
        $this->l('Production', 'montonio');
        $this->l('Sandbox', 'montonio');
        $this->l('Montonio Access Key', 'montonio');
        $this->l('Montonio Secret Key', 'montonio');
        $this->l('Enable refunds', 'montonio');
        $this->l('Order of Montonio Payment Methods', 'montonio');
        $this->l('Order of Payment Methods', 'montonio');
        $this->l('Advanced Settings', 'montonio');
        $this->l('Order Prefix', 'montonio');
        $this->l('Preselect Payment Method', 'montonio');
        $this->l('Create Order', 'montonio');
        $this->l('After Payment', 'montonio');
        $this->l('Before Payment', 'montonio');
        $this->l('Merchant Reference', 'montonio');
        $this->l('Back to list', 'montonio');
        $this->l('Pay with BLIK', 'montonio');
        $this->l('Pay using your BLIK code', 'montonio');
        $this->l('Buy Now, Pay Later', 'montonio');
        $this->l('Pay for your order in up to 3 interest-free instalments', 'montonio');
        $this->l('Pay by Card', 'montonio');
        $this->l('Pay with your Credit or Debit Card', 'montonio');
        $this->l('Financing', 'montonio');
        $this->l('Pay for your order in 3-72 instalments', 'montonio');
        $this->l('Pay with your bank', 'montonio');
        $this->l('Complete the purchase with a direct payment from your bank account.', 'montonio');
        $this->l('Montonio BLIK', 'montonio');
        $this->l('Montonio BNPL', 'montonio');
        $this->l('Montonio Card Payments', 'montonio');
        $this->l('Montonio Bank Payments', 'montonio');
        $this->l('Montonio Financing', 'montonio');
        $this->l('Do not preselect', 'montonio');
        $this->l('This will actually refund the money to the customer.', 'montonio');
        $this->l('Supports full and partial refunds.', 'montonio');
        $this->l('Montonio Access and Secret keys can be obtained from the', 'montonio');
        $this->l('Montonio Partner System', 'montonio');
        $this->l('Update old orders', 'montonio');
        $this->l('Order Reference', 'montonio');
        $this->l('Order ID', 'montonio');
        $this->l('Cart ID', 'montonio');
        $this->l('Order ID - available only with "Before Payment" strategy', 'montonio');
        $this->l('Advanced settings', 'montonio');
        $this->l('Enable Montonio Bank Payments', 'montonio');
        $this->l('When enabled, show Montonio Bank Payments as a payment option at checkout', 'montonio');
        $this->l('Access key is required', 'montonio');
        $this->l('Secret key is required', 'montonio');
        $this->l('Environment is required', 'montonio');
        $this->l('Error validating API keys. Please check your keys and try again.', 'montonio');
        $this->l('If you are using Montonio with a single pair of API keys for multiple stores, you can set an Order Prefix to distinguish between orders in the Montonio Partner System.', 'montonio');
        $this->l('Preselect a payment method for the customer at checkout. The customer can still change the payment method.', 'montonio');
        $this->l('When enabled, creating a refund in PrestaShop for an order will automatically send the refund request to Montonio.', 'montonio');
        $this->l('This option is available for Montonio Bank Payments, Card Payments and BLIK.', 'montonio');
        $this->l('Reorder the payment methods by simply dragging and dropping them. The order will be reflected on the checkout page.', 'montonio');
        $this->l('Select when the cart should be converted to an order in PrestaShop.', 'montonio');
        $this->l('Order is created after successful payment, ensuring only successful transactions are converted to orders.', 'montonio');
        $this->l('Order is created when "Place Order" is clicked, which may result in duplicate orders for the same cart if the payment fails.', 'montonio');
        $this->l('Select which type of order reference to use in Montonio Partner System.', 'montonio');
        $this->l('this is the default option and uses the unique order reference generated by PrestaShop.', 'montonio');
        $this->l('this option uses the unique order ID generated by PrestaShop.', 'montonio');
        $this->l('This option is available only when the Create Order: "Before Payment" strategy is selected.', 'montonio');
        $this->l('this option uses the unique cart ID generated by PrestaShop.', 'montonio');
        $this->l('Payment method name', 'montonio');
        $this->l('Bank Name', 'montonio');
        $this->l('Select the way the payment method name is shown in order details and in the admin panel.', 'montonio');
        $this->l('NB! Ticking the "Update old orders" checkbox might not be not performant if you have a lot of orders.', 'montonio');
        $this->l('Montonio Bank Payments (Bank Name)', 'montonio');
        $this->l('Checkout Style', 'montonio');
        $this->l('Select the way the Montonio Bank Payments will be displayed at checkout', 'montonio');
        $this->l('Bank Selection at Checkout', 'montonio');
        $this->l('Show title only', 'montonio');
        $this->l('Show logo?', 'montonio');
        $this->l('You can turn this off if you do not want to show Montonio logo at checkout', 'montonio');
        $this->l('Default Country', 'montonio');
        $this->l('The country whose banks to show first at checkout.', 'montonio');
        $this->l('Estonia', 'montonio');
        $this->l('Finland', 'montonio');
        $this->l('Latvia', 'montonio');
        $this->l('Lithuania', 'montonio');
        $this->l('Poland', 'montonio');
        $this->l('Germany', 'montonio');
        $this->l('Hide Country Selection Dropdown', 'montonio');
        $this->l('You can turn this off if you do not want to show country select element at checkout.', 'montonio');
        $this->l('Country by checkout data', 'montonio');
        $this->l('Should we attempt to change the selected country by checkout data?', 'montonio');
        $this->l('If unsuccessful, we revert to your configured Default Country.', 'montonio');
        $this->l('No, show the configured Default Country', 'montonio');
        $this->l('Select country by locale', 'montonio');
        $this->l('Country Dropdown Language', 'montonio');
        $this->l('How should the countries in the checkout dropdown be shown?', 'montonio');
        $this->l('in English', 'montonio');
        $this->l('Translated', 'montonio');
        $this->l('Enable Montonio Card Payments', 'montonio');
        $this->l('When enabled, show Montonio Card Payments as a payment option at checkout', 'montonio');
        $this->l('Enable Credit Card fields in checkout', 'montonio');
        $this->l('Add Credit Card fields in checkout instead of redirecting to gateway page.', 'montonio');
        $this->l('Enable Montonio BLIK', 'montonio');
        $this->l('When enabled, show Montonio BLIK as a payment option at checkout', 'montonio');
        $this->l('Enable BLIK in checkout', 'montonio');
        $this->l('Show BLIK code input in the checkout instead of redirecting to gateway page.', 'montonio');
        $this->l('Enable Montonio BNPL', 'montonio');
        $this->l('When enabled, show Montonio BNPL as a payment option at checkout', 'montonio');
        $this->l('Select the way Montonio BNPL is shown at checkout', 'montonio');
        $this->l('Period selection at checkout', 'montonio');
        $this->l('Minimum Grand Total', 'montonio');
        $this->l('Set the minimum grand total for the payment method to be available', 'montonio');
        $this->l('Maximum Grand Total', 'montonio');
        $this->l('Set the maximum grand total for the payment method to be available', 'montonio');
        $this->l('Enable Montonio Financing', 'montonio');
        $this->l('When enabled, show Montonio Financing as a payment option at checkout', 'montonio');
        $this->l('Settings specific to PrestaShop 1.6', 'montonio');
        $this->l('Order Confirmation Page', 'montonio');
        $this->l('This controls which page to redirect to after a successful payment.', 'montonio');
        $this->l('NB! Guest accounts are always redirected to the confirmation page, since they do not have access to the order detail page.', 'montonio');
        $this->l('In later versions of PrestaShop, the order confirmation page is the default page for all customers.', 'montonio');
        $this->l('Add #amount to the cart to make this option available.', 'montonio');
        $this->l('Cart total exceeds maximum limit for this option.', 'montonio');
        $this->l('Pay next month', 'montonio');
        $this->l('Pay in two parts', 'montonio');
        $this->l('Pay in three parts', 'montonio');
        $this->l('Error Page', 'montonio');
        $this->l('Select which page to redirect to in order to show Montonio errors to the customer.', 'montonio');
        $this->l('Checkout', 'montonio');
        $this->l('this is the default option and shows the errors on the checkout page.', 'montonio');
        $this->l('Error Page', 'montonio');
        $this->l('this option redirects the customer to a separate generic error page.', 'montonio');
    }
}
