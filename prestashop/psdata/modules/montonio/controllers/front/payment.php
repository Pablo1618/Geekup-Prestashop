<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * The Controller to call after clicking Place Order using a Montonio's payment method
 *
 * @since 2.0.0
 */
class MontonioPaymentModuleFrontController extends MontonioAbstractFrontController
{
    /**
     * Whether the controller requires SSL
     *
     * @since 2.0.0
     * @var boolean
     */
    public $ssl = true;

    /**
     * The errors that occurred during the validation process
     *
     * @since 2.0.0
     * @var array
     */
    public $errors = [];

    /**
     * Handles the Checkout form submission and returns the URL to redirect the customer to Montonio's payment gateway
     *
     * @since 2.0.0
     * @return void
     */
    public function postProcess()
    {
        ob_start();
        try {
            $this->performValidations();

            $orderProcessingStrategy = MontonioOrderHelper::getCurrentOrderProcessingStrategy();
            $result = $orderProcessingStrategy->onPlaceOrderClicked();

            if ($result['status'] >= 200 && $result['status'] < 300) {
                $redirectUrl = isset($result['body']['paymentUrl']) ? $result['body']['paymentUrl'] : null;
                $this->respond(true, $redirectUrl ? ['redirect' => $redirectUrl] : []);
            } else {
                $montonioErrors = is_array($result['body']['message']) ? $result['body']['message'] : [$result['body']['message']];
                MontonioHelper::setMontonioErrors($montonioErrors);
                $redirectUrl = Context::getContext()->link->getPageLink('order', true, null, "step=3");
                $this->respond(false, array('redirect' => $redirectUrl));
            }
        } catch (Exception $e) {
            MontonioHelper::setMontonioErrors([$e->getMessage()]);
            $redirectUrl = Context::getContext()->link->getPageLink('order', true, null, "step=3");
            $this->respond(false, array('redirect' => $redirectUrl));
        } finally {
            ob_end_clean();
        }
    }

    /**
     * Validates the payment method, cart and customer.
     *
     * @since 2.0.0
     * @return boolean True if the validations passed, false otherwise
     */
    public function performValidations()
    {
        $method = Tools::getValue('method');
        $cart = $this->context->cart;
        $customer = new Customer($cart->id_customer);

        $this->validatePaymentMethod($method);
        $this->validatePaymentIntentUuid($method);
        $this->validateCustomerIsLoaded($customer);
        $this->validateCartProperties($cart, ['id_address_invoice', 'id_address_delivery', 'id_currency', 'id_lang']);
    }

    /**
     * Will either give AJAX response or redirect the customer to the redirect URL
     *
     * @since 2.0.0
     * @param boolean $status Whether the request was successful
     * @param array $responseData Associative array with the response data
     * @return void
     */
    public function respond($success, $responseData)
    {
        if (Tools::getValue('isAjax')) {
            header('Content-Type: application/json');
            echo json_encode(array_merge(array('success' => $success), $responseData));
            exit;
        } else {
            $redirectUrl = isset($responseData['redirect']) ? $responseData['redirect'] : null;
            Tools::redirect($redirectUrl);
        }
    }

}
