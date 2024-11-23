<?php

/**
 * Upgrade script to version 2.0.7
 * This script deregisters the actionMontonioBeforeCreateOrder hook if it was previously registered.
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_0_7($module)
{
    // Check if the hook 'actionMontonioBeforeCreateOrder' is registered
    if (Hook::getIdByName('actionMontonioBeforeCreateOrder')) {
        // Deregister the hook for the current module
        if (!$module->unregisterHook('actionMontonioBeforeCreateOrder')) {
            return false; // If hook deregistration fails, return false
        }
    }

    // If deregistration is successful or not required, return true
    return true;
}
