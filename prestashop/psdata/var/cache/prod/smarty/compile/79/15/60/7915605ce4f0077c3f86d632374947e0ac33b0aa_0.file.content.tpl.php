<?php
/* Smarty version 3.1.48, created on 2024-11-11 12:47:39
  from '/var/www/html/admin2137/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6731eedb775659_44018545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7915605ce4f0077c3f86d632374947e0ac33b0aa' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/content.tpl',
      1 => 1731324198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6731eedb775659_44018545 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}