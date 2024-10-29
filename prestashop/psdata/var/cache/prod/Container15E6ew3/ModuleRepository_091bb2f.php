<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder13e6e = null;
    private $initializer4fac0 = null;
    private static $publicProperties074e0 = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getList', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getInstalledModules', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getMustBeConfiguredModules', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getUpgradableModules', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getModule', array('moduleName' => $moduleName), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'setActionUrls', array('collection' => $collection), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializer4fac0 = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHolder13e6e) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolder13e6e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHolder13e6e->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__get', ['name' => $name], $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        if (isset(self::$publicProperties074e0[$name])) {
            return $this->valueHolder13e6e->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13e6e;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder13e6e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13e6e;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder13e6e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__isset', array('name' => $name), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13e6e;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder13e6e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__unset', array('name' => $name), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13e6e;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder13e6e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__clone', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        $this->valueHolder13e6e = clone $this->valueHolder13e6e;
    }
    public function __sleep()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__sleep', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return array('valueHolder13e6e');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer4fac0 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer4fac0;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'initializeProxy', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder13e6e;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder13e6e;
    }
}
