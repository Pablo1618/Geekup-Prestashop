<?php
/* Smarty version 3.1.48, created on 2024-11-11 12:38:49
  from '/var/www/html/admin2137/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6731ecc9333056_10402343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '286ce832f45ec6df08e21609b898f1de5681d7f2' => 
    array (
      0 => '/var/www/html/admin2137/themes/new-theme/template/content.tpl',
      1 => 1731324198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6731ecc9333056_10402343 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}