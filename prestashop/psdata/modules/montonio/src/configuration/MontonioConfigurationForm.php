<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioConfigurationForm - Service for handling the Montonio module configuration form
 *
 * @since 2.0.0
 */
class MontonioConfigurationForm
{
    /**
     * Returns the whole HTML content of the module configuration page
     *
     * @since 2.0.0
     * @return string
     */
    public static function getContentHtml()
    {
        $html = '';
        $montonioModule = MontonioHelper::getMontonioModule();

        // Handle form submission and display messages
        if (self::isFormSubmitted($montonioModule)) {
            $html .= self::handleFormSubmission($montonioModule);
            MontonioPluginTelemetryService::sendTelemetryData();
        }

        return $html . self::getShopConfigHtml();
    }

    /**
     * Checks if the form is submitted
     *
     * @since 2.0.0
     * @param object $montonioModule
     * @return bool
     */
    private static function isFormSubmitted($montonioModule)
    {
        return Tools::isSubmit('submit' . $montonioModule->name);
    }

    /**
     * Trims the values of the configuration array
     *
     * @since 2.0.0
     * @param array $config
     * @return array
     */
    private static function trimConfigValues(&$config)
    {
        foreach ($config as $key => $value) {
            $config[$key] = trim($value);
        }
    }

    /**
     * Handles form submission
     *
     * @since 2.0.0
     * @param object $montonioModule
     * @return string
     */
    private static function handleFormSubmission($montonioModule)
    {
        $newConfig = MontonioConfiguration::getSubmittedShopConfig();
        $shouldBackfillPaymentMethodNames = Tools::getValue('MONTONIO_PAYMENTS_DISPLAY_NAME_BACKFILL') === 'on';

        self::trimConfigValues($newConfig);
        $errors = MontonioConfiguration::validateShopConfig($newConfig);
        $html = '';

        if (empty($errors)) {
            foreach ($newConfig as $key => $value) {
                Configuration::updateValue($key, $value);
            }
            $html .= $montonioModule->displayConfirmation(MontonioHelper::translate('Settings updated'));
        } else {
            foreach ($errors as $error) {
                $html .= $montonioModule->displayError($error);
            }
        }

        if ($shouldBackfillPaymentMethodNames) {
            self::backfillPaymentMethodNames();
            $html .= $montonioModule->displayConfirmation(MontonioHelper::translate('Payment method names updated'));
        }

        return $html;
    }

    /**
     * Updates payment methods for Montonio Bank Payments orders
     *
     * @since 2.0.0
     */
    private static function backfillPaymentMethodNames()
    {
        MontonioOrdersTableManager::updatePaymentMethodsForMontonioPaymentsOrders(
            Configuration::get('MONTONIO_PAYMENTS_DISPLAY_NAME_MODE')
        );
    }

    /**
     * Returns the HTML content of the form for the shop configuration.
     *
     * @since 2.0.0
     * @return string
     */
    public static function getShopConfigHtml()
    {
        $form = self::getBaseConfigForm();

        $montonioModule = MontonioHelper::getMontonioModule();

        $allMethods = $montonioModule->paymentMethodRegistry->getAllPaymentMethods();
        foreach ($allMethods as $method => $paymentMethod) {
            $form[] = self::getPaymentMethodConfigForm($method, $paymentMethod);
        }

        $form[] = self::getPaymentMethodOrderConfigForm();
        $form[] = self::getAdvancedSettingsForm();

        if (MontonioHelper::isPrestaShop16()) {
            $form[] = self::getPrestaShop16SettingsForm();
        }

        return self::generateHelperForm($form, $montonioModule);
    }

    /**
     * Returns the base configuration form
     *
     * @since 2.0.0
     * @return array
     */
    private static function getBaseConfigForm()
    {
        return array(
            array(
                'form' => array(
                    'tinymce' => true,
                    'legend' => array(
                        'title' => MontonioHelper::translate('API Settings'),
                        'icon' => 'icon-cogs',
                    ),
                    'input' => self::getBaseConfigInputs(),
                    'submit' => array(
                        'title' => MontonioHelper::translate('Save'),
                        'class' => 'btn btn-default pull-right',
                    ),
                ),
            ),
        );
    }

    /**
     * Returns the input fields for the base configuration form
     *
     * @since 2.0.0
     * @return array
     */
    private static function getBaseConfigInputs()
    {
        return array(
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Environment'),
                'hint' => MontonioHelper::translate('Use sandbox mode for development only'),
                'name' => 'MONTONIO_ENVIRONMENT',
                'required' => true,
                'options' => array(
                    'query' => array(
                        array('id' => 'production', 'name' => MontonioHelper::translate('Production')),
                        array('id' => 'sandbox', 'name' => MontonioHelper::translate('Sandbox')),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'text',
                'label' => MontonioHelper::translate('Montonio Access Key'),
                'name' => 'MONTONIO_ACCESS_KEY',
                'required' => true,
            ),
            array(
                'type' => 'text',
                'label' => MontonioHelper::translate('Montonio Secret Key'),
                'desc' => MontonioHelper::translate('Montonio Access and Secret keys can be obtained from the') .
                ' <a href="https://partner.montonio.com" target="_blank">' . MontonioHelper::translate('Montonio Partner System') . '</a>',
                'name' => 'MONTONIO_SECRET_KEY',
                'required' => true,
            ),
            array(
                'type' => 'switch',
                'label' => MontonioHelper::translate('Enable refunds'),
                'desc' => MontonioHelper::translate('When enabled, creating a refund in PrestaShop for an order will automatically send the refund request to Montonio.')
                . ' ' . MontonioHelper::translate('This will actually refund the money to the customer.')
                . ' ' . MontonioHelper::translate('This option is available for Montonio Bank Payments, Card Payments and BLIK.')
                . ' ' . MontonioHelper::translate('Supports full and partial refunds.'),
                'is_bool' => true,
                'name' => 'MONTONIO_REFUNDS_ENABLED',
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

    /**
     * Returns the configuration form to set the order of payment methods
     *
     * @since 2.0.0
     * @return array
     */
    private static function getPaymentMethodOrderConfigForm()
    {
        return array(
            'form' => array(
                'tinymce' => true,
                'legend' => array(
                    'title' => MontonioHelper::translate('Order of Montonio Payment Methods'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => MontonioHelper::translate('Order of Payment Methods'),
                        'desc' => MontonioHelper::translate('Reorder the payment methods by simply dragging and dropping them. The order will be reflected on the checkout page.'),
                        'name' => 'MONTONIO_PAYMENT_METHODS_ORDER',
                        'required' => true,
                    ),
                ),
                'submit' => array(
                    'title' => MontonioHelper::translate('Save'),
                    'class' => 'btn btn-default pull-right',
                ),
            ),
        );
    }

    /**
     * Returns the configuration form for a payment method
     *
     * @since 2.0.0
     * @param string $method
     * @param object $paymentMethod
     * @return array
     */
    private static function getPaymentMethodConfigForm($method, $paymentMethod)
    {
        return array(
            'form' => array(
                'tinymce' => true,
                'legend' => array(
                    'title' => MontonioHelper::translate($paymentMethod->getDisplayName()),
                    'icon' => 'icon-cogs',
                ),
                'input' => $paymentMethod->getConfigForm(),
                'submit' => array(
                    'title' => MontonioHelper::translate('Save'),
                    'class' => 'btn btn-default pull-right',
                ),
            ),
        );
    }

    /**
     * Returns the advanced settings form
     *
     * @since 2.0.0
     * @return array
     */
    private static function getAdvancedSettingsForm()
    {
        return array(
            'form' => array(
                'tinymce' => true,
                'legend' => array(
                    'title' => MontonioHelper::translate('Advanced settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => self::getAdvancedSettingsInputs(),
                'submit' => array(
                    'title' => MontonioHelper::translate('Save'),
                    'class' => 'btn btn-default pull-right',
                ),
            ),
        );
    }

    /**
     * Returns the input fields for the advanced settings form
     *
     * @since 2.0.0
     * @return array
     */
    private static function getAdvancedSettingsInputs()
    {
        $paymentMethods = MontonioHelper::getMontonioModule()->paymentMethodRegistry->getAllPaymentMethods();
        // Make the payment methods to array('id' => $paymentMethod->name, 'name' => $paymentMethod->getDisplayName())
        $paymentMethods = array_map(function ($paymentMethod) {
            return array('id' => $paymentMethod->getName(), 'name' => MontonioHelper::translate($paymentMethod->getDisplayName()));
        }, $paymentMethods);

        return array(
            array(
                'type' => 'text',
                'label' => MontonioHelper::translate('Order Prefix'),
                'desc' => MontonioHelper::translate('If you are using Montonio with a single pair of API keys for multiple stores, you can set an Order Prefix to distinguish between orders in the Montonio Partner System.'),
                'name' => 'MONTONIO_ORDER_PREFIX',
                'required' => false,
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Preselect Payment Method'),
                'desc' => MontonioHelper::translate('Preselect a payment method for the customer at checkout. The customer can still change the payment method.'),
                'name' => 'MONTONIO_PRESELECTED_PAYMENT_METHOD',
                'required' => false,
                'options' => array(
                    'query' => array_merge(array(array('id' => '', 'name' => MontonioHelper::translate('Do not preselect'))), $paymentMethods),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Create Order'),
                'desc' => MontonioHelper::translate('Select when the cart should be converted to an order in PrestaShop.')
                . '<br/>* <strong>' . MontonioHelper::translate('After Payment') . '</strong> - '
                . MontonioHelper::translate('Order is created after successful payment, ensuring only successful transactions are converted to orders.')
                . '<br/>* <strong>' . MontonioHelper::translate('Before Payment') . '</strong> - '
                . MontonioHelper::translate('Order is created when "Place Order" is clicked, which may result in duplicate orders for the same cart if the payment fails.'),
                'name' => 'MONTONIO_ORDER_PROCESSING_STRATEGY',
                'required' => true,
                'options' => array(
                    'query' => array(
                        array('id' => 'after_payment', 'name' => MontonioHelper::translate('After Payment')),
                        array('id' => 'before_payment', 'name' => MontonioHelper::translate('Before Payment')),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Merchant Reference'),
                'desc' => MontonioHelper::translate('Select which type of order reference to use in Montonio Partner System.')
                . '<br/>* <strong>' . MontonioHelper::translate('Order Reference') . '</strong> - '
                . MontonioHelper::translate('this is the default option and uses the unique order reference generated by PrestaShop.')
                . '<br/>* <strong>' . MontonioHelper::translate('Order ID') . '</strong> - '
                . MontonioHelper::translate('this option uses the unique order ID generated by PrestaShop.')
                . MontonioHelper::translate('This option is available only when the Create Order: "Before Payment" strategy is selected.')
                . '<br/>* <strong>' . MontonioHelper::translate('Cart ID') . '</strong> - '
                . MontonioHelper::translate('this option uses the unique cart ID generated by PrestaShop.'),
                'name' => 'MONTONIO_MERCHANT_REFERENCE_TYPE',
                'required' => true,
                'options' => array(
                    'query' => array(
                        array('id' => 'order_reference', 'name' => MontonioHelper::translate('Order Reference')),
                        array('id' => 'order_id', 'name' => MontonioHelper::translate('Order ID - available only with "Before Payment" strategy')),
                        array('id' => 'cart_id', 'name' => MontonioHelper::translate('Cart ID')),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Error Page'),
                'desc' => MontonioHelper::translate('Select which page to redirect to in order to show Montonio errors to the customer.')
                . '<br/>* <strong>' . MontonioHelper::translate('Checkout') . '</strong> - '
                . MontonioHelper::translate('this is the default option and shows the errors on the checkout page.')
                . '<br/>* <strong>' . MontonioHelper::translate('Error Page') . '</strong> - '
                . MontonioHelper::translate('this option redirects the customer to a separate generic error page.'),
                'name' => 'MONTONIO_ADVANCED_ERROR_PAGE',
                'required' => true,
                'options' => array(
                    'query' => array(
                        array('id' => 'checkout', 'name' => MontonioHelper::translate('Checkout')),
                        array('id' => 'error_page', 'name' => MontonioHelper::translate('Error Page')),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
        );
    }

    /**
     * Returns the settings form for settings specific to PrestaShop 1.6
     *
     * @version 1.6
     * @since 2.0.0
     * @return array
     */
    private static function getPrestaShop16SettingsForm()
    {
        return array(
            'form' => array(
                'tinymce' => true,
                'legend' => array(
                    'title' => MontonioHelper::translate('Settings specific to PrestaShop 1.6'),
                    'icon' => 'icon-cogs',
                ),
                'input' => self::getPrestaShop16SettingsInputs(),
                'submit' => array(
                    'title' => MontonioHelper::translate('Save'),
                    'class' => 'btn btn-default pull-right',
                ),
            ),
        );
    }

    /**
     * Returns the input fields for the settings form specific to PrestaShop 1.6
     *
     * @version 1.6
     * @since 2.0.0
     * @return array
     */
    private static function getPrestaShop16SettingsInputs()
    {
        return array(
            array(
                'type' => 'select',
                'label' => MontonioHelper::translate('Order Confirmation Page'),
                'desc' => MontonioHelper::translate('This controls which page to redirect to after a successful payment.')
                . '<br/><i>' . MontonioHelper::translate('In later versions of PrestaShop, the order confirmation page is the default page for all customers.') . '</i>'
                . '<br/><i>' . MontonioHelper::translate('Guest accounts are always redirected to the confirmation page, since they do not have access to the order detail page.') . '</i>',
                'name' => 'MONTONIO_ADVANCED_ORDER_CONFIRMATION_PAGE',
                'required' => 'true',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'order-detail',
                            'name' => 'Order Detail',
                        ),
                        array(
                            'id' => 'order-confirmation',
                            'name' => 'Order Confirmation',
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
            ),
        );
    }

    /**
     * Generates the helper form
     *
     * @since 2.0.0
     * @param array $form
     * @param object $montonioModule
     * @return string
     */
    private static function generateHelperForm($form, $montonioModule)
    {
        $defaultLang = (int) Configuration::get('PS_LANG_DEFAULT');

        $helper = new HelperForm();
        $helper->module = $montonioModule;
        $helper->name_controller = $montonioModule->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $montonioModule->name;
        $helper->default_form_language = $defaultLang;
        $helper->allow_employee_form_lang = $defaultLang;
        $helper->title = $montonioModule->displayName;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit' . $montonioModule->name;
        $helper->toolbar_btn = array(
            'save' => array(
                'desc' => MontonioHelper::translate('Save'),
                'href' => AdminController::$currentIndex . '&configure=' . $montonioModule->name . '&save' . $montonioModule->name .
                '&token=' . Tools::getAdminTokenLite('AdminModules'),
            ),
            'back' => array(
                'href' => AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                'desc' => MontonioHelper::translate('Back to list'),
            ),
        );

        // Load current saved values in the database into the form
        $config = MontonioConfiguration::getCurrentShopConfig();
        foreach ($config as $key => $value) {
            $helper->fields_value[$key] = $value;
        }

        $html = $helper->generateForm($form);

        // Inject the drag and drop input for the payment method order
        self::injectPaymentMethodOrderInputs($html);
        self::makeSecretKeyInputPassword($html);
        self::addPaymentMethodNameBackfillCheckbox($html);

        return $html;
    }

    /**
     * Injects the drag and drop input for the payment method order
     *
     * @since 2.0.0
     * @param string &$html
     */
    private static function injectPaymentMethodOrderInputs(&$html)
    {
        if (!self::canInjectPaymentMethodOrderInputs()) {
            return;
        }

        $doc = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $input = self::findPaymentMethodOrderInput($doc);

        if (!$input) {
            return;
        }

        $currentOrder = self::getCurrentOrder();
        $allMethods = self::getAllPaymentMethodsSorted();

        $input->setAttribute('type', 'hidden');
        $input->setAttribute('value', implode(',', $currentOrder));

        self::appendPaymentMethodsList($doc, $input, $allMethods);

        // Save the modified HTML
        $html = $doc->saveHTML($doc->documentElement);
    }

    /**
     * Checks if the necessary classes are available for injecting payment method order inputs.
     *
     * @since 2.0.0
     * @return bool
     */
    private static function canInjectPaymentMethodOrderInputs()
    {
        return class_exists('DOMDocument') && class_exists('DOMXPath');
    }

    /**
     * Finds the input element for the payment method order.
     *
     * @since 2.0.0
     * @param DOMDocument $doc
     * @return DOMElement|null
     */
    private static function findPaymentMethodOrderInput($doc)
    {
        $xpath = new DOMXPath($doc);
        return $xpath->query('//input[@name="MONTONIO_PAYMENT_METHODS_ORDER"]')->item(0);
    }

    /**
     * Retrieves the current order of payment methods from configuration.
     *
     * @since 2.0.0
     * @return array
     */
    private static function getCurrentOrder()
    {
        $currentOrder = Configuration::get('MONTONIO_PAYMENT_METHODS_ORDER');
        return $currentOrder ? explode(',', $currentOrder) : [];
    }

    /**
     * Retrieves all payment methods and sorts them according to the current order.
     *
     * @since 2.0.0
     * @return array All payment methods sorted according to the current order
     */
    private static function getAllPaymentMethodsSorted()
    {
        $montonioModule = MontonioHelper::getMontonioModule();
        return $montonioModule->paymentMethodRegistry->getAllPaymentMethodsInCurrentOrder();
    }

    /**
     * Appends the payment methods list to the DOM document.
     *
     * @since 2.0.0
     * @param DOMDocument $doc
     * @param DOMElement $input
     * @param array $allMethods
     */
    private static function appendPaymentMethodsList($doc, $input, $allMethods)
    {
        $ul = $doc->createElement('ul');
        $ul->setAttribute('id', 'montonio-payment-methods-order');
        $ul->setAttribute('class', 'montonio-list-group ui-sortable');
        $ul->setAttribute('unselectable', 'on');
        $ul->setAttribute('style', '-moz-user-select: none;');

        foreach ($allMethods as $paymentMethod) {
            $li = $doc->createElement('li');
            $li->setAttribute('class', 'montonio-list-group-item');
            $li->setAttribute('data-method', $paymentMethod->getName());
            $li->appendChild($doc->createTextNode(MontonioHelper::translate($paymentMethod->getDisplayName())));
            $ul->appendChild($li);
        }

        $input->parentNode->insertBefore($ul, $input);
    }

    /**
     * Makes the secret key input field a password field
     *
     * @since 2.0.0
     * @param string $html
     * @return string
     */
    private static function makeSecretKeyInputPassword(&$html)
    {
        $doc = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $input = self::findSecretKeyInput($doc);

        if (!$input) {
            return;
        }

        $input->setAttribute('type', 'password');

        // Save the modified HTML
        $html = $doc->saveHTML($doc->documentElement);
    }

    /**
     * Finds the input element for the secret key.
     *
     * @since 2.0.0
     * @param DOMDocument $doc
     * @return DOMElement|null
     */
    private static function findSecretKeyInput($doc)
    {
        $xpath = new DOMXPath($doc);
        return $xpath->query('//input[@name="MONTONIO_SECRET_KEY"]')->item(0);
    }

    private static function addPaymentMethodNameBackfillCheckbox(&$html)
    {
        $doc = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Find the div which contains the element <select name="MONTONIO_PAYMENTS_DISPLAY_NAME_MODE">
        $xpath = new DOMXPath($doc);
        $select = $xpath->query('//select[@name="MONTONIO_PAYMENTS_DISPLAY_NAME_MODE"]')->item(0);
        if (!$select) {
            return;
        }

        $select->setAttribute('style', 'display: inline-block; margin-right: 10px;');

        // Create a new span element
        $span = $doc->createElement('span');
        $span->setAttribute('class', 'backfill-checkbox');

        // Create a new input element
        $input = $doc->createElement('input');
        $input->setAttribute('class', 'backfill-checkbox-input');
        $input->setAttribute('type', 'checkbox');
        $input->setAttribute('name', 'MONTONIO_PAYMENTS_DISPLAY_NAME_BACKFILL');
        $input->setAttribute('id', 'montonio-payments-display-name-backfill');

        // Create a new label element
        $label = $doc->createElement('label');
        $label->setAttribute('class', 'backfill-checkbox-label');
        $label->setAttribute('for', 'montonio-payments-display-name-backfill');
        $label->appendChild($doc->createTextNode(MontonioHelper::translate('Update old orders')));

        // Append the input and label elements to the span element
        $span->appendChild($input);
        $span->appendChild($label);

        // Insert the new span element before the select element
        $select->parentNode->insertBefore($span, $select->nextSibling);

        // Save the modified HTML
        $html = $doc->saveHTML($doc->documentElement);
    }
}
