<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder13e6e = null;
    private $initializer4fac0 = null;
    private static $publicProperties074e0 = [
        
    ];
    public function getConnection()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getConnection', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getMetadataFactory', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getExpressionBuilder', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'beginTransaction', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getCache', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getCache();
    }
    public function transactional($func)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'transactional', array('func' => $func), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'wrapInTransaction', array('func' => $func), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'commit', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->commit();
    }
    public function rollback()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'rollback', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getClassMetadata', array('className' => $className), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'createQuery', array('dql' => $dql), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'createNamedQuery', array('name' => $name), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'createQueryBuilder', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'flush', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'clear', array('entityName' => $entityName), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->clear($entityName);
    }
    public function close()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'close', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->close();
    }
    public function persist($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'persist', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'remove', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'refresh', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'detach', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'merge', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getRepository', array('entityName' => $entityName), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'contains', array('entity' => $entity), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getEventManager', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getConfiguration', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'isOpen', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getUnitOfWork', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getProxyFactory', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'initializeObject', array('obj' => $obj), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'getFilters', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'isFiltersStateClean', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, 'hasFilters', array(), $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        return $this->valueHolder13e6e->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer4fac0 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder13e6e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder13e6e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder13e6e->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer4fac0 && ($this->initializer4fac0->__invoke($valueHolder13e6e, $this, '__get', ['name' => $name], $this->initializer4fac0) || 1) && $this->valueHolder13e6e = $valueHolder13e6e;
        if (isset(self::$publicProperties074e0[$name])) {
            return $this->valueHolder13e6e->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
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
