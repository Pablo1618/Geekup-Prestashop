<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioLogger - provides methods for logging messages to the ps_log table.
 *
 * @since 2.0.0
 */
class MontonioLogger
{
    /**
     * Log a message to the Montonio log file.
     *
     * @since 2.0.0
     * @param string $message The message to log.
     * @param string $level The log level.
     */
    public static function addLog($message, $severity = 1)
    {
        PrestaShopLogger::addLog('[Montonio] ' . $message, $severity);
    }
}
