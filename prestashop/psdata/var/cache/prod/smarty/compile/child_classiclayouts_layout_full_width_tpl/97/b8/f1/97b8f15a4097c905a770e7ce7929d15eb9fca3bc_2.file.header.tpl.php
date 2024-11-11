<?php
/* Smarty version 3.1.48, created on 2024-11-11 12:45:39
  from '/var/www/html/themes/child_classic/templates/_partials/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6731ee6309d485_60625944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97b8f15a4097c905a770e7ce7929d15eb9fca3bc' => 
    array (
      0 => '/var/www/html/themes/child_classic/templates/_partials/header.tpl',
      1 => 1731324204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6731ee6309d485_60625944 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1465668676731ee63093183_50837395', 'header_banner');
?>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15293962746731ee63094e68_31319134', 'header_nav');
?>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17206175146731ee630971b8_43748808', 'header_top');
?>

</contact@prestashop.com>
<?php }
/* {block 'header_banner'} */
class Block_1465668676731ee63093183_50837395 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_banner' => 
  array (
    0 => 'Block_1465668676731ee63093183_50837395',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-banner"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBanner'),$_smarty_tpl ) );?>
</div>
  <?php
}
}
/* {/block 'header_banner'} */
/* {block 'header_nav'} */
class Block_15293962746731ee63094e68_31319134 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_nav' => 
  array (
    0 => 'Block_15293962746731ee63094e68_31319134',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <nav class="header-nav">
    <div id="MX_hotinfo" class="maxsote_hotinfo" data-name="maxsote_hotinfo">
      <div id="MX_phrases" class="k_phrases">
        <a
          class="k_phrase hotinfo_phrase_2"
          href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink(6), ENT_QUOTES, 'UTF-8');?>
"
          >DARMOWA DOSTAWA od 79 zł z kodem FREE</a
        >
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="yellow-line"></div>
              </div>
    </div>
  </nav>
  <?php
}
}
/* {/block 'header_nav'} */
/* {block 'header_top'} */
class Block_17206175146731ee630971b8_43748808 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_17206175146731ee630971b8_43748808',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-2 hidden-sm-down" id="_desktop_logo">
          <?php if ($_smarty_tpl->tpl_vars['shop']->value['logo_details']) {?> <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {?>
          <h1><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'renderLogo', array(), true);?>
</h1>
          <?php } else { ?> <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'renderLogo', array(), true);?>
 <?php }?> <?php }?>
        </div>
        <div class="header-top-right col-md-10 col-sm-12 position-static">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>

        </div>
      </div>
      <div
        id="mobile_top_menu_wrapper"
        class="row hidden-md-up"
        style="display: none"
      >
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
        <div class="js-top-menu-bottom">
          <div id="_mobile_currency_selector"></div>
          <div id="_mobile_language_selector"></div>
          <div id="_mobile_contact_link"></div>
        </div>
      </div>
    </div>
    <div class="gray-line-vertical"></div>
    <div class="gray-line-horizontal"></div>
    <div class="container">
      <div class="row">
        <div class="header-top-right col-md-10 col-sm-12 position-static">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav1'),$_smarty_tpl ) );?>

        </div>
      </div>
      <div
        id="mobile_top_menu_wrapper"
        class="row hidden-md-up"
        style="display: none"
      >
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
        <div class="js-top-menu-bottom">
          <div id="_mobile_currency_selector"></div>
          <div id="_mobile_language_selector"></div>
          <div id="_mobile_contact_link"></div>
        </div>
      </div>
    </div>
  </div>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNavFullWidth'),$_smarty_tpl ) );?>
 <?php
}
}
/* {/block 'header_top'} */
}
