<?php
/* Smarty version 3.1.48, created on 2024-11-03 16:51:33
  from '/var/www/html/admin2137/themes/default/template/controllers/import/helpers/view/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67279c05da2937_24192942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bd5548a6def92f766ffee44542b9c1d3daf9be2' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/controllers/import/helpers/view/view.tpl',
      1 => 1702485415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67279c05da2937_24192942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126069789267279c05d97905_27129707', "override_tpl");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/view/view.tpl");
}
/* {block "override_tpl"} */
class Block_126069789267279c05d97905_27129707 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'override_tpl' => 
  array (
    0 => 'Block_126069789267279c05d97905_27129707',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 type="text/javascript">
		var errorEmpty = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please name your data matching configuration in order to save it.','js'=>1),$_smarty_tpl ) );?>
';
		var current = 0;
		function showTable(nb) {
			$('#btn_left').disabled = null;
			$('#btn_right').disabled = null;
			if (nb <= 0) {
				nb = 0;
				$('#btn_left').disabled = 'true';
			}
			if (nb >= <?php echo $_smarty_tpl->tpl_vars['nb_table']->value;?>
 - 1) {
				nb = <?php echo $_smarty_tpl->tpl_vars['nb_table']->value;?>
 - 1;
				$('#btn_right').disabled = 'true';
			}
			$('#table' + current).hide();
			current = nb;
			$('#table' + current).show();
		}
		$(document).ready(function() {
			var btn_save_import = $('span[class~="process-icon-save-import"]').parent();
			var btn_submit_import = $('#import');
			if (btn_save_import.length > 0 && btn_submit_import.length > 0) {
				btn_submit_import.closest('.form-group').hide();
				btn_save_import.find('span').removeClass('process-icon-save-import');
				btn_save_import.find('span').addClass('process-icon-save');
				btn_save_import.click(function(){
					btn_submit_import.before('<input type="hidden" name="' + btn_submit_import.attr("name") + '" value="1" />');
					$('#import_form').submit();
				});
			}
			showTable(current);
		});
	<?php echo '</script'; ?>
>
	<div id="container-customer" class="panel">
		<h3><i class="icon-list-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Match your data'),$_smarty_tpl ) );?>
</h3>
		<div class="alert alert-info">
			<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please match each column of your source file to one of the destination columns.'),$_smarty_tpl ) );?>
</p>
		</div>
		<div class="form-horizontal">
			<div class="form-group" <?php if (!$_smarty_tpl->tpl_vars['import_matchs']->value) {?>style="display:none"<?php }?>>
				<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Load a data matching configuration'),$_smarty_tpl ) );?>
</label>
				<div id="selectDivImportMatchs" class="col-lg-7">
					<select id="valueImportMatchs">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['import_matchs']->value, 'match');
$_smarty_tpl->tpl_vars['match']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['match']->value) {
$_smarty_tpl->tpl_vars['match']->do_else = false;
?>
							<option id="<?php echo $_smarty_tpl->tpl_vars['match']->value['id_import_match'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['match']->value['match'];?>
"><?php echo $_smarty_tpl->tpl_vars['match']->value['name'];?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
				<div class="col-lg-2">
					<a id="loadImportMatchs" href="#" class="btn btn-default"><i class="icon-cogs"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Load'),$_smarty_tpl ) );?>
</a>
					<a id="deleteImportMatchs" href="#" class="btn btn-default"><i class="icon-remove"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</a>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3" for="newImportMatchs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save your data matching configuration'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7">
					<input type="text" name="newImportMatchs" id="newImportMatchs" />
				</div>
				<div class="col-lg-2">
					<a id="saveImportMatchs" class="btn btn-default" href="#"><i class="icon-save"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</a>
				</div>
			</div>
		</div>
		<div id="error_duplicate_type" class="alert alert-warning" style="display:none;">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Two columns cannot have the same type of values'),$_smarty_tpl ) );?>

		</div>
		<div id="required_column" class="alert alert-warning" style="display:none;">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This column must be set:'),$_smarty_tpl ) );?>
 <span id="missing_column">&nbsp;</span>
		</div>
		<form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['current']->value,'html','UTF-8' ));?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" method="post" id="import_form" name="import_form" class="form-horizontal">
			<input type="hidden" name="csv" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['csv'];?>
" />
			<input type="hidden" name="regenerate" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['regenerate'];?>
" />
			<input type="hidden" name="entity" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['entity'];?>
" />
			<input type="hidden" name="iso_lang" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['iso_lang'];?>
" />
			<input type="hidden" name="sendemail" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['sendemail'];?>
" />
			<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['truncate']) {?>
				<input type="hidden" name="truncate" value="1" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['forceIDs']) {?>
				<input type="hidden" name="forceIDs" value="1" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['match_ref']) {?>
				<input type="hidden" name="match_ref" value="1" />
			<?php }?>
			<input type="hidden" name="separator" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['separator'];?>
" />
			<input type="hidden" name="multiple_value_separator" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['multiple_value_separator'];?>
" />
			<div class="form-group">
				<label class="control-label col-lg-3" for="skip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rows to skip'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<input class="fixed-width-sm" type="text" name="skip" id="skip" value="1" />
					<p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Indicate how many of the first rows of your file should be skipped when importing the data. For instance set it to 1 if the first row of your file contains headers.'),$_smarty_tpl ) );?>
</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-12">
					<?php
$__section_nb_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['nb_table']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nb_i_0_start = min(0, $__section_nb_i_0_loop);
$__section_nb_i_0_total = min(($__section_nb_i_0_loop - $__section_nb_i_0_start), $__section_nb_i_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_nb_i'] = new Smarty_Variable(array());
if ($__section_nb_i_0_total !== 0) {
for ($__section_nb_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nb_i']->value['index'] = $__section_nb_i_0_start; $__section_nb_i_0_iteration <= $__section_nb_i_0_total; $__section_nb_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nb_i']->value['index']++){
?>
						<?php $_smarty_tpl->_assignInScope('i', (isset($_smarty_tpl->tpl_vars['__smarty_section_nb_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nb_i']->value['index'] : null));?>
						<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['i']->value];?>

					<?php
}
}
?>
					<button id="btn_left" type="button" class="btn btn-default pull-left" onclick="showTable(current - 1);">
						<i class="icon-chevron-sign-left"></i>
					</button>
					<button id="btn_right" type="button" class="btn btn-default pull-right" onclick="showTable(current + 1);">
						<i class="icon-chevron-sign-right"></i>
					</button>
				</div>
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-default" onclick="window.history.back();">
					<i class="process-icon-cancel text-danger"></i>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

				</button>
				<button id="import" name="import" type="submit" onclick="return (validateImportation(new Array(<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
)));"  class="btn btn-default pull-right">
					<i class="process-icon-ok text-success"></i>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Import','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

				</button>
			</div>
		</form>
	</div>
<?php
}
}
/* {/block "override_tpl"} */
}
