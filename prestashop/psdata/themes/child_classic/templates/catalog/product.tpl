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
{extends file=$layout}

{block name='head' append}
  <meta property="og:type" content="product">
  {if $product.cover}
    <meta property="og:image" content="{$product.cover.large.url}">
  {/if}

  {if $product.show_price}
    <meta property="product:pretax_price:amount" content="{$product.price_tax_exc}">
    <meta property="product:pretax_price:currency" content="{$currency.iso_code}">
    <meta property="product:price:amount" content="{$product.price_amount}">
    <meta property="product:price:currency" content="{$currency.iso_code}">
  {/if}
  {if isset($product.weight) && ($product.weight != 0)}
  <meta property="product:weight:value" content="{$product.weight}">
  <meta property="product:weight:units" content="{$product.weight_unit}">
  {/if}
{/block}

{block name='head_microdata_special'}
  {include file='_partials/microdata/product-jsonld.tpl'}
{/block}

{block name='content'}

  <section id="main" class="product-width">
    <meta content="{$product.url}">

    <div class="row product-container js-product-container">
      <div class="col-md-6 product-content-1">
        {block name='page_content_container'}
          <section class="page-content" id="content">
            {block name='page_content'}

              {block name='product_cover_thumbnails'}
                {include file='catalog/_partials/product-cover-thumbnails.tpl'}
                {include file='catalog/_partials/product-flags.tpl'}
              {/block}
              <div class="scroll-box-arrows">
                <i class="material-icons left">&#xE314;</i>
                <i class="material-icons right">&#xE315;</i>
              </div>

            {/block}
          </section>
        {/block}
        </div>
        <div class="col-md-6 product-content-2">
          {block name='page_header_container'}
            {block name='page_header'}
              <h1 class="h1">{block name='page_title'}{$product.name}{/block}</h1>
            {/block}
          {/block}
          
          <div class="product-line"></div>
          <div class="row product-container js-product-container">
            <div class="col-md-6">
              <div class="product-info row">
                <div class="row manufacturer">
                  <span class="first">Producent: </span>
                  <a href="{$product_brand_url}">
                    <span class="second">{$product_manufacturer->name}</span>
                  </a>
                </div>
                <div class="row">
                  <div class="row availability">
                    <span class="first">Dostępność:</span>
                    <span class="second">{$product.availability}</span>
                  </div>
              
                  <div class="delivery">
                    <span class="first">Wysyłka w:</span>
                    <span class="second">24 godziny</span>
                  </div>
              
                  <div class="shipping-costs">
                    <span class="first">Dostawa:</span>
              
                    <span class="second">
                      <span class="lowest-cost">od 9,99&nbsp;zł</span>
                      <span class="lowest-cost-shipping">- Orlen Paczka</span>
                      <span class="lowest-cost-shipping-country"></span>
              
                      <span class="hint">
                        <span class="material-symbols-outlined icon">help</span>
              
                        <span class="hint__content">
                          Cena nie zawiera ewentualnych kosztów płatności
                        </span>
                      </span>
                    </span>
              
                    <a href="#deliveries" title="sprawdź formy dostawy" class="showShippingCost">
                      <span>sprawdź formy dostawy</span>
                    </a>
                  </div>
              
                </div>
              </div>
              </div>
            <div class="col-md-6">
              {block name='product_prices'}
                {include file='catalog/_partials/product-prices.tpl'}
              {/block}
              <div class="product-actions js-product-actions">
                {block name='product_buy'}
                  <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                    <input type="hidden" name="token" value="{$static_token}">
                    <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                    <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id" class="js-product-customization-id">
  
                    {block name='product_variants'}
                      {include file='catalog/_partials/product-variants.tpl'}
                    {/block}
  
                    {block name='product_pack'}
                      {if $packItems}
                        <section class="product-pack">
                          <p class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</p>
                          {foreach from=$packItems item="product_pack"}
                            {block name='product_miniature'}
                              {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack showPackProductsPrice=$product.show_price}
                            {/block}
                          {/foreach}
                      </section>
                      {/if}
                    {/block}
  
                    {block name='product_discounts'}
                      {include file='catalog/_partials/product-discounts.tpl'}
                    {/block}
  
                    {block name='product_add_to_cart'}
                      {include file='catalog/_partials/product-add-to-cart.tpl'}
                    {/block}

                    {* {block name='product_additional_info'}
                      {include file='catalog/_partials/product-additional-info.tpl'}
                    {/block} *}
  
                    {* Input to refresh product HTML removed, block kept for compatibility with themes *}
                    {block name='product_refresh'}{/block}
                  </form>
                {/block}
              </div>

              <ul class="links-q">
                <li class="question">
                  <a {*data-href="/pl/p/q/11892"*} title="zapytaj o produkt" class="question ajaxlayer">
                    {*<img src="/libraries/images/1px.gif" alt="" class="px1">*}
                    <span>zapytaj o produkt</span>
                  </a>
                </li>
              
                <li class="comment">
                  <a href="#commentform" title="dodaj opinię" class="comment addcomment">
                    {*<img src="/libraries/images/1px.gif" alt="" class="px1">*}
                    <span>dodaj opinię</span>
                  </a>
                </li>
              </ul>

              <body>
                <svg class="paypo__open" viewBox="0 0 600 120" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M0 0h600v120H0z" fill="#fff"></path><path d="M235.13 11.72h4.06v96.56h-4.06z" fill="#f6e7f2"></path><path d="M59.24 63.03v9.44h-9.52v-9.44z" fill="#a41781"></path><path d="M59.2 50.22v9.52h-9.52v-9.52z" fill="#3db288"></path><path d="M46.5 62.9v9.52h-9.52V62.9z" fill="#fbd05c"></path><path d="M87.6 49.63a11.87 11.87 0 0 1-12.09 11.84h-5.18v10.85h-7.9V37.8H75.5a11.87 11.87 0 0 1 12.09 11.84zm-7.9 0a4.21 4.21 0 0 0-4.19-4.44h-5.18v8.88h5.18a4.22 4.22 0 0 0 4.19-4.44zM115.13 47v25.3h-7.6v-2.38A9.52 9.52 0 0 1 100 73c-6.63 0-12.1-5.82-12.1-13.37s5.46-13.36 12.1-13.36a9.55 9.55 0 0 1 7.55 3.09V47zm-7.6 12.66a6.03 6.03 0 1 0-12.06 0 6.03 6.03 0 1 0 12.06 0zM144 47l-8.6 24.4c-2.82 8-7.3 11.17-14.33 10.82v-7c3.52 0 5.18-1.1 6.28-4.17l-10-24h8.3l5.6 15.4 4.7-15.43zm28.1 2.63A11.87 11.87 0 0 1 160 61.47h-5.18v10.85H147V37.8h13a11.87 11.87 0 0 1 12.11 11.84zm-7.9 0a4.22 4.22 0 0 0-4.2-4.44h-5.18v8.88H160a4.23 4.23 0 0 0 4.22-4.44zM173.1 60a13.07 13.07 0 1 1 13.07 13 12.93 12.93 0 0 1-13.07-13zm18.74 0a5.67 5.67 0 1 0-5.67 5.82 5.52 5.52 0 0 0 5.67-5.82z" fill="#010101"></path><path d="M366.08 79.6h100.65v28.68H366.08z" fill="#3db286"></path><path d="M386.44 95.54l2.07-1.2a2.22 2.22 0 0 0 2.21 1.46c1.15 0 1.43-.45 1.43-.86 0-.65-.6-.9-2.18-1.34s-3.1-1.2-3.1-3.2a3.3 3.3 0 0 1 3.54-3.21 4.09 4.09 0 0 1 3.85 2.38l-2 1.2a1.84 1.84 0 0 0-1.82-1.22c-.75 0-1.13.37-1.13.8s.26.8 1.9 1.3 3.38 1 3.38 3.27c0 2-1.62 3.23-3.9 3.23a4.14 4.14 0 0 1-4.24-2.6zm17.34-1.37a3.77 3.77 0 0 1-3.59 4 2.81 2.81 0 0 1-2.24-.91v3.7h-2.26V90.4h2.3v.7a2.82 2.82 0 0 1 2.24-.92 3.77 3.77 0 0 1 3.54 3.97zm-2.25 0a1.79 1.79 0 1 0-1.79 1.83 1.72 1.72 0 0 0 1.79-1.83zm8.04-3.9v2.56a1.77 1.77 0 0 0-2.25 1.71v3.4h-2.26V90.4h2.26v1.34a2.25 2.25 0 0 1 2.25-1.49zm8.55.14v7.52h-2.26v-.7a2.83 2.83 0 0 1-2.24.91 4 4 0 0 1 0-7.94 2.83 2.83 0 0 1 2.24.92v-.7zm-2.26 3.76a1.79 1.79 0 1 0-1.79 1.83 1.71 1.71 0 0 0 1.79-1.83zm14.6-3.76l-2.4 7.52h-2.1l-1.2-4-1.2 4h-2.1L419 90.4h2.4l1.08 4 1.17-4h2.1l1.17 4 1.1-4zm8.32-3v10.53h-2.25v-.7a2.85 2.85 0 0 1-2.25.91 4 4 0 0 1 0-7.94 2.85 2.85 0 0 1 2.25.92V87.4zm-2.25 6.77a1.8 1.8 0 1 0-1.8 1.84 1.72 1.72 0 0 0 1.8-1.84zm9.7 1.66v2.1h-6v-1.5l2.78-3.9h-2.7v-2.1h5.72v1.5l-2.85 3.9zM444 89.5h-2.16l1.2-2.1h2.7z" fill="#fff"></path><path d="M311.67 30.15l-5.9-8.53v8.53h-4.2V11.72h4.2v8l5.63-8h4.8l-6.2 9 6.48 9.45zM329.83 17v13.15h-3.95V28.9a4.52 4.52 0 0 1-3.77 1.61c-2.65 0-4.92-1.9-4.92-5.45V17h3.95v7.5a2.17 2.17 0 0 0 2.29 2.39c1.45 0 2.45-.84 2.45-2.7V17zm17.05 6.57c0 3.92-2.84 7-6.3 7a5 5 0 0 1-3.92-1.61v6.5h-3.95V17h3.95v1.23a4.94 4.94 0 0 1 3.92-1.6c3.4-.01 6.3 3 6.3 6.94zm-3.95 0a3.13 3.13 0 1 0-6.26 0 3.13 3.13 0 1 0 6.26 0zm17.77-2.8v4.65c0 1.14 1 1.24 2.72 1.14v3.58c-5.16.52-6.66-1-6.66-4.72v-4.65h-2.1V17h2.1v-2.5l3.94-1.2V17h2.72v3.8zM372.06 27a3.45 3.45 0 0 0 2.53-1l3.16 1.8a6.69 6.69 0 0 1-5.75 2.71c-4.5 0-7.3-3-7.3-6.95a6.74 6.74 0 0 1 7-6.95 6.65 6.65 0 0 1 6.69 7 8.06 8.06 0 0 1-.16 1.58h-9.34a3 3 0 0 0 3.16 1.8zm2.43-4.8a3 3 0 0 0-5.66 0zm14.05-5.48v4.48c-1.63-.27-4 .4-4 3v5.95h-3.95V17h3.95v2.34a4 4 0 0 1 4-2.62zm14.96.28v13.15h-3.95V28.9a5 5 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-6.95s2.84-6.95 6.3-6.95a4.94 4.94 0 0 1 3.92 1.6V17zm-3.95 6.58a3.14 3.14 0 1 0-6.27 0 3.14 3.14 0 1 0 6.27 0zm16.95 2.88v3.7H406v-2.63l5-6.85h-4.7V17h10v2.63l-5 6.84zm5.28 7.37h-3.16l1.05-7.76h4.2z" fill="#3db286"></path><g fill="#1d1d1b"><path d="M443.3 26.2c0 3-2.63 4.32-5.47 4.32-2.63 0-4.63-1-5.66-3.14l3.42-1.95a2.16 2.16 0 0 0 2.24 1.57c.95 0 1.42-.3 1.42-.82 0-1.45-6.47-.68-6.47-5.24 0-2.86 2.42-4.3 5.15-4.3a5.76 5.76 0 0 1 5.14 2.81l-3.37 1.82a1.93 1.93 0 0 0-1.77-1.16c-.68 0-1.1.26-1.1.74 0 1.5 6.47.5 6.47 5.36zm16.27-2.63c0 3.92-2.84 7-6.3 7a4.92 4.92 0 0 1-3.92-1.61v6.5h-3.95V17h3.95v1.23a4.92 4.92 0 0 1 3.92-1.6c3.45-.01 6.3 3 6.3 6.94zm-3.95 0a3.13 3.13 0 1 0-6.26 0 3.13 3.13 0 1 0 6.26 0zm14.08-6.85v4.48c-1.63-.27-3.95.4-3.95 3v5.95h-3.95V17h3.95v2.34a4 4 0 0 1 3.95-2.62zm14.95.28v13.15h-3.95V28.9a5 5 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-6.95s2.84-6.95 6.3-6.95a4.94 4.94 0 0 1 3.92 1.6V17zm-3.95 6.58a3.13 3.13 0 1 0-6.26 0 3.13 3.13 0 1 0 6.26 0zM506.23 17L502 30.15h-3.7l-2.1-7-2.1 7h-3.68L486.22 17h4.22l1.9 7 2.05-7h3.7l2.05 7 1.9-7zm14.55-5.28v18.43h-3.95V28.9a5 5 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-6.95s2.84-6.95 6.3-6.95a4.94 4.94 0 0 1 3.92 1.6v-6.5zm-3.95 11.85a3.13 3.13 0 1 0-6.26 0 3.13 3.13 0 1 0 6.26 0zm16.97 2.9v3.7h-10.53v-2.63l5-6.85h-4.7V17h10v2.63l-5 6.84zm-3.85-11h-3.8l2.1-3.7H533zm-259.9 39.7c0 3.92-2.84 7-6.3 7a5 5 0 0 1-3.92-1.61V67h-4V48.57h4v1.23a4.94 4.94 0 0 1 3.92-1.6c3.45 0 6.3 3.03 6.3 6.95zm-3.95 0a3.13 3.13 0 1 0-3.11 3.21 3 3 0 0 0 3.11-3.21zm14.1-6.85v4.48c-1.63-.26-3.94.4-3.94 3v5.95h-3.95V48.57h3.95v2.34a4 4 0 0 1 3.94-2.61zm.8 6.85a7 7 0 1 1 7 7 6.9 6.9 0 0 1-7-7zm10 0a3 3 0 1 0-3 3.1 2.95 2.95 0 0 0 3-3.1z"></path><use xlink:href="#B"></use><path d="M326 48.57v13.16h-3.95V60.5a4.5 4.5 0 0 1-3.76 1.61c-2.66 0-4.92-1.9-4.92-5.45v-8.08h3.95v7.5a2.16 2.16 0 0 0 2.29 2.39c1.44 0 2.44-.84 2.44-2.7V48.6zm11.06 13.16l-4.2-5.82v5.82h-4V43.3h4v11l3.95-5.76h4.6l-4.8 6.58 4.92 6.58zm10.66-9.37V57c0 1.13 1 1.23 2.7 1.13v3.58c-5.16.52-6.66-1-6.66-4.7v-4.64h-2.1v-3.8h2.1v-2.5l4-1.2v3.7h2.7v3.8zm11.4-7.36a2.37 2.37 0 1 1 2.37 2.37 2.39 2.39 0 0 1-2.37-2.37zm.4 3.53h3.95v13.2h-3.95zM383.07 58v3.7h-10.53v-2.6l5-6.85h-4.74v-3.68h10v2.63l-5 6.84zm15.08-9.43v13.16h-3.95V60.5a5 5 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-7s2.84-6.95 6.3-6.95a4.94 4.94 0 0 1 3.92 1.6v-1.18zm-3.95 6.58a3.14 3.14 0 1 0-3.13 3.21 3 3 0 0 0 3.13-3.21zm21 0c0 3.92-2.84 7-6.3 7a5 5 0 0 1-3.91-1.66V67h-4V48.57h4v1.23a4.94 4.94 0 0 1 3.92-1.6c3.44 0 6.28 3.03 6.28 6.95zm-3.95 0a3.13 3.13 0 1 0-3.13 3.21 3 3 0 0 0 3.13-3.21zm11.58-2.82l-1.32.9v8.5h-3.94v-5.8l-1.32.9v-3.76l1.32-.9V42.5h3.94v7l1.32-.9zM438 48.57v13.16h-4V60.5a4.92 4.92 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-7s2.84-6.95 6.3-6.95a4.92 4.92 0 0 1 3.92 1.6v-1.18zm-4 6.58a3.13 3.13 0 1 0-3 3.21 3 3 0 0 0 3.09-3.21zm6.28 0a7 7 0 0 1 12.92-3.58l-3.45 2a2.72 2.72 0 0 0-2.55-1.48 3.06 3.06 0 0 0 0 6.11 2.69 2.69 0 0 0 2.55-1.47l3.45 2a6.73 6.73 0 0 1-5.95 3.4 6.82 6.82 0 0 1-6.97-6.98zm8.45-8.15l3-3.7H447l-2.06 3.7zm22.9 11v3.7H461.1v-2.6l5-6.85h-4.7v-3.68h10v2.63l-5 6.84zm15.08-9.43v13.16h-3.95V60.5a4.92 4.92 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-7s2.84-6.95 6.3-6.95a4.92 4.92 0 0 1 3.92 1.6v-1.18zm-3.95 6.58a3.13 3.13 0 1 0-3.13 3.21 3 3 0 0 0 3.13-3.21zm25.65.8c0 4.05-3.15 6.16-6.7 6.16a6.6 6.6 0 0 1-6.45-4l3.64-2.1a2.65 2.65 0 0 0 2.81 2c1.74 0 2.5-.92 2.5-2.05s-.76-2.06-2.5-2.06h-.87l-1.6-2.4 3.34-4.24h-6.74v-4h11.85v3.42l-3.2 4.06a5.4 5.4 0 0 1 3.92 5.2zm1.6-3.42c0-5.7 2.74-9.6 7.5-9.6s7.5 3.9 7.5 9.6-2.73 9.58-7.5 9.58-7.5-3.9-7.5-9.58zm10.8 0c0-3.56-1.08-5.48-3.3-5.48s-3.3 1.96-3.3 5.48 1.08 5.48 3.3 5.48 3.3-1.93 3.3-5.48z"></path><use xlink:href="#B" x="236.63"></use><path d="M562.84 53.65v8.08h-4v-7.5a2.17 2.17 0 0 0-2.29-2.4c-1.45 0-2.45.84-2.45 2.7v7.2h-3.9V48.57h3.95v1.23a4.51 4.51 0 0 1 3.76-1.6c2.66 0 4.93 1.9 4.93 5.45zm2.3-8.65a2.37 2.37 0 1 1 2.37 2.37 2.39 2.39 0 0 1-2.37-2.37zm.4 3.53h3.94v13.2h-3.94zm6.57 11.07a2.51 2.51 0 1 1 2.5 2.5 2.52 2.52 0 0 1-2.5-2.5z"></path></g><defs><path id="B" d="M310.67 43.3v18.43h-3.95V60.5a5 5 0 0 1-3.92 1.61c-3.45 0-6.3-3-6.3-7s2.84-6.95 6.3-6.95a4.94 4.94 0 0 1 3.92 1.6V43.3zm-3.95 11.85a3.13 3.13 0 1 0-3.13 3.21 3 3 0 0 0 3.13-3.21z"></path></defs></svg>
                <script src="./badge.js"></script>
                
              </body>

            </div>
          </div>

          <div class="product-information">
            {block name='product_description_short'}
              <div id="product-description-short-{$product.id}" class="product-description">{$product.description_short nofilter}</div>
            {/block}

            {if $product.is_customizable && count($product.customizations.fields)}
              {block name='product_customization'}
                {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
              {/block}
            {/if}

            {*<div class="product-actions js-product-actions">
              {block name='product_buy'}
                <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                  <input type="hidden" name="token" value="{$static_token}">
                  <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                  <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id" class="js-product-customization-id">

                  {block name='product_variants'}
                    {include file='catalog/_partials/product-variants.tpl'}
                  {/block}

                  {block name='product_pack'}
                    {if $packItems}
                      <section class="product-pack">
                        <p class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</p>
                        {foreach from=$packItems item="product_pack"}
                          {block name='product_miniature'}
                            {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack showPackProductsPrice=$product.show_price}
                          {/block}
                        {/foreach}
                    </section>
                    {/if}
                  {/block}

                  {block name='product_discounts'}
                    {include file='catalog/_partials/product-discounts.tpl'}
                  {/block}

                  {block name='product_add_to_cart'}
                    {include file='catalog/_partials/product-add-to-cart.tpl'}
                  {/block}

                  {block name='product_additional_info'}
                    {include file='catalog/_partials/product-additional-info.tpl'}
                  {/block}
                  *}
                  {* Input to refresh product HTML removed, block kept for compatibility with themes *}
                  {*{block name='product_refresh'}{/block}
                </form>
              {/block}

            </div>*}

            {*{block name='hook_display_reassurance'}
              {hook h='displayReassurance'}
            {/block}*}

            {*{block name='product_tabs'}
              <div class="tabs">
                <ul class="nav nav-tabs" role="tablist">
                  {if $product.description}
                    <li class="nav-item">
                       <a
                         class="nav-link{if $product.description} active js-product-nav-active{/if}"
                         data-toggle="tab"
                         href="#description"
                         role="tab"
                         aria-controls="description"
                         {if $product.description} aria-selected="true"{/if}>{l s='Description' d='Shop.Theme.Catalog'}</a>
                    </li>
                  {/if}
                  <li class="nav-item">
                    <a
                      class="nav-link{if !$product.description} active js-product-nav-active{/if}"
                      data-toggle="tab"
                      href="#product-details"
                      role="tab"
                      aria-controls="product-details"
                      {if !$product.description} aria-selected="true"{/if}>{l s='Product Details' d='Shop.Theme.Catalog'}</a>
                  </li>
                  {if $product.attachments}
                    <li class="nav-item">
                      <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#attachments"
                        role="tab"
                        aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
                    </li>
                  {/if}
                  {foreach from=$product.extraContent item=extra key=extraKey}
                    <li class="nav-item">
                      <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#extra-{$extraKey}"
                        role="tab"
                        aria-controls="extra-{$extraKey}">{$extra.title}</a>
                    </li>
                  {/foreach}
                </ul>

                <div class="tab-content" id="tab-content">
                 <div class="tab-pane fade in{if $product.description} active js-product-tab-active{/if}" id="description" role="tabpanel">
                   {block name='product_description'}
                     <div class="product-description">{$product.description nofilter}</div>
                   {/block}
                 </div>

                 {block name='product_details'}
                   {include file='catalog/_partials/product-details.tpl'}
                 {/block}

                 {block name='product_attachments'}
                   {if $product.attachments}
                    <div class="tab-pane fade in" id="attachments" role="tabpanel">
                       <section class="product-attachments">
                         <p class="h5 text-uppercase">{l s='Download' d='Shop.Theme.Actions'}</p>
                         {foreach from=$product.attachments item=attachment}
                           <div class="attachment">
                             <h4><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a></h4>
                             <p>{$attachment.description}</p>
                             <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                               {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                             </a>
                           </div>
                         {/foreach}
                       </section>
                     </div>
                   {/if}
                 {/block}

                 {foreach from=$product.extraContent item=extra key=extraKey}
                 <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
                   {$extra.content nofilter}
                 </div>
                 {/foreach}
              </div>
            </div>
          {/block}*}
        </div>
      </div>
    </div>

    {block name='product_tabs'}
      <div class="tabs">
        <ul class="nav nav-tabs" role="tablist">
          {if $product.description}
            <li class="nav-item">
                <a
                  class="nav-link{if $product.description} active js-product-nav-active{/if}"
                  data-toggle="tab"
                  href="#description"
                  role="tab"
                  aria-controls="description"
                  {if $product.description} aria-selected="true"{/if}>{l s='Description' d='Shop.Theme.Catalog'}</a>
            </li>
          {/if}
          {*<li class="nav-item">
            <a
              class="nav-link{if !$product.description} active js-product-nav-active{/if}"
              data-toggle="tab"
              href="#product-details"
              role="tab"
              aria-controls="product-details"
              {if !$product.description} aria-selected="true"{/if}>{l s='Product Details' d='Shop.Theme.Catalog'}</a>
          </li>*}
          <li class="nav-item">
            <a
              class="nav-link"
              data-toggle="tab"
              href="#deliveries"
              role="tab"
              aria-controls="deliveries">Koszty dostawy
              <span class="hint">
                <span class="material-symbols-outlined icon">help</span>
                  <span class="hint__content tab__content">
                    Cena nie zawiera ewentualnych kosztów płatności
                  </span>
                </span>
              </span>
          </a>  
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-toggle="tab"
              href="#commentform"
              role="tab"
              aria-controls="commentform">Opinie o produkcie</a>
          </li>
          {if $product.attachments}
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#attachments"
                role="tab"
                aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
            </li>
          {/if}
          {foreach from=$product.extraContent item=extra key=extraKey}
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#extra-{$extraKey}"
                role="tab"
                aria-controls="extra-{$extraKey}">{$extra.title}</a>
            </li>
          {/foreach}
        </ul>

        <div class="tab-content" id="tab-content">
          <div class="tab-pane fade in{if $product.description} active js-product-tab-active{/if}" id="description" role="tabpanel">
            {block name='product_description'}
              <div class="product-description">{$product.description nofilter}</div>
            {/block}
          </div>

          {block name='product_details'}
            {include file='catalog/_partials/product-details.tpl'}
          {/block}

          <div class="tab-pane fade in" id="deliveries" role="tabpanel">
            <div class="product-description">
              <div class="innerbox tab-content product-deliveries">
                <div class="delivery-container" id="deliveries">
                  <div class="shipping-country-select" style="display: none;">
                    <span>
                      <em>Kraj wysyłki:</em>
                    </span>
                  
                    <span>
                      <select name="shipping-country" class="shipping-country"></select>
                    </span>
                  </div>
                  <div class="shippings " data-cost-from="od" data-cost-free="Darmowa">
                    <div class="shipping row f-row">
                      <div class="shipping-label-container f-grid-9"><span class="shipping-label">Orlen Paczka</span> (Zamów do jednego z
                        10 tys. punktów odbioru)</div>
                      <div class="shipping-cost f-grid-3">9,99&nbsp;zł</div>
                    </div>
                    <div class="shipping row f-row">
                      <div class="shipping-label-container f-grid-9"><span class="shipping-label">Paczkomat InPost</span> (Przesyłka
                        zostanie wysłana do wybranego przez Ciebie paczkomatu)</div>
                      <div class="shipping-cost f-grid-3">14,99&nbsp;zł</div>
                    </div>
                    <div class="shipping row f-row">
                      <div class="shipping-label-container f-grid-9"><span class="shipping-label">Kurier InPost</span> (Paczka zostanie do
                        Ciebie wysłana firmą kurierską)</div>
                      <div class="shipping-cost f-grid-3">14,99&nbsp;zł</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade in" id="commentform" role="tabpanel">
              <div class="product-description">
                {*{block name='hook_display_nav'} {hook h='displayNav' product=$product category=$category} {/block}*}
                {block name='product_footer'}
                  {hook h='displayFooterProduct' product=$product category=$category}
                {/block}
              </div>
          </div>

          {block name='product_attachments'}
            {if $product.attachments}
            <div class="tab-pane fade in" id="attachments" role="tabpanel">
                <section class="product-attachments">
                  <p class="h5 text-uppercase">{l s='Download' d='Shop.Theme.Actions'}</p>
                  {foreach from=$product.attachments item=attachment}
                    <div class="attachment">
                      <h4><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a></h4>
                      <p>{$attachment.description}</p>
                      <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                        {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                      </a>
                    </div>
                  {/foreach}
                </section>
              </div>
            {/if}
          {/block}

          {foreach from=$product.extraContent item=extra key=extraKey}
          <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
            {$extra.content nofilter}
          </div>
          {/foreach}
        </div>
      </div>
    {/block}

    {block name='product_accessories'}
      {if $accessories}
        <section class="product-accessories clearfix">
          <p class="h5 text-uppercase">{l s='You might also like' d='Shop.Theme.Catalog'}</p>
          <div class="products row">
            {foreach from=$accessories item="product_accessory" key="position"}
              {block name='product_miniature'}
                {include file='catalog/_partials/miniatures/product.tpl' product=$product_accessory position=$position productClasses="col-xs-12 col-sm-6 col-lg-4 col-xl-3"}
              {/block}
            {/foreach}
          </div>
        </section>
      {/if}
    {/block}

    {*{block name='product_footer'}
      {hook h='displayFooterProduct' product=$product category=$category}
    {/block}*}

    {block name='product_images_modal'}
      {include file='catalog/_partials/product-images-modal.tpl'}
    {/block}

    {block name='hook_display_nav2'} {hook h='displayNav2'} {/block}

    {block name='page_footer_container'}
      <footer class="page-footer">
        {block name='page_footer'}
          <!-- Footer content -->
        {/block}
      </footer>
    {/block}
  </section>

{/block}
