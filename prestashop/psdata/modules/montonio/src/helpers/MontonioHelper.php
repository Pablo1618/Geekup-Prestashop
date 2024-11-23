<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioHelper - Helper class for Montonio module
 *
 * @since 2.0.0
 */
class MontonioHelper
{
    /**
     * Gets the PrestaShop version
     *
     * @since 2.0.0
     * @return string Returns the PrestaShop version
     */
    public static function getPrestashopVersion()
    {
        return _PS_VERSION_;
    }

    /**
     * Checks if the PrestaShop version is 1.6
     *
     * @since 2.0.0
     * @return bool Returns true if the PrestaShop version is 1.6, false otherwise
     */
    public static function isPrestashop16()
    {
        return version_compare(self::getPrestashopVersion(), '1.7', '<');
    }

    /**
     * Checks if the multishop feature is enabled
     *
     * @since 2.0.0
     * @return bool Returns true if the multishop feature is enabled, false otherwise
     */
    public static function isMultishopEnabled()
    {
        return Shop::isFeatureActive();
    }

    /**
     * Adds a JS file to the head of the page
     *
     * @since 2.0.0
     * @param string $key the key to identify the JS file
     * @param string $url the URL to the JS file
     * @return void
     */
    public static function registerJS($key, $url)
    {
        if (method_exists(Context::getContext()->controller, 'registerJavascript')) {
            Context::getContext()->controller->registerJavascript($key, $url, array(
                'server' => 'remote',
                'priority' => 19,
                'position' => 'top',
            ));
        } else {
            Context::getContext()->controller->addJS($url, true);
        }
    }

    /**
     * Adds a CSS file to the head of the page
     *
     * @since 2.0.0
     * @param string $key the key to identify the CSS file
     * @param string $url the URL to the CSS file
     * @return void
     */
    public static function registerCSS($key, $url)
    {
        if (method_exists(Context::getContext()->controller, 'registerStylesheet')) {
            Context::getContext()->controller->registerStylesheet($key, $url, array(
                'server' => 'remote',
                'priority' => 19,
                'attribute' => 'async',
            ));
        } else {
            Context::getContext()->controller->addCSS($url, 'all');
        }
    }

    /**
     * Clears the cache for the given key
     *
     * @since 2.0.0
     * @param string $key the cache key
     * @return void
     */
    public static function clearCacheKey($key)
    {
        if (class_exists('Cache', false) && method_exists('Cache', 'clean')) {
            Cache::clean($key);
        }
    }

    /**
     * Sets the Montonio errors to the cookie
     *
     * @since 2.0.0
     * @param array|string $errors the errors
     * @return void
     */
    public static function setMontonioErrors($errors)
    {
        // Check if errors is an array and if not, convert it to an array
        if (!is_array($errors)) {
            $errors = array($errors);
        }

        Context::getContext()->cookie->montonio_errors = json_encode($errors);
    }

    /**
     * Gets the Montonio errors from the cookie
     *
     * @since 2.0.0
     * @return array the Montonio errors
     */
    public static function getMontonioErrors()
    {
        if (empty(Context::getContext()->cookie->montonio_errors)) {
            return array();
        }

        return json_decode(Context::getContext()->cookie->montonio_errors);
    }

    /**
     * Clears the Montonio errors from the cookie
     *
     * @since 2.0.0
     * @return void
     */
    public static function clearMontonioErrors()
    {
        Context::getContext()->cookie->montonio_errors = '';
        Context::getContext()->cookie->write();
    }

    /**
     * Gets the Montonio module instance
     *
     * @since 2.0.0
     * @return Montonio the Montonio module instance
     */
    public static function getMontonioModule()
    {
        $module = Module::getInstanceByName('montonio');
        if (!$module instanceof Montonio) {
            throw new PrestaShopException('Montonio module instance is not available');
        }

        return $module;
    }

    /**
     * Translates the given key
     *
     * @since 2.0.0
     * @param string $key the key to translate
     * @return string the translated string
     */
    public static function translate($key)
    {
        return Translate::getModuleTranslation('montonio', $key, 'montonio');
    }

    /**
     * Checks if the given string is a valid UUIDV4.
     *
     * @since 2.0.0
     * @param mixed $uuid The value to check.
     * @return boolean True if the value is a valid UUID, false otherwise.
     */
    public static function isValidUuid($uuid)
    {
        if (!is_string($uuid) || empty($uuid)) {
            return false;
        }

        return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i', $uuid) === 1;
    }

    /**
     * Generates a new order reference
     *
     * @since 2.0.0
     * @return string The generated order reference
     */
    public static function generateOrderReference()
    {
        return Order::generateReference();
    }

    /**
     * Formats the price
     *
     * @since 2.0.0
     * @param float $grandTotal The grand total to format.
     * @return float The formatted price
     */
    public static function formatPrice($grandTotal)
    {
        return Tools::ps_round($grandTotal, 2);
    }

    /**
     * Render template
     *
     * @since 2.0.0
     * @param string $template The template file to render.
     * @param array $args Optional associative array of variables to assign to the template.
     * @return string Rendered template
     */
    public static function renderTemplate($template, $args = array())
    {
        // Ensure args is an array
        if (!is_array($args)) {
            $args = array();
        }

        $smarty = Context::getContext()->smarty;
        foreach ($args as $key => $value) {
            $smarty->assign($key, $value);
        }

        return $smarty->fetch($template);
    }

    /**
     * Gets a cookie
     *
     * @since 2.0.0
     * @param string $key The cookie key
     * @return mixed The cookie value
     */
    public static function getCookie($key)
    {
        return Context::getContext()->cookie->{$key};
    }

    /**
     * Sets a cookie
     *
     * @since 2.0.0
     * @param string $key The cookie key
     * @param mixed $value The cookie value
     * @return void
     */
    public static function setCookie($key, $value)
    {
        $context = Context::getContext();
        $context->cookie->{$key} = $value;
        $context->cookie->write();
    }

    /**
     * Clears a cookie
     *
     * @since 2.0.0
     * @param string $key The cookie key
     * @return void
     */
    public static function clearCookie($key)
    {
        $context = Context::getContext();
        unset($context->cookie->{$key});
        $context->cookie->write();
    }

}
