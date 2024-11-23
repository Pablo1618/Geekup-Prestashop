<?php
/**
 * Class MontonioRedirectToErrorPageHandler - Handler for redirecting to the error page if necessary
 *
 * @since 2.0.1
 */
class MontonioRedirectToErrorPageHandler extends MontonioAbstractErrorPageHandler
{
    /**
     * Handle the request or pass it to the next handler
     *
     * @since 2.0.1
     */
    public function handle()
    {
        $errorPage = Configuration::get('MONTONIO_ADVANCED_ERROR_PAGE');
        if ('error_page' === $errorPage) {
            $montonioErrors = MontonioHelper::getMontonioErrors();
            Context::getContext()->smarty->assign('montonio_errors', $montonioErrors);
            MontonioHelper::clearMontonioErrors();

            if (MontonioHelper::isPrestashop16()) {
                $this->controller->setTemplate('1.6/montonio_errors_layout.tpl');
            } else {
                $this->controller->setTemplate('module:montonio/views/templates/front/montonio_errors_layout.tpl');
            }

            // Do not pass the request further down the chain
            return;
        }

        // Pass to the next handler if exists
        if ($this->nextHandler) {
            $this->nextHandler->handle();
        }
    }
}
