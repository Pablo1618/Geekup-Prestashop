<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Interface MontonioOrderProcessingStrategy - defines the methods for handling order processing.
 *
 * @since 2.0.0
 */
interface MontonioOrderProcessingStrategy
{
    public function onPlaceOrderClicked();
}
