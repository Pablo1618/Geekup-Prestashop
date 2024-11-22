<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class MontonioLocksTableManager
 * Provides locking functionality using a database to prevent multiple processes from running the same code simultaneously.
 * @since 2.0.0
 */
class MontonioLocksTableManager
{
    /**
     * Create Montonio locks table
     *
     * @since 2.0.0
     * @return bool Returns true if the table was created successfully, false otherwise
     */
    public static function createMontonioLocksTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'montonio_locks` (
            lock_name VARCHAR(128) NOT NULL,
            created_at DATETIME NOT NULL,
            expires_at DATETIME NOT NULL,
            PRIMARY KEY (lock_name)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Drop Montonio locks table
     *
     * @since 2.0.0
     * @return bool Returns true if the table was dropped successfully, false otherwise
     */
    public static function dropMontonioLocksTable()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'montonio_locks`';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Attempts to acquire a lock.
     * If the lock is already present and not expired, it will not be acquired.
     *
     * @since 2.0.0
     * @param string $lockName Name of the lock to acquire.
     * @return bool Returns true if lock was successfully acquired, false otherwise.
     */
    public function acquireLock($lockName)
    {
        $db = Db::getInstance();
        $lockName = pSQL($lockName);
        $now = date('Y-m-d H:i:s');
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 MINUTE', strtotime($now)));
        $sql = 'INSERT INTO `' . _DB_PREFIX_ . 'montonio_locks` (`lock_name`, `created_at`, `expires_at`)
                VALUES ("' . $lockName . '", "' . $now . '", "' . $expiresAt . '")
                ON DUPLICATE KEY UPDATE `expires_at` = IF(`expires_at` <= "' . $now . '", "' . $expiresAt . '", `expires_at`)';
        $result = $db->execute($sql);

        return $result && $db->Affected_Rows() > 0;
    }

    /**
     * Releases a lock.
     *
     * @since 2.0.0
     * @param string $lockName Name of the lock to release.
     * @return void
     */
    public function releaseLock($lockName)
    {
        $db = Db::getInstance();
        $lockName = pSQL($lockName);
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . 'montonio_locks` WHERE `lock_name` = "' . $lockName . '"';
        $db->execute($sql);
    }

    /**
     * Checks if a lock exists and is not expired.
     *
     * @since 2.0.0
     * @param string $lockName Name of the lock to check.
     * @return bool Returns true if lock exists and is not expired, false otherwise.
     */
    public function lockExists($lockName)
    {
        $db = Db::getInstance();
        $lockName = pSQL($lockName);
        $now = date('Y-m-d H:i:s');
        $sql = 'SELECT 1 FROM `' . _DB_PREFIX_ . 'montonio_locks` WHERE `lock_name` = "' . $lockName . '" AND `expires_at` > "' . $now . '"';

        return (bool) $db->getValue($sql);
    }
}
