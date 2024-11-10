{** * Copyright since 2007 PrestaShop SA and Contributors * PrestaShop is an
International Registered Trademark & Property of PrestaShop SA * * NOTICE OF
LICENSE * * This source file is subject to the Academic Free License 3.0
(AFL-3.0) * that is bundled with this package in the file LICENSE.md. * It is
also available through the world-wide-web at this URL: *
https://opensource.org/licenses/AFL-3.0 * If you did not receive a copy of the
license and are unable to * obtain it through the world-wide-web, please send an
email * to license@prestashop.com so we can send you a copy immediately. * *
DISCLAIMER * * Do not edit or add to this file if you wish to upgrade PrestaShop
to newer * versions in the future. If you wish to customize PrestaShop for your
* needs please refer to https://devdocs.prestashop.com/ for more information. *
* @author PrestaShop SA and Contributors
<contact@prestashop.com>
  * @copyright Since 2007 PrestaShop SA and Contributors * @license
  https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0) *}
  
  {*<div class="container">
    <div class="row">
      {block name='hook_footer_before'} {hook h='displayFooterBefore'} {/block}
    </div>
  </div>*}
  
  <div class="box box_webcodersInfoiconsApp wce_Chrome wce_align-center" style="color: rgb(40, 40, 40); background-color: rgb(255, 255, 255);">
    <div class="innerbox container">
      <div class="wce_listWrap wce_as-row wce_rows-5 wce_align-center"> 
        <ul class="wce_groupList" style="border-color:#d8d8d8;"> 
          <li class="wce_group" style="border-color:#d8d8d8;"> 
            <a class="wce_link" title="Atrakcyjne promocje i rabaty" href=""></a> 
            <div class="img-wrap wce_defIco" style="color: #282828;"> 
              <i class="footer-tags promotion-sale"></i>
            </div> 
            <strong class="wce_h3" style="color:#282828;">Atrakcyjne promocje i rabaty</strong> 
            <p class="wce_description" style="color:#282828;">Doceniamy stałych klientów</p> 
          </li> 
          <li class="wce_group" style="border-color:#d8d8d8;"> 
            <div class="img-wrap wce_defIco" style="color: #282828;"> 
              <i class="footer-tags high-quality"></i>
            </div> 
            <strong class="wce_h3" style="color:#282828;">Najwyższa jakość produktów</strong> 
            <p class="wce_description" style="color:#282828;">Wszystkie produkty są nowe i oryginalne</p> 
          </li> 
          <li class="wce_group" style="border-color:#d8d8d8;">
            <a class="wce_link" title="Szybka wysyłka" href="{$link->getCMSLink(13)}"></a> 
            <div class="img-wrap wce_defIco" style="color: #282828;"> 
              <i class="footer-tags quick-delivery"></i>
            </div> 
            <strong class="wce_h3" style="color:#282828;">Szybka wysyłka</strong> 
            <p class="wce_description" style="color:#282828;">Zamówienia złożone do godziny 13:00 wysyłamy tego samego dnia</p> 
          </li> 
          <li class="wce_group" style="border-color:#d8d8d8;"> 
            <a class="wce_link" title="Zaufanie i pozytywne opinie" href="https://allegro.pl/uzytkownik/GeekupPL/oceny"></a> 
            <div class="img-wrap wce_defIco" style="color: #282828;"> 
              <i class="footer-tags trust-positive"></i>
            </div> 
            <strong class="wce_h3" style="color:#282828;">Zaufanie i pozytywne opinie</strong> 
            <p class="wce_description" style="color:#282828;">Dołącz do grona zadowolonych klientów. 99% pozytywnych opini</p> 
          </li> 
          <li class="wce_group" style="border-color:#d8d8d8;"> 
            <div class="wce_counter-wrap" style="color: #282828;"> 
              <span class="wce_counter wce_counter-custom wce_visible wce_done" data-max="50000">50000</span> + 
            </div> 
            <strong class="wce_h3" style="color:#282828;">Zamówień</strong> 
            <p class="wce_description" style="color:#282828;">Ponad 50 tys. zrealizowanych zamówień</p> 
          </li> 
        </ul> 
      </div>
    </div>
  </div>

  <div class="footer-container">
    <div class="container">
      <div class="row">
        {block name='hook_footer'} {hook h='displayFooter'} {/block}
      </div>
      <div class="row">
        {block name='hook_footer_after'} {hook h='displayFooterAfter'} {/block}
      </div>
      <div id="shoper-foot" class="row">
        <div class="rwd wce_footer-social">
          <div class="container social-media">
            <div class="right">
              <a
                class="wce_social-ico wce_fb fa fa-facebook"
                href="https://www.facebook.com/geekuppl/"
                target="_blank"
                rel="nofollow"
                ><span>Facebook</span></a
              >
              <a
                class="wce_social-ico wce_inst fa fa-instagram"
                href="https://www.instagram.com/geekuppl/"
                target="_blank"
                rel="nofollow"
                ><span>Instagram</span></a
              >
            </div>
          </div>
        </div>
        <div class="col-md-12 copyright">
          <p class="text-sm-center">
            <div>
            {block name='copyright_link'}
            <span>
              {l s='%copyright% %year% %prestashop%. Wszelkie prawa zastrzeżone.'
              sprintf=['%prestashop%' => 'geekup.pl', '%year%' => 'Y'|date,
              '%copyright%' => '©'] d='Shop.Theme.Global'}
            </span>
            {/block}
            </div>
            <div class="copyright_link shop-gadget shoper">
            {block name='copyright_link'}
            <a
              href="https://www.shopgadget.pl/"
              target="_blank"
              rel="noopener noreferrer nofollow"
            >
              {l s='Styl graficzny i aplikacje %prestashop%'
              sprintf=['%prestashop%' => 'ShopGadget.pl'] d='Shop.Theme.Global'}
            </a>
            {/block}
            <span class="separator"></span>
            {block name='copyright_link'}
            <a
              href="https://www.shoper.pl/"
              target="_blank"
              rel="noopener noreferrer nofollow"
            >
              {l s='Sklep internetowy %prestashop%'
              sprintf=['%prestashop%' => 'Shoper.pl'] d='Shop.Theme.Global'}
            </a>
            </div>
            {/block}
          </p>
        </div>
      </div>
    </div>
  </div>
</contact@prestashop.com>
