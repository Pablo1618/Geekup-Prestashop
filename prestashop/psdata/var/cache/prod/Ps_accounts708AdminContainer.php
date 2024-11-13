<?php

use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\ContainerInterface;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\Container;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\Exception\LogicException;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\Exception\RuntimeException;
use PrestaShop\Module\PsAccounts\Vendor\Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class Ps_accounts708AdminContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->normalizedIds = [
            'prestashop\\module\\psaccounts\\account\\commandhandler\\deleteusershophandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\DeleteUserShopHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\linkshophandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\LinkShopHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\migrateandlinkv4shophandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\MigrateAndLinkV4ShopHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\unlinkshophandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UnlinkShopHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\updateusershophandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpdateUserShopHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\upgrademodulehandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleHandler',
            'prestashop\\module\\psaccounts\\account\\commandhandler\\upgrademodulemultihandler' => 'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleMultiHandler',
            'prestashop\\module\\psaccounts\\account\\linkshop' => 'PrestaShop\\Module\\PsAccounts\\Account\\LinkShop',
            'prestashop\\module\\psaccounts\\account\\session\\firebase\\ownersession' => 'PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession',
            'prestashop\\module\\psaccounts\\account\\session\\firebase\\shopsession' => 'PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession',
            'prestashop\\module\\psaccounts\\account\\session\\shopsession' => 'PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession',
            'prestashop\\module\\psaccounts\\adapter\\configuration' => 'PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration',
            'prestashop\\module\\psaccounts\\adapter\\link' => 'PrestaShop\\Module\\PsAccounts\\Adapter\\Link',
            'prestashop\\module\\psaccounts\\api\\client\\accountsclient' => 'PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient',
            'prestashop\\module\\psaccounts\\api\\client\\servicesbillingclient' => 'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient',
            'prestashop\\module\\psaccounts\\context\\shopcontext' => 'PrestaShop\\Module\\PsAccounts\\Context\\ShopContext',
            'prestashop\\module\\psaccounts\\cqrs\\commandbus' => 'PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus',
            'prestashop\\module\\psaccounts\\factory\\circuitbreakerfactory' => 'PrestaShop\\Module\\PsAccounts\\Factory\\CircuitBreakerFactory',
            'prestashop\\module\\psaccounts\\installer\\installer' => 'PrestaShop\\Module\\PsAccounts\\Installer\\Installer',
            'prestashop\\module\\psaccounts\\middleware\\oauth2middleware' => 'PrestaShop\\Module\\PsAccounts\\Middleware\\Oauth2Middleware',
            'prestashop\\module\\psaccounts\\presenter\\psaccountspresenter' => 'PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter',
            'prestashop\\module\\psaccounts\\provider\\oauth2\\oauth2client' => 'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\Oauth2Client',
            'prestashop\\module\\psaccounts\\provider\\oauth2\\prestashopsession' => 'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\PrestaShopSession',
            'prestashop\\module\\psaccounts\\provider\\oauth2\\shopprovider' => 'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\ShopProvider',
            'prestashop\\module\\psaccounts\\provider\\rsakeysprovider' => 'PrestaShop\\Module\\PsAccounts\\Provider\\RsaKeysProvider',
            'prestashop\\module\\psaccounts\\provider\\shopprovider' => 'PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider',
            'prestashop\\module\\psaccounts\\repository\\configurationrepository' => 'PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository',
            'prestashop\\module\\psaccounts\\repository\\shoptokenrepository' => 'PrestaShop\\Module\\PsAccounts\\Repository\\ShopTokenRepository',
            'prestashop\\module\\psaccounts\\repository\\usertokenrepository' => 'PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository',
            'prestashop\\module\\psaccounts\\service\\analyticsservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\AnalyticsService',
            'prestashop\\module\\psaccounts\\service\\psaccountsservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService',
            'prestashop\\module\\psaccounts\\service\\psbillingservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService',
            'prestashop\\module\\psaccounts\\service\\sentryservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\SentryService',
        ];
        $this->methodMap = [
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\DeleteUserShopHandler' => 'getDeleteUserShopHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\LinkShopHandler' => 'getLinkShopHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\MigrateAndLinkV4ShopHandler' => 'getMigrateAndLinkV4ShopHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UnlinkShopHandler' => 'getUnlinkShopHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpdateUserShopHandler' => 'getUpdateUserShopHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleHandler' => 'getUpgradeModuleHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleMultiHandler' => 'getUpgradeModuleMultiHandlerService',
            'PrestaShop\\Module\\PsAccounts\\Account\\LinkShop' => 'getLinkShopService',
            'PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession' => 'getOwnerSessionService',
            'PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession' => 'getShopSessionService',
            'PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession' => 'getShopSession2Service',
            'PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration' => 'getConfigurationService',
            'PrestaShop\\Module\\PsAccounts\\Adapter\\Link' => 'getLinkService',
            'PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient' => 'getAccountsClientService',
            'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient' => 'getServicesBillingClientService',
            'PrestaShop\\Module\\PsAccounts\\Context\\ShopContext' => 'getShopContextService',
            'PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus' => 'getCommandBusService',
            'PrestaShop\\Module\\PsAccounts\\Factory\\CircuitBreakerFactory' => 'getCircuitBreakerFactoryService',
            'PrestaShop\\Module\\PsAccounts\\Installer\\Installer' => 'getInstallerService',
            'PrestaShop\\Module\\PsAccounts\\Middleware\\Oauth2Middleware' => 'getOauth2MiddlewareService',
            'PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter' => 'getPsAccountsPresenterService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\Oauth2Client' => 'getOauth2ClientService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\PrestaShopSession' => 'getPrestaShopSessionService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\ShopProvider' => 'getShopProviderService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\RsaKeysProvider' => 'getRsaKeysProviderService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider' => 'getShopProvider2Service',
            'PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository' => 'getConfigurationRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Repository\\ShopTokenRepository' => 'getShopTokenRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository' => 'getUserTokenRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Service\\AnalyticsService' => 'getAnalyticsServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService' => 'getPsAccountsServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService' => 'getPsBillingServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\SentryService' => 'getSentryServiceService',
            'ps_accounts.context' => 'getPsAccounts_ContextService',
            'ps_accounts.logger' => 'getPsAccounts_LoggerService',
            'ps_accounts.module' => 'getPsAccounts_ModuleService',
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'PrestaShop\\Module\\PsAccounts\\Vendor\\Psr\\Container\\ContainerInterface' => true,
            'PrestaShop\\Module\\PsAccounts\\Vendor\\Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\DeleteUserShopHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\DeleteUserShopHandler
     */
    protected function getDeleteUserShopHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\DeleteUserShopHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\DeleteUserShopHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient('https://accounts-api.distribution.prestashop.net/', NULL, 10))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] : $this->getShopSessionService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession'] : $this->getOwnerSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\LinkShopHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\LinkShopHandler
     */
    protected function getLinkShopHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\LinkShopHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\LinkShopHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] : $this->getLinkShopService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\MigrateAndLinkV4ShopHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\MigrateAndLinkV4ShopHandler
     */
    protected function getMigrateAndLinkV4ShopHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\MigrateAndLinkV4ShopHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\MigrateAndLinkV4ShopHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient('https://accounts-api.distribution.prestashop.net/', NULL, 10))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] : $this->getShopSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\UnlinkShopHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\UnlinkShopHandler
     */
    protected function getUnlinkShopHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UnlinkShopHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\UnlinkShopHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] : $this->getLinkShopService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\AnalyticsService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\AnalyticsService'] : $this->getAnalyticsServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProvider2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\UpdateUserShopHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpdateUserShopHandler
     */
    protected function getUpdateUserShopHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpdateUserShopHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpdateUserShopHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient('https://accounts-api.distribution.prestashop.net/', NULL, 10))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] : $this->getShopSessionService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession'] : $this->getOwnerSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleHandler
     */
    protected function getUpgradeModuleHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient('https://accounts-api.distribution.prestashop.net/', NULL, 10))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] : $this->getLinkShopService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] : $this->getShopSessionService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus'] : $this->getCommandBusService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleMultiHandler' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleMultiHandler
     */
    protected function getUpgradeModuleMultiHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\CommandHandler\\UpgradeModuleMultiHandler'] = new \PrestaShop\Module\PsAccounts\Account\CommandHandler\UpgradeModuleMultiHandler(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus'] : $this->getCommandBusService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\LinkShop' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\LinkShop
     */
    protected function getLinkShopService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] = new \PrestaShop\Module\PsAccounts\Account\LinkShop(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\Session\Firebase\OwnerSession' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\Session\Firebase\OwnerSession
     */
    protected function getOwnerSessionService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession'] = new \PrestaShop\Module\PsAccounts\Account\Session\Firebase\OwnerSession(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession'] : $this->getShopSession2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\Session\Firebase\ShopSession' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\Session\Firebase\ShopSession
     */
    protected function getShopSessionService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] = new \PrestaShop\Module\PsAccounts\Account\Session\Firebase\ShopSession(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession'] : $this->getShopSession2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Account\Session\ShopSession' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Account\Session\ShopSession
     */
    protected function getShopSession2Service()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\ShopSession'] = new \PrestaShop\Module\PsAccounts\Account\Session\ShopSession(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\ShopProvider'] : $this->getShopProviderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] : $this->getLinkShopService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus'] : $this->getCommandBusService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Adapter\Configuration' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Adapter\Configuration
     */
    protected function getConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration'] = new \PrestaShop\Module\PsAccounts\Adapter\Configuration(${($_ = isset($this->services['ps_accounts.context']) ? $this->services['ps_accounts.context'] : $this->getPsAccounts_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Adapter\Link' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Adapter\Link
     */
    protected function getLinkService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] = new \PrestaShop\Module\PsAccounts\Adapter\Link(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Api\Client\AccountsClient' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient
     */
    protected function getAccountsClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\AccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\AccountsClient('https://accounts-api.distribution.prestashop.net/', NULL, 10);
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient
     */
    protected function getServicesBillingClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient('https://billing-api.distribution.prestashop.net/', ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] : $this->getPsAccountsServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProvider2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Context\ShopContext' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Context\ShopContext
     */
    protected function getShopContextService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] = new \PrestaShop\Module\PsAccounts\Context\ShopContext(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['ps_accounts.context']) ? $this->services['ps_accounts.context'] : $this->getPsAccounts_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Cqrs\CommandBus' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Cqrs\CommandBus
     */
    protected function getCommandBusService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Cqrs\\CommandBus'] = new \PrestaShop\Module\PsAccounts\Cqrs\CommandBus(${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Factory\CircuitBreakerFactory' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Factory\CircuitBreakerFactory
     */
    protected function getCircuitBreakerFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Factory\\CircuitBreakerFactory'] = new \PrestaShop\Module\PsAccounts\Factory\CircuitBreakerFactory(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration'] : $this->getConfigurationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Installer\Installer' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Installer\Installer
     */
    protected function getInstallerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Installer\\Installer'] = new \PrestaShop\Module\PsAccounts\Installer\Installer(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Middleware\Oauth2Middleware' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Middleware\Oauth2Middleware
     */
    protected function getOauth2MiddlewareService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Middleware\\Oauth2Middleware'] = new \PrestaShop\Module\PsAccounts\Middleware\Oauth2Middleware(${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter
     */
    protected function getPsAccountsPresenterService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter'] = new \PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter(${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\OAuth2\Oauth2Client' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\OAuth2\Oauth2Client
     */
    protected function getOauth2ClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\Oauth2Client'] = new \PrestaShop\Module\PsAccounts\Provider\OAuth2\Oauth2Client(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\OAuth2\PrestaShopSession' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\OAuth2\PrestaShopSession
     */
    protected function getPrestaShopSessionService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\PrestaShopSession'] = \PrestaShop\Module\PsAccounts\Factory\PrestaShopSessionFactory::create();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\OAuth2\ShopProvider' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\OAuth2\ShopProvider
     */
    protected function getShopProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\OAuth2\\ShopProvider'] = \PrestaShop\Module\PsAccounts\Provider\OAuth2\ShopProvider::create();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\RsaKeysProvider' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\RsaKeysProvider
     */
    protected function getRsaKeysProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\RsaKeysProvider'] = new \PrestaShop\Module\PsAccounts\Provider\RsaKeysProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\ShopProvider' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\ShopProvider
     */
    protected function getShopProvider2Service()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] = new \PrestaShop\Module\PsAccounts\Provider\ShopProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository
     */
    protected function getConfigurationRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration'] : $this->getConfigurationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Repository\ShopTokenRepository' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ShopTokenRepository
     */
    protected function getShopTokenRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ShopTokenRepository'] = new \PrestaShop\Module\PsAccounts\Repository\ShopTokenRepository(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\ShopSession'] : $this->getShopSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Repository\UserTokenRepository' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\UserTokenRepository
     */
    protected function getUserTokenRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository'] = new \PrestaShop\Module\PsAccounts\Repository\UserTokenRepository(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\Session\\Firebase\\OwnerSession'] : $this->getOwnerSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\AnalyticsService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\AnalyticsService
     */
    protected function getAnalyticsServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\AnalyticsService'] = new \PrestaShop\Module\PsAccounts\Service\AnalyticsService('pEJGnRxw47CU01efFjMyl1S7YcxshLxl', ${($_ = isset($this->services['ps_accounts.logger']) ? $this->services['ps_accounts.logger'] : $this->getPsAccounts_LoggerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsAccountsService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsAccountsService
     */
    protected function getPsAccountsServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] = new \PrestaShop\Module\PsAccounts\Service\PsAccountsService(${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsBillingService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsBillingService
     */
    protected function getPsBillingServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService'] = new \PrestaShop\Module\PsAccounts\Service\PsBillingService(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient'] : $this->getServicesBillingClientService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ShopTokenRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ShopTokenRepository'] : $this->getShopTokenRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\SentryService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\SentryService
     */
    protected function getSentryServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\SentryService'] = new \PrestaShop\Module\PsAccounts\Service\SentryService('https://cd2a5f089edb6d6efe742c0cbe004106@o298402.ingest.us.sentry.io/5354585', 'production', ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Account\\LinkShop'] : $this->getLinkShopService()) && false ?: '_'}, ${($_ = isset($this->services['ps_accounts.context']) ? $this->services['ps_accounts.context'] : $this->getPsAccounts_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_accounts.context' shared service.
     *
     * @return \Context
     */
    protected function getPsAccounts_ContextService()
    {
        return $this->services['ps_accounts.context'] = \Context::getContext();
    }

    /**
     * Gets the public 'ps_accounts.logger' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Vendor\Monolog\Logger
     */
    protected function getPsAccounts_LoggerService()
    {
        return $this->services['ps_accounts.logger'] = \PrestaShop\Module\PsAccounts\Factory\PsAccountsLogger::create();
    }

    /**
     * Gets the public 'ps_accounts.module' shared service.
     *
     * @return \Ps_accounts
     */
    protected function getPsAccounts_ModuleService()
    {
        return $this->services['ps_accounts.module'] = \Module::getInstanceByName('ps_accounts');
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'ps_accounts.environment' => 'production',
            'ps_accounts.accounts_api_url' => 'https://accounts-api.distribution.prestashop.net/',
            'ps_accounts.accounts_ui_url' => 'https://accounts.distribution.prestashop.net',
            'ps_accounts.sso_api_url' => 'https://auth.prestashop.com/api/v1/',
            'ps_accounts.sso_account_url' => 'https://auth.prestashop.com/login',
            'ps_accounts.sso_resend_verification_email_url' => 'https://auth.prestashop.com/account/send-verification-email',
            'ps_accounts.billing_api_url' => 'https://billing-api.distribution.prestashop.net/',
            'ps_accounts.indirect_channel_api_url' => 'https://indirect-channel-api.prestashop.net',
            'ps_accounts.sentry_credentials' => 'https://cd2a5f089edb6d6efe742c0cbe004106@o298402.ingest.us.sentry.io/5354585',
            'ps_accounts.segment_write_key' => 'pEJGnRxw47CU01efFjMyl1S7YcxshLxl',
            'ps_accounts.check_api_ssl_cert' => true,
            'ps_accounts.verify_account_tokens' => true,
            'ps_accounts.accounts_vue_cdn_url' => 'https://unpkg.com/prestashop_accounts_vue_components@3/dist/psaccountsVue.umd.min.js',
            'ps_accounts.accounts_cdn_url' => 'https://unpkg.com/prestashop_accounts_vue_components@5',
            'ps_accounts.svc_accounts_ui_url' => 'https://accounts.psessentials.net',
            'ps_accounts.oauth2_url' => 'https://oauth.prestashop.com',
            'ps_accounts.testimonials_url' => 'https://assets.prestashop3.com/dst/accounts/assets/testimonials.json',
        ];
    }
}
