<?php
/* Smarty version 3.1.48, created on 2024-11-22 18:06:50
  from '/var/www/html/admin2137/themes/default/template/controllers/images/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6740ba2aae3968_73717291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aeb8da4fbe41cb57db0824ca4cf96e90c1aee3c6' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/controllers/images/content.tpl',
      1 => 1731775526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6740ba2aae3968_73717291 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-danger">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'By default, all images settings are already installed in your store. Do not delete them, you will need it!','d'=>'Admin.Design.Help'),$_smarty_tpl ) );?>

</div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['display_move']->value)) && $_smarty_tpl->tpl_vars['display_move']->value) {?>
    <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['current']->value,'html','UTF-8' ));?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" method="post" class="form-horizontal">
        <div class="panel">
            <h3>
                <i class="icon-picture"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Move images','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>

            </h3>
            <div class="alert alert-warning">
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can choose to keep your images stored in the previous system. There\'s nothing wrong with that.','d'=>'Admin.Design.Notification'),$_smarty_tpl ) );?>
</p>
                <p><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Move images','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );
$_prefixVariable7 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can also decide to move your images to the new storage system. In this case, click on the "%move_images_label%" button below. Please be patient. This can take several minutes.','d'=>'Admin.Design.Notification','sprintf'=>array('%move_images_label%'=>$_prefixVariable7)),$_smarty_tpl ) );?>
</p>
            </div>
            <div class="alert alert-info">&nbsp;
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'After moving all of your product images, set the "Use the legacy image filesystem" option above to "No" for best performance.','d'=>'Admin.Design.Notification'),$_smarty_tpl ) );?>

            </div>
            <div class="row">
                <div class="col-lg-12 pull-right">
                    <button type="submit" name="submitMoveImages<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" class="btn btn-default pull-right" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning'),$_smarty_tpl ) );?>
');"><i class="process-icon-cogs"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Move images','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>
</button>
                </div>
            </div>
        </div>
    </form>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['display_regenerate']->value))) {?>

	<form class="form-horizontal" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['current']->value,'html','UTF-8' ));?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" method="post">
		<div class="panel">
			<h3>
                <i class="icon-picture"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regenerate thumbnails','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>

            </h3>

			<div class="alert alert-warning">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Be careful! Depending on the options selected, former manually uploaded thumbnails might be erased and replaced by automatically generated thumbnails.','d'=>'Admin.Design.Notification'),$_smarty_tpl ) );?>
<br />
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Also, regenerating thumbnails for all existing images can take several minutes, please be patient.','d'=>'Admin.Design.Notification'),$_smarty_tpl ) );?>

			</div>

			<div class="form-group">
				<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select an image','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<select name="type" onchange="changeFormat(this)">
						<option value="all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type', false, 'k');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
			</div>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type', false, 'k');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
			<div class="form-group second-select format_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" style="display:none;">
				<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select a format','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9 margin-form">
					<select name="format_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
						<option value="all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['formats']->value[$_smarty_tpl->tpl_vars['k']->value], 'format');
$_smarty_tpl->tpl_vars['format']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['format']->value) {
$_smarty_tpl->tpl_vars['format']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['format']->value['id_image_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['format']->value['name'];?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
			</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php echo '<script'; ?>
>
				function changeFormat(elt)
				{
					$('.second-select').hide();
					$('.format_' + $(elt).val()).show();
				}
			<?php echo '</script'; ?>
>

			<div class="form-group">
				<label class="control-label col-lg-3">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Erase previous images','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>

				</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="erase" id="erase_on" value="1">
						<label for="erase_on" class="radioCheck">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</label>
						<input type="radio" name="erase" id="erase_off" value="0" checked="checked">
						<label for="erase_off" class="radioCheck">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</label>
						<a class="slide-button btn"></a>
					</span>
					<p class="help-block">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select "No" only if your server timed out and you need to resume the regeneration.','html'=>1,'d'=>'Admin.Design.Help'),$_smarty_tpl ) );?>

					</p>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="submitRegenerate<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" class="btn btn-default pull-right" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning'),$_smarty_tpl ) );?>
');">
					<i class="process-icon-cogs"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regenerate thumbnails','d'=>'Admin.Design.Feature'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</form>
<?php }
}
}
