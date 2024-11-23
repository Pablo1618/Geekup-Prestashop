<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Upgrade the module to version 2.0.1
 *
 * @since 2.0.0
 * @param Montonio $module The module instance
 * @return bool True if the upgrade was successful, false otherwise
 */
function upgrade_module_2_0_1($module)
{
    error_log('Starting upgrade to 2.0.1');
    $errorPageLocation = Configuration::get('MONTONIO_ADVANCED_ERROR_PAGE');
    if (empty($errorPageLocation)) {
        if (!Configuration::updateValue('MONTONIO_ADVANCED_ERROR_PAGE', 'checkout')) {
            error_log('Failed to update MONTONIO_ADVANCED_ERROR_PAGE to checkout');
            return false;
        }
    }
   
    error_log('Upgrade to 2.0.1 completed successfully.');
    return true;
}