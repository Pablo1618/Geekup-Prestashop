<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\Cache\Traits;

use PrestaShop\Module\PsAccounts\Vendor\Psr\Log\LoggerAwareTrait;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\Cache\CacheItem;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
trait AbstractTrait
{
    use LoggerAwareTrait;
    private $namespace;
    private $namespaceVersion = '';
    private $versioningIsEnabled = \false;
    private $deferred = [];
    /**
     * @var int|null The maximum length to enforce for identifiers or null when no limit applies
     */
    protected $maxIdLength;
    /**
     * Fetches several cache items.
     *
     * @param array $ids The cache identifiers to fetch
     *
     * @return array|\Traversable The corresponding values found in the cache
     */
    protected abstract function doFetch(array $ids);
    /**
     * Confirms if the cache contains specified cache item.
     *
     * @param string $id The identifier for which to check existence
     *
     * @return bool True if item exists in the cache, false otherwise
     */
    protected abstract function doHave($id);
    /**
     * Deletes all items in the pool.
     *
     * @param string $namespace The prefix used for all identifiers managed by this pool
     *
     * @return bool True if the pool was successfully cleared, false otherwise
     */
    protected abstract function doClear($namespace);
    /**
     * Removes multiple items from the pool.
     *
     * @param array $ids An array of identifiers that should be removed from the pool
     *
     * @return bool True if the items were successfully removed, false otherwise
     */
    protected abstract function doDelete(array $ids);
    /**
     * Persists several cache items immediately.
     *
     * @param array $values   The values to cache, indexed by their cache identifier
     * @param int   $lifetime The lifetime of the cached values, 0 for persisting until manual cleaning
     *
     * @return array|bool The identifiers that failed to be cached or a boolean stating if caching succeeded or not
     */
    protected abstract function doSave(array $values, $lifetime);
    /**
     * {@inheritdoc}
     */
    public function hasItem($key)
    {
        $id = $this->getId($key);
        if (isset($this->deferred[$key])) {
            $this->commit();
        }
        try {
            return $this->doHave($id);
        } catch (\Exception $e) {
            CacheItem::log($this->logger, 'Failed to check if key "{key}" is cached', ['key' => $key, 'exception' => $e]);
            return \false;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->deferred = [];
        if ($cleared = $this->versioningIsEnabled) {
            $namespaceVersion = \substr_replace(\base64_encode(\pack('V', \mt_rand())), static::NS_SEPARATOR, 5);
            try {
                $cleared = $this->doSave([static::NS_SEPARATOR . $this->namespace => $namespaceVersion], 0);
            } catch (\Exception $e) {
                $cleared = \false;
            }
            if ($cleared = \true === $cleared || [] === $cleared) {
                $this->namespaceVersion = $namespaceVersion;
            }
        }
        try {
            return $this->doClear($this->namespace) || $cleared;
        } catch (\Exception $e) {
            CacheItem::log($this->logger, 'Failed to clear the cache', ['exception' => $e]);
            return \false;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function deleteItem($key)
    {
        return $this->deleteItems([$key]);
    }
    /**
     * {@inheritdoc}
     */
    public function deleteItems(array $keys)
    {
        $ids = [];
        foreach ($keys as $key) {
            $ids[$key] = $this->getId($key);
            unset($this->deferred[$key]);
        }
        try {
            if ($this->doDelete($ids)) {
                return \true;
            }
        } catch (\Exception $e) {
        }
        $ok = \true;
        // When bulk-delete failed, retry each item individually
        foreach ($ids as $key => $id) {
            try {
                $e = null;
                if ($this->doDelete([$id])) {
                    continue;
                }
            } catch (\Exception $e) {
            }
            CacheItem::log($this->logger, 'Failed to delete key "{key}"', ['key' => $key, 'exception' => $e]);
            $ok = \false;
        }
        return $ok;
    }
    /**
     * Enables/disables versioning of items.
     *
     * When versioning is enabled, clearing the cache is atomic and doesn't require listing existing keys to proceed,
     * but old keys may need garbage collection and extra round-trips to the back-end are required.
     *
     * Calling this method also clears the memoized namespace version and thus forces a resynchonization of it.
     *
     * @param bool $enable
     *
     * @return bool the previous state of versioning
     */
    public function enableVersioning($enable = \true)
    {
        $wasEnabled = $this->versioningIsEnabled;
        $this->versioningIsEnabled = (bool) $enable;
        $this->namespaceVersion = '';
        return $wasEnabled;
    }
    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        if ($this->deferred) {
            $this->commit();
        }
        $this->namespaceVersion = '';
    }
    /**
     * Like the native unserialize() function but throws an exception if anything goes wrong.
     *
     * @param string $value
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected static function unserialize($value)
    {
        if ('b:0;' === $value) {
            return \false;
        }
        $unserializeCallbackHandler = \ini_set('unserialize_callback_func', __CLASS__ . '::handleUnserializeCallback');
        try {
            if (\false !== ($value = \unserialize($value))) {
                return $value;
            }
            throw new \DomainException('Failed to unserialize cached value.');
        } catch (\Error $e) {
            throw new \ErrorException($e->getMessage(), $e->getCode(), \E_ERROR, $e->getFile(), $e->getLine());
        } finally {
            \ini_set('unserialize_callback_func', $unserializeCallbackHandler);
        }
    }
    private function getId($key)
    {
        CacheItem::validateKey($key);
        if ($this->versioningIsEnabled && '' === $this->namespaceVersion) {
            $this->namespaceVersion = '1' . static::NS_SEPARATOR;
            try {
                foreach ($this->doFetch([static::NS_SEPARATOR . $this->namespace]) as $v) {
                    $this->namespaceVersion = $v;
                }
                if ('1' . static::NS_SEPARATOR === $this->namespaceVersion) {
                    $this->namespaceVersion = \substr_replace(\base64_encode(\pack('V', \time())), static::NS_SEPARATOR, 5);
                    $this->doSave([static::NS_SEPARATOR . $this->namespace => $this->namespaceVersion], 0);
                }
            } catch (\Exception $e) {
            }
        }
        if (null === $this->maxIdLength) {
            return $this->namespace . $this->namespaceVersion . $key;
        }
        if (\strlen($id = $this->namespace . $this->namespaceVersion . $key) > $this->maxIdLength) {
            $id = $this->namespace . $this->namespaceVersion . \substr_replace(\base64_encode(\hash('sha256', $key, \true)), static::NS_SEPARATOR, -(\strlen($this->namespaceVersion) + 22));
        }
        return $id;
    }
    /**
     * @internal
     */
    public static function handleUnserializeCallback($class)
    {
        throw new \DomainException('Class not found: ' . $class);
    }
}
