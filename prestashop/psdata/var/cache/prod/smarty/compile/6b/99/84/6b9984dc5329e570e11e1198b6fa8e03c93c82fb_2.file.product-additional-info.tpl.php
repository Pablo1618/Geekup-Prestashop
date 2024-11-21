<?php
/* Smarty version 3.1.48, created on 2024-11-21 19:59:56
  from '/var/www/html/themes/classic/templates/catalog/_partials/product-additional-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_673f832c3829e5_67336296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b9984dc5329e570e11e1198b6fa8e03c93c82fb' => 
    array (
      0 => '/var/www/html/themes/classic/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1731245773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673f832c3829e5_67336296 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-additional-info js-product-additional-info">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

</div>
<?php }
}
