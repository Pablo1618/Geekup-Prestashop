<?php
/**
 * Class MontonioReloadCurrentPageHandler - Handler for reloading the current page if necessary
 *
 * @since 2.0.1
 */
class MontonioReloadCurrentPageHandler extends MontonioAbstractErrorPageHandler
{
    /**
     * Handle the request or pass it to the next handler
     *
     * @since 2.0.1
     */
    public function handle()
    {
        $referrerUrl = $_SERVER['HTTP_REFERER'];
        if (!empty($referrerUrl)) {
            Tools::redirect($referrerUrl);
        } else {
            Tools::redirect('index.php');
        }
    }
}
