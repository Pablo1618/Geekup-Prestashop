{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 *}
<div id="_desktop_user_info">
  <div class="user-info">
    {if $logged}
      <div class="user-logged">
        <a
          class="account"
          href="{$urls.pages.my_account}"
          title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}"
          rel="nofollow"
        >
          <i class="material-icons signIn">&#xE7FF;</i>
          <span class="hidden-sm-down">Moje konto</span>
        </a>
        <a
          class="logout hidden-sm-down"
          href="{$urls.actions.logout}"
          rel="nofollow"
        >
          <i class="material-icons signIn logout"></i>
          {l s='Wyloguj się' d='Shop.Theme.Actions'}
        </a>
      </div>
    {else}
      <div class="login-register">
        <a
          href="{$urls.pages.register}"
          title="{l s='Register to your customer account' d='Shop.Theme.Customeraccount'}"
          rel="nofollow"
        >
          <i class="material-icons signIn">&#xE7FF;</i>
          <span class="hidden-sm-down">{l s='Zarejestruj się' d='Shop.Theme.Actions'}</span>
        </a>
        <a
          href="{$urls.pages.my_account}"
          title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}"
          rel="nofollow"
        >
          <i class="material-icons signIn login"></i>
          <span class="hidden-sm-down">{l s='Zaloguj się' d='Shop.Theme.Actions'}</span>
        </a>
      </div>
    {/if}
  </div>
</div>
