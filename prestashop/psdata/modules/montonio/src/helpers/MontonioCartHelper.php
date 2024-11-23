<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioCartHelper
 *
 * Helper class for getting various data from the cart
 *
 * @since 2.0.0
 */
class MontonioCartHelper
{
    /**
     * Get the address data from the cart
     *
     * @since 2.0.0
     * @return array The address data
     */
    public static function getAddressData()
    {
        $cart = Context::getContext()->cart;
        $customer = Context::getContext()->customer;
        $shippingAddress = new Address($cart->id_address_delivery);
        $billingAddress = new Address($cart->id_address_invoice);

        $data = array(
            'shippingAddress' => array(
                'firstName' => strip_tags($shippingAddress->firstname),
                'lastName' => strip_tags($shippingAddress->lastname),
                'email' => (string) Tools::safeOutput($customer->email),
                'addressLine1' => strip_tags($shippingAddress->address1),
                'addressLine2' => strip_tags(isset($shippingAddress->address2) ? $shippingAddress->address2 : ''),
                'locality' => strip_tags($shippingAddress->city),
                'region' => strip_tags(State::getNameById($shippingAddress->id_state)),
                'postalCode' => strip_tags($shippingAddress->postcode),
                'phoneNumber' => strip_tags((isset($shippingAddress->phone_mobile) ? $shippingAddress->phone_mobile : $shippingAddress->phone)),
            ),
            'billingAddress' => array(
                'firstName' => strip_tags($billingAddress->firstname),
                'lastName' => strip_tags($billingAddress->lastname),
                'email' => (string) Tools::safeOutput($customer->email),
                'addressLine1' => strip_tags($billingAddress->address1),
                'addressLine2' => strip_tags(isset($billingAddress->address2) ? $billingAddress->address2 : ''),
                'locality' => strip_tags($billingAddress->city),
                'region' => strip_tags(State::getNameById($billingAddress->id_state)),
                'postalCode' => strip_tags($billingAddress->postcode),
                'phoneNumber' => strip_tags((isset($billingAddress->phone_mobile) ? $billingAddress->phone_mobile : $billingAddress->phone)),
            ),
        );

        if ($shippingAddress->id_country) {
            $country = new Country($shippingAddress->id_country);
            $data['shippingAddress']['country'] = $country->iso_code;
        }

        if ($billingAddress->id_country) {
            $country = new Country($billingAddress->id_country);
            $data['billingAddress']['country'] = $country->iso_code;
        }

        return $data;
    }

    /**
     * Get the products data from the cart
     *
     * @since 2.0.0
     * @return array The products data
     */
    public static function getProductsData()
    {
        $cart = Context::getContext()->cart;
        $products = $cart->getProducts();
        $productsData = array(
            'products' => array(),
        );

        foreach ($products as $product) {
            $productsData['products'][] = array(
                'name' => strip_tags($product['name']),
                'quantity' => (int) $product['cart_quantity'],
                'finalPrice' => (float) $product['total_wt'],
            );
        }

        return $productsData;
    }

    /**
     * Duplicates a cart that was used to create an order with Montonio which was not paid and sets it as the current cart.
     * This is used to restore the cart if the customer returns to the store after the order was created.
     *
     * @since 2.0.0
     * @see MontonioBeforePaymentOrderProcessing
     * @return array The cart data
     */
    public static function restoreCartIfNecessary()
    {
        $controller = Context::getContext()->controller;
        // if the controller is an instance of MontonioWebhookModuleFrontController, return 
        // This is necessary to prevent the cart from being restored while processing the Montonio callback
        if ($controller instanceof MontonioWebhookModuleFrontController) {
            return;
        }
        
        $context = Context::getContext();
        $oldCartId = MontonioHelper::getCookie('montonio_last_cart_id');
        if (!$context->cart->id && $oldCartId) {
            $oldCart = new Cart($oldCartId);
            $duplication = $oldCart->duplicate();

            if ($duplication && $duplication['success']) {
                $context->cookie->id_cart = $duplication['cart']->id;
                $context->cart = $duplication['cart'];
                CartRule::autoAddToCart($context);
            }

            MontonioHelper::clearCookie('montonio_last_cart_id');
        }
    }
}
