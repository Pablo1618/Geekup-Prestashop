<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * MontonioErrorModuleFrontController - Controller for showing Montonio errors at the checkout page
 *
 * @since 2.0.0
 */
class MontonioErrorModuleFrontController extends MontonioAbstractFrontController
{
    /**
     * Sets montonio errors to the context and handles redirection/reloading if necessary
     *
     * @since 2.0.0
     * @since 2.0.1 Added chain of responsibility for where to redirect the user to see the errors
     * @return void
     */
    public function postProcess()
    {
        $errors = Tools::getValue('montonio_errors');
        if (!empty($errors)) {
            MontonioHelper::setMontonioErrors($errors);
        }

        // Start the chain of responsibility for handling the request
        $redirectToErrorPageHandler = new MontonioRedirectToErrorPageHandler($this);
        $reloadCurrentPageHandler = new MontonioReloadCurrentPageHandler($this);

        $redirectToErrorPageHandler->setNext($reloadCurrentPageHandler);
        $redirectToErrorPageHandler->handle();
    }
}
