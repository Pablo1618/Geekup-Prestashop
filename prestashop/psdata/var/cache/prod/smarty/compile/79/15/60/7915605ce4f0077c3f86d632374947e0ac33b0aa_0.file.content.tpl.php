<?php
/* Smarty version 3.1.48, created on 2024-11-09 15:13:09
  from '/var/www/html/admin2137/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f6df5004529_65180284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7915605ce4f0077c3f86d632374947e0ac33b0aa' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/content.tpl',
      1 => 1731083045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672f6df5004529_65180284 (Smarty_Internal_Template $_smarty_tpl) {
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
