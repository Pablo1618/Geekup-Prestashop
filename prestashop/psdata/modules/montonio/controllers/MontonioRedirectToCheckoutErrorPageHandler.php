<?php
/**
 * Class MontonioRedirectToErrorPageHandler - Handler for redirecting to the error page if necessary
 *
 * @since 2.0.1
 */
class MontonioRedirectToCheckoutErrorPageHandler extends MontonioAbstractErrorPageHandler
{
    /**
     * Handle the request or pass it to the next handler
     *
     * @since 2.0.1
     */
    public function handle()
    {
        $url = Context::getContext()->link->getPageLink('order', true, null, array('step' => 3));

        // Trigger the hook to allow modification of the redirect URL
        Hook::exec('actionMontonioRedirectToCheckoutUrl', array(
            'url' => &$url,
            'controller' => $this->controller,
            'notifications' => MontonioHelper::getMontonioErrors(),
        ));

        Tools::redirect($url);
    }
}
