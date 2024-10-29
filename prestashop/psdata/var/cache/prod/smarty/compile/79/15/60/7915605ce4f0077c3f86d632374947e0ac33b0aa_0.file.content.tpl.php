<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/admin2137/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc0991aa4_64683048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7915605ce4f0077c3f86d632374947e0ac33b0aa' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/content.tpl',
      1 => 1727103393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67211fc0991aa4_64683048 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>
<div id="content-message-box"></div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
