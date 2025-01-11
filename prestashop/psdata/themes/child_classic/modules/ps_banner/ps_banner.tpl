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
<a class="banner" href="{$link->getCMSLink(6)}" title="{$banner_desc}" onclick="trackBannerClick('{$banner_desc}', '{$link->getCMSLink(6)}', event)">
  {if isset($banner_img)}
    <img src="{$banner_img}" alt="{$banner_desc}" title="{$banner_desc}" class="img-fluid" loading="lazy" width="1110" height="213">
  {else}
    <span>{$banner_desc}</span>
  {/if}
</a>

<script>
  function trackBannerClick(bannerDesc, bannerLink, event) {
    if (event) {
      event.preventDefault(); // Zatrzymuje domyślne działanie linku
      event.stopPropagation(); // Zatrzymuje propagację zdarzenia
    }
    if (typeof gtag === 'function') {
      gtag('event', 'banner_click', {
        event_category: 'Banner',
        event_label: bannerDesc,
        value: 1
      });
      console.log('Zdarzenie banner_click wysłane:', bannerDesc, bannerLink);

      // Przejście na stronę docelową po wysłaniu zdarzenia
      setTimeout(() => {
        window.location.href = bannerLink;
      }, 200); // Opóźnienie, aby zdarzenie zostało wysłane
    } else {
      console.warn('gtag nie jest zdefiniowany!');
      // Natychmiastowe przejście, jeśli gtag nie działa
      window.location.href = bannerLink;
    }
  }
</script>