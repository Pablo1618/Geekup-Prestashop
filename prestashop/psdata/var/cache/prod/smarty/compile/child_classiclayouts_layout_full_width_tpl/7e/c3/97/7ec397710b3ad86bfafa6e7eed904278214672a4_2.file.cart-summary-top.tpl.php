<?php
/* Smarty version 3.1.48, created on 2024-11-11 12:46:55
  from '/var/www/html/themes/classic/templates/checkout/_partials/cart-summary-top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6731eeaf782707_24169800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ec397710b3ad86bfafa6e7eed904278214672a4' => 
    array (
      0 => '/var/www/html/themes/classic/templates/checkout/_partials/cart-summary-top.tpl',
      1 => 1731324204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6731eeaf782707_24169800 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="cart-summary-top js-cart-summary-top">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCheckoutSummaryTop'),$_smarty_tpl ) );?>

</div>
<?php }
}