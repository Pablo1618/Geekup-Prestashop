<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/admin2137/themes/default/template/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc08d8a90_70904624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a82993eb8fd79aa7db47b06e4ecbc86711aa7c76' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/helpers/form/form.tpl',
      1 => 1727103393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helpers/form/form_group.tpl' => 1,
  ),
),false)) {
function content_67211fc08d8a90_70904624 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ((isset($_smarty_tpl->tpl_vars['fields']->value['title']))) {?><h3><?php echo $_smarty_tpl->tpl_vars['fields']->value['title'];?>
</h3><?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['tabs']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['tabs']->value)) {
echo '<script'; ?>
 type="text/javascript">
	var helper_tabs = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['tabs']->value ));?>
;
	var unique_field_id = '';
<?php echo '</script'; ?>
>
<?php }
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105825314167211fc07e4ad8_78328553', "defaultForm");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_65055109167211fc08d0769_44292833', "after");
?>


<?php if ((isset($_smarty_tpl->tpl_vars['tinymce']->value)) && $_smarty_tpl->tpl_vars['tinymce']->value) {
echo '<script'; ?>
 type="text/javascript">
	var iso = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['iso']->value ));?>
';
	var pathCSS = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( (defined('_THEME_CSS_DIR_') ? constant('_THEME_CSS_DIR_') : null) ));?>
';
	var ad = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['ad']->value ));?>
';

	$(document).ready(function(){
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150683872567211fc08d1e12_01187939', "autoload_tinyMCE");
?>

	});
<?php echo '</script'; ?>
>
<?php }
if ((isset($_smarty_tpl->tpl_vars['color']->value)) && $_smarty_tpl->tpl_vars['color']->value) {
echo '<script'; ?>
 type="text/javascript">
	$.fn.mColorPicker.defaults.imageFolder = baseDir + 'img/admin/';
<?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['firstCall']->value) {?>
	<?php echo '<script'; ?>
 type="text/javascript">
		var module_dir = '<?php echo (defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null);?>
';
		var id_language = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['defaultFormLanguage']->value ));?>
;
		var languages = new Array();
		// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
		// precedence conflicts with other document.ready() blocks
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language', false, 'k');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
			languages[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
] = {
				id_lang: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'],'javascript' ));?>
,
				iso_code: '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'javascript' ));?>
',
				name: '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['name'],'javascript' ));?>
',
				is_default: '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['is_default'],'javascript' ));?>
'
			};
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		// we need allowEmployeeFormLang var in ajax request
		allowEmployeeFormLang = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['allowEmployeeFormLang']->value ));?>
;
		displayFlags(languages, id_language, allowEmployeeFormLang);

		$(document).ready(function() {

			$(".show_checkbox").click(function () {
				$(this).addClass('hidden')
				$(this).siblings('.checkbox').removeClass('hidden');
				$(this).siblings('.hide_checkbox').removeClass('hidden');
				return false;
			});
			$(".hide_checkbox").click(function () {
				$(this).addClass('hidden')
				$(this).siblings('.checkbox').addClass('hidden');
				$(this).siblings('.show_checkbox').removeClass('hidden');
				return false;
			});

			<?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value['id_state']))) {?>
				if ($('#id_country') && $('#id_state'))
				{
					ajaxStates(<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['id_state'];?>
);
					$('#id_country').change(function() {
						ajaxStates();
					});
				}
			<?php }?>

			dniRequired();
			$('#id_country').change(dniRequired);

			if ($(".datepicker").length > 0)
				$(".datepicker").datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd'
				});

			if ($(".datetimepicker").length > 0)
			$('.datetimepicker').datetimepicker({
				prevText: '',
				nextText: '',
				dateFormat: 'yy-mm-dd',
				// Define a custom regional settings in order to use PrestaShop translation tools
				currentText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Now','js'=>1),$_smarty_tpl ) );?>
',
				closeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Done','js'=>1),$_smarty_tpl ) );?>
',
				ampm: false,
				amNames: ['AM', 'A'],
				pmNames: ['PM', 'P'],
				timeFormat: 'hh:mm:ss tt',
				timeSuffix: '',
				timeOnlyTitle: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose Time','js'=>1),$_smarty_tpl ) );?>
',
				timeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Time','js'=>1),$_smarty_tpl ) );?>
',
				hourText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hour','js'=>1),$_smarty_tpl ) );?>
',
				minuteText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Minute','js'=>1),$_smarty_tpl ) );?>
',
			});
			<?php if ((isset($_smarty_tpl->tpl_vars['use_textarea_autosize']->value))) {?>
			$(".textarea-autosize").autosize();
			<?php }?>
		});
		state_token = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminStates'),$_smarty_tpl ) );?>
';
		address_token = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminAddresses'),$_smarty_tpl ) );?>
';
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16666215167211fc08d80b0_52003907', "script");
?>

	<?php echo '</script'; ?>
>
<?php }
}
/* {block "legend"} */
class Block_60654246867211fc07f95c4_58438587 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="panel-heading">
							<?php if ((isset($_smarty_tpl->tpl_vars['field']->value['image'])) && (isset($_smarty_tpl->tpl_vars['field']->value['title']))) {?><img src="<?php echo $_smarty_tpl->tpl_vars['field']->value['image'];?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['title'],'html','UTF-8' ));?>
" /><?php }?>
							<?php if ((isset($_smarty_tpl->tpl_vars['field']->value['icon']))) {?><i class="<?php echo $_smarty_tpl->tpl_vars['field']->value['icon'];?>
"></i><?php }?>
							<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

						</div>
					<?php
}
}
/* {/block "legend"} */
/* {block "label"} */
class Block_185880346567211fc0804fb7_59079902 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?>
									<label class="control-label col-lg-4<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required'] && $_smarty_tpl->tpl_vars['input']->value['type'] != 'radio') {?> required<?php }?>">
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
										<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['hint'])) {?>
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['hint'], 'hint');
$_smarty_tpl->tpl_vars['hint']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hint']->value) {
$_smarty_tpl->tpl_vars['hint']->do_else = false;
?>
														<?php if (is_array($_smarty_tpl->tpl_vars['hint']->value)) {?>
															<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value['text'],'html','UTF-8' ));?>

														<?php } else { ?>
															<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value,'html','UTF-8' ));?>

														<?php }?>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php } else { ?>
													<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['hint'],'html','UTF-8' ));?>

												<?php }?>">
										<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['input']->value['label'];?>

										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
										</span>
										<?php }?>
									</label>
								<?php }?>
							<?php
}
}
/* {/block "label"} */
/* {block "input"} */
class Block_77860824167211fc080bae0_71263046 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

								<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'text' || $_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['lang'])) && $_smarty_tpl->tpl_vars['input']->value['lang']) {?>
									<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
									<div class="form-group">
									<?php }?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                    <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']]))) {?>
                      <?php $_smarty_tpl->_assignInScope('value_text', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']]);?>
                    <?php } else { ?>
                      <?php $_smarty_tpl->_assignInScope('value_text', '');?>
                    <?php }?>
										<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
										<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
											<div class="col-lg-10">
										<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?>
													
														<?php echo '<script'; ?>
 type="text/javascript">
															$().ready(function () {
																var input_id = '<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>';
																$('#'+input_id).tagify({delimiters: [13,44], addTagPrompt: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add tag','js'=>1),$_smarty_tpl ) );?>
'});
																$('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form').submit( function() {
																	$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
																});
															});
														<?php echo '</script'; ?>
>
													
												<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) || (isset($_smarty_tpl->tpl_vars['input']->value['prefix'])) || (isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
												<div class="input-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>">
												<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
												<span id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter" class="input-group-addon">
													<span class="text-count-down"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
</span>
												</span>
												<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['prefix']))) {?>
													<span class="input-group-addon">
													  <?php echo $_smarty_tpl->tpl_vars['input']->value['prefix'];?>

													</span>
													<?php }?>
												<input type="text"
													id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>"
													name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"
													class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?> tagify<?php }?>"
													value="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['string_format'])) && $_smarty_tpl->tpl_vars['input']->value['string_format']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value),'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_text']->value,'html','UTF-8' ));
}?>"
													onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();"
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?> size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxlength'] ));?>
"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['readonly'])) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])) && !$_smarty_tpl->tpl_vars['input']->value['autocomplete']) {?> autocomplete="off"<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required']) {?> required="required" <?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['placeholder'])) && $_smarty_tpl->tpl_vars['input']->value['placeholder']) {?> placeholder="<?php echo $_smarty_tpl->tpl_vars['input']->value['placeholder'];?>
"<?php }?> />
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
													<span class="input-group-addon">
													  <?php echo $_smarty_tpl->tpl_vars['input']->value['suffix'];?>

													</span>
													<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) || (isset($_smarty_tpl->tpl_vars['input']->value['prefix'])) || (isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
												</div>
												<?php }?>
										<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
											</div>
											<div class="col-lg-2">
												<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
													<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

													<i class="icon-caret-down"></i>
												</button>
												<ul class="dropdown-menu">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
													<li><a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a></li>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												</ul>
											</div>
										</div>
										<?php }?>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
									<?php echo '<script'; ?>
 type="text/javascript">
									$(document).ready(function(){
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
										countDown($("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>"), $("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter"));
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									});
									<?php echo '</script'; ?>
>
									<?php }?>
									<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
									</div>
									<?php }?>
									<?php } else { ?>
										<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?>
											
											<?php echo '<script'; ?>
 type="text/javascript">
												$().ready(function () {
													var input_id = '<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>';
													$('#'+input_id).tagify({delimiters: [13,44], addTagPrompt: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add tag'),$_smarty_tpl ) );?>
'});
													$('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form').submit( function() {
														$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
													});
												});
											<?php echo '</script'; ?>
>
											
										<?php }?>
										<?php $_smarty_tpl->_assignInScope('value_text', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]);?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) || (isset($_smarty_tpl->tpl_vars['input']->value['prefix'])) || (isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
										<div class="input-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>">
										<?php }?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
										<span id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter" class="input-group-addon"><span class="text-count-down"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
</span></span>
										<?php }?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['prefix']))) {?>
										<span class="input-group-addon">
										  <?php echo $_smarty_tpl->tpl_vars['input']->value['prefix'];?>

										</span>
										<?php }?>
										<input type="text"
											name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
											id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
											value="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['string_format'])) && $_smarty_tpl->tpl_vars['input']->value['string_format']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],(($tmp = $_smarty_tpl->tpl_vars['value_text']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp)),'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['value_text']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp),'html','UTF-8' ));
}?>"
											class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?> tagify<?php }?>"
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?> size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxlength'] ));?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['readonly'])) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])) && !$_smarty_tpl->tpl_vars['input']->value['autocomplete']) {?> autocomplete="off"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required']) {?> required="required" <?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['placeholder'])) && $_smarty_tpl->tpl_vars['input']->value['placeholder']) {?> placeholder="<?php echo $_smarty_tpl->tpl_vars['input']->value['placeholder'];?>
"<?php }?>
											/>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
										<span class="input-group-addon">
										  <?php echo $_smarty_tpl->tpl_vars['input']->value['suffix'];?>

										</span>
										<?php }?>

										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) || (isset($_smarty_tpl->tpl_vars['input']->value['prefix'])) || (isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {?>
										</div>
										<?php }?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
										<?php echo '<script'; ?>
 type="text/javascript">
										$(document).ready(function(){
											countDown($("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"), $("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter"));
										});
										<?php echo '</script'; ?>
>
										<?php }?>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'textbutton') {?>
									<?php $_smarty_tpl->_assignInScope('value_text', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]);?>
									<div class="row">
										<div class="col-lg-9">
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar']))) {?>
										<div class="input-group">
											<span id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter" class="input-group-addon">
												<span class="text-count-down"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
</span>
											</span>
										<?php }?>
										<input type="text"
											name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
											id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
											value="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['string_format'])) && $_smarty_tpl->tpl_vars['input']->value['string_format']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value),'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_text']->value,'html','UTF-8' ));
}?>"
											class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'tags') {?> tagify<?php }?>"
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?> size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxlength'] ));?>
"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['readonly'])) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])) && !$_smarty_tpl->tpl_vars['input']->value['autocomplete']) {?> autocomplete="off"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['placeholder'])) && $_smarty_tpl->tpl_vars['input']->value['placeholder']) {?> placeholder="<?php echo $_smarty_tpl->tpl_vars['input']->value['placeholder'];?>
"<?php }?>
											/>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['suffix']))) {
echo $_smarty_tpl->tpl_vars['input']->value['suffix'];
}?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
										</div>
										<?php }?>
										</div>
										<div class="col-lg-2">
											<button type="button" class="btn btn-default<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['button']['attributes']['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['button']['attributes']['class'];
}
if ((isset($_smarty_tpl->tpl_vars['input']->value['button']['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['button']['class'];
}?>"
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['button']['attributes'], 'value', false, 'name');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
													<?php if (mb_strtolower((string) $_smarty_tpl->tpl_vars['name']->value, 'UTF-8') != 'class') {?>
													 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value,'html','UTF-8' ));?>
"
													<?php }?>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> >
												<?php echo $_smarty_tpl->tpl_vars['input']->value['button']['label'];?>

											</button>
										</div>
									</div>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
									<?php echo '<script'; ?>
 type="text/javascript">
										$(document).ready(function() {
											countDown($("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"), $("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter"));
										});
									<?php echo '</script'; ?>
>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'swap') {?>
									<div class="form-group swap-container">
										<div class="col-lg-9">
											<div class="form-control-static row">
												<div class="col-xs-6">
													<select <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?>size="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['size'],'html','utf-8' ));?>
"<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['onchange']))) {?> onchange="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['onchange'],'html','utf-8' ));?>
"<?php }?> class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['class'],'html','utf-8' ));
}?> availableSwap" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','utf-8' ));?>
_available[]" multiple="multiple">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options']['query'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
														<?php if (is_object($_smarty_tpl->tpl_vars['option']->value)) {?>
															<?php if (!in_array($_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']},$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) {?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']};?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['name']};?>
</option>
															<?php }?>
														<?php } elseif ($_smarty_tpl->tpl_vars['option']->value == "-") {?>
															<option value="">-</option>
														<?php } else { ?>
															<?php if (!in_array($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']],$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) {?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']];?>
</option>
															<?php }?>
														<?php }?>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</select>
													<a href="#" class="btn btn-default btn-block addSwap"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
 <i class="icon-arrow-right"></i></a>
												</div>
												<div class="col-xs-6">
													<select <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?>size="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['size'],'html','utf-8' ));?>
"<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['onchange']))) {?> onchange="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['onchange'],'html','utf-8' ));?>
"<?php }?> class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['class'],'html','utf-8' ));
}?> selectedSwap" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','utf-8' ));?>
_selected[]" multiple="multiple">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options']['query'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
														<?php if (is_object($_smarty_tpl->tpl_vars['option']->value)) {?>
															<?php if (in_array($_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']},$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) {?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']};?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['name']};?>
</option>
															<?php }?>
														<?php } elseif ($_smarty_tpl->tpl_vars['option']->value == "-") {?>
															<option value="">-</option>
														<?php } else { ?>
															<?php if (in_array($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']],$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) {?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']];?>
</option>
															<?php }?>
														<?php }?>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</select>
													<a href="#" class="btn btn-default btn-block removeSwap"><i class="icon-arrow-left"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove'),$_smarty_tpl ) );?>
</a>
												</div>
											</div>
										</div>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'select') {?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['options']['query'])) && !$_smarty_tpl->tpl_vars['input']->value['options']['query'] && (isset($_smarty_tpl->tpl_vars['input']->value['empty_message']))) {?>
										<?php echo $_smarty_tpl->tpl_vars['input']->value['empty_message'];?>

										<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['input']) ? $_smarty_tpl->tpl_vars['input']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['required'] = false;
$_smarty_tpl->_assignInScope('input', $_tmp_array);?>
										<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['input']) ? $_smarty_tpl->tpl_vars['input']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['desc'] = null;
$_smarty_tpl->_assignInScope('input', $_tmp_array);?>
									<?php } else { ?>
										<select name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','utf-8' ));?>
"
												class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['class'],'html','utf-8' ));
}?> fixed-width-xl"
												id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['id'],'html','utf-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','utf-8' ));
}?>"
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple'])) && $_smarty_tpl->tpl_vars['input']->value['multiple']) {?> multiple="multiple"<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?> size="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['size'],'html','utf-8' ));?>
"<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['onchange']))) {?> onchange="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['onchange'],'html','utf-8' ));?>
"<?php }?>
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['options']['default']))) {?>
												<option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['options']['default']['value'],'html','utf-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['options']['default']['label'],'html','utf-8' ));?>
</option>
											<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']))) {?>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['query'], 'optiongroup');
$_smarty_tpl->tpl_vars['optiongroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['optiongroup']->value) {
$_smarty_tpl->tpl_vars['optiongroup']->do_else = false;
?>
													<optgroup label="<?php echo $_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['label']];?>
">
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['query']], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']];?>
"
																<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple']))) {?>
																	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'field_value');
$_smarty_tpl->tpl_vars['field_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->value) {
$_smarty_tpl->tpl_vars['field_value']->do_else = false;
?>
																		<?php if ($_smarty_tpl->tpl_vars['field_value']->value == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']]) {?>selected="selected"<?php }?>
																	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
																<?php } else { ?>
																	<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']]) {?>selected="selected"<?php }?>
																<?php }?>
															><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['name']];?>
</option>
														<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</optgroup>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php } else { ?>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options']['query'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
													<?php if (is_object($_smarty_tpl->tpl_vars['option']->value)) {?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']};?>
"
															<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple']))) {?>
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'field_value');
$_smarty_tpl->tpl_vars['field_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->value) {
$_smarty_tpl->tpl_vars['field_value']->do_else = false;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value == $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}) {?>
																		selected="selected"
																	<?php }?>
																<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
															<?php } else { ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}) {?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['name']};?>
</option>
													<?php } elseif ($_smarty_tpl->tpl_vars['option']->value == "-") {?>
														<option value="">-</option>
													<?php } else { ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']];?>
"
															<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple']))) {?>
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'field_value');
$_smarty_tpl->tpl_vars['field_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->value) {
$_smarty_tpl->tpl_vars['field_value']->do_else = false;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]) {?>
																		selected="selected"
																	<?php }?>
																<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
															<?php } else { ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]) {?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']];?>
</option>

													<?php }?>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php }?>
										</select>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'radio') {?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
										<div class="radio <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>">
											<label><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['value'],'html','UTF-8' ));?>
"<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['value']->value['value']) {?> checked="checked"<?php }
if (((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) || ((isset($_smarty_tpl->tpl_vars['value']->value['disabled'])) && $_smarty_tpl->tpl_vars['value']->value['disabled'])) {?> disabled="disabled"<?php }?>/><?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
</label>
										</div>
										<?php if ((isset($_smarty_tpl->tpl_vars['value']->value['p'])) && $_smarty_tpl->tpl_vars['value']->value['p']) {?><p class="help-block"><?php echo $_smarty_tpl->tpl_vars['value']->value['p'];?>
</p><?php }?>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'switch') {?>
									<span class="switch prestashop-switch fixed-width-lg">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
										<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"<?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?> id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_on"<?php } else { ?> id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_off"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['value']->value['value'];?>
"<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['value']->value['value']) {?> checked="checked"<?php }
if (((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) || ((isset($_smarty_tpl->tpl_vars['value']->value['disabled'])) && $_smarty_tpl->tpl_vars['value']->value['disabled'])) {?> disabled="disabled"<?php }?>/>
										<label <?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?> for="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_on"<?php } else { ?> for="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_off"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<a class="slide-button btn"></a>
									</span>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'textarea') {?>
									<?php $_smarty_tpl->_assignInScope('use_textarea_autosize', true);?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['lang'])) && $_smarty_tpl->tpl_vars['input']->value['lang']) {?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
											<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
											<div class="form-group translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?> style="display:none;"<?php }?>>
												<div class="col-lg-10">
											<?php }?>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
													<div class="input-group">
														<span id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter" class="input-group-addon">
															<span class="text-count-down"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
</span>
														</span>
													<?php }?>
													<textarea<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['readonly'])) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])) && $_smarty_tpl->tpl_vars['input']->value['autoload_rte']) {?>rte autoload_rte<?php } else { ?>textarea-autosize<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxlength'] ));?>
"<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' ));?>
</textarea>
													<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
													</div>
													<?php }?>
											<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
												</div>
												<div class="col-lg-2">
													<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
														<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
														<li>
															<a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a>
														</li>
														<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</ul>
												</div>
											</div>
											<?php }?>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
											<?php echo '<script'; ?>
 type="text/javascript">
											$(document).ready(function(){
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
												countDown($("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>"), $("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter"));
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											});
											<?php echo '</script'; ?>
>
										<?php }?>
									<?php } else { ?>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
											<span id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter" class="input-group-addon">
												<span class="text-count-down"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
</span>
											</span>
										<?php }?>
										<textarea<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['readonly'])) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>" <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['cols']))) {?>cols="<?php echo $_smarty_tpl->tpl_vars['input']->value['cols'];?>
"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['rows']))) {?>rows="<?php echo $_smarty_tpl->tpl_vars['input']->value['rows'];?>
"<?php }?> class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])) && $_smarty_tpl->tpl_vars['input']->value['autoload_rte']) {?>rte autoload_rte<?php } else { ?>textarea-autosize<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxlength'] ));?>
"<?php }
if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['maxchar'] ));?>
"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] ?? null)===null||$tmp==='' ? '' ?? null : $tmp),'html','UTF-8' ));?>
</textarea>
										<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['maxchar'])) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
											<?php echo '<script'; ?>
 type="text/javascript">
											$(document).ready(function(){
												countDown($("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"), $("#<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter"));
											});
											<?php echo '</script'; ?>
>
										<?php }?>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'checkbox') {?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['expand']))) {?>
										<a class="btn btn-default show_checkbox<?php if (strtolower($_smarty_tpl->tpl_vars['input']->value['expand']['default']) == 'hide') {?> hidden<?php }?>" href="#">
											<i class="icon-<?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['show']['icon'];?>
"></i>
											<?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['show']['text'];?>

											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['expand']['print_total'])) && $_smarty_tpl->tpl_vars['input']->value['expand']['print_total'] > 0) {?>
												<span class="badge"><?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['print_total'];?>
</span>
											<?php }?>
										</a>
										<a class="btn btn-default hide_checkbox<?php if (strtolower($_smarty_tpl->tpl_vars['input']->value['expand']['default']) == 'show') {?> hidden<?php }?>" href="#">
											<i class="icon-<?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['hide']['icon'];?>
"></i>
											<?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['hide']['text'];?>

											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['expand']['print_total'])) && $_smarty_tpl->tpl_vars['input']->value['expand']['print_total'] > 0) {?>
												<span class="badge"><?php echo $_smarty_tpl->tpl_vars['input']->value['expand']['print_total'];?>
</span>
											<?php }?>
										</a>
									<?php }?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values']['query'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
										<?php $_smarty_tpl->_assignInScope('id_checkbox', (($_smarty_tpl->tpl_vars['input']->value['name']).('_')).($_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['id']]));?>
										<div class="checkbox<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['expand'])) && strtolower($_smarty_tpl->tpl_vars['input']->value['expand']['default']) == 'show') {?> hidden<?php }?>">
											<label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
"><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"<?php if ((isset($_smarty_tpl->tpl_vars['value']->value['val']))) {?> value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['val'],'html','UTF-8' ));?>
"<?php }
if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value])) && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]) {?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['name']];?>
</label>
										</div>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'password') {?>
									<div class="input-group fixed-width-lg">
										<span class="input-group-addon">
											<i class="icon-key"></i>
										</span>
										<input type="password"
											id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
											name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
											class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"
											value=""
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])) && !$_smarty_tpl->tpl_vars['input']->value['autocomplete']) {?>autocomplete="off"<?php }?>
											<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required']) {?> required="required" <?php }?> />
									</div>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'birthday') {?>
								<div class="form-group">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options'], 'select', false, 'key');
$_smarty_tpl->tpl_vars['select']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->do_else = false;
?>
									<div class="col-lg-2">
										<select name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="fixed-width-lg<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>">
											<option value="">-</option>
											<?php if ($_smarty_tpl->tpl_vars['key']->value == 'months') {?>
																								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['select']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value == $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl ) );?>
</option>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php } else { ?>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['select']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value == $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php }?>
										</select>
									</div>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'group') {?>
									<?php $_smarty_tpl->_assignInScope('groups', $_smarty_tpl->tpl_vars['input']->value['values']);?>
									<?php $_smarty_tpl->_subTemplateRender('file:helpers/form/form_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'shop') {?>
									<?php echo $_smarty_tpl->tpl_vars['input']->value['html'];?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'categories') {?>
									<?php echo $_smarty_tpl->tpl_vars['categories_tree']->value;?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file') {?>
									<?php echo $_smarty_tpl->tpl_vars['input']->value['file'];?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'categories_select') {?>
									<?php echo $_smarty_tpl->tpl_vars['input']->value['category_tree'];?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'asso_shop' && (isset($_smarty_tpl->tpl_vars['asso_shop']->value)) && $_smarty_tpl->tpl_vars['asso_shop']->value) {?>
									<?php echo $_smarty_tpl->tpl_vars['asso_shop']->value;?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'color') {?>
								<div class="form-group">
									<div class="col-lg-6">
										<div class="input-group">
												<input type="color"
												data-hex="true"
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
												<?php } else { ?> class="color mColorPickerInput"<?php }?>
												name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
												value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']],'html','UTF-8' ));?>
" />
											</div>
									</div>
								</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'date') {?>
									<div class="row">
										<div class="input-group col-lg-4">
											<input
												id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
												type="text"
												data-hex="true"
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
												<?php } else { ?>class="datepicker"<?php }?>
												autocomplete="off"
												name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
												value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']],'html','UTF-8' ));?>
" />
											<span class="input-group-addon">
												<i class="icon-calendar-empty"></i>
											</span>
										</div>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'datetime') {?>
									<div class="row">
										<div class="input-group col-lg-4">
											<input
												id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
												type="text"
												data-hex="true"
												<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?> class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
												<?php } else { ?> class="datetimepicker"<?php }?>
												autocomplete="off"
												name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
												value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']],'html','UTF-8' ));?>
" />
											<span class="input-group-addon">
												<i class="icon-calendar-empty"></i>
											</span>
										</div>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'free') {?>
									<?php echo $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']];?>

								<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'html') {?>
									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['html_content']))) {?>
										<?php echo $_smarty_tpl->tpl_vars['input']->value['html_content'];?>

									<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>

									<?php }?>
								<?php }?>
								<?php
}
}
/* {/block "input"} */
/* {block "description"} */
class Block_98494610467211fc08b10d9_21175373 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

									<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc'])) && !empty($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
										<p class="help-block">
											<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['desc'], 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
													<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)) {?>
														<span id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
													<?php } else { ?>
														<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
<br />
													<?php }?>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php } else { ?>
												<?php echo $_smarty_tpl->tpl_vars['input']->value['desc'];?>

											<?php }?>
										</p>
									<?php }?>
								<?php
}
}
/* {/block "description"} */
/* {block "field"} */
class Block_182710862767211fc080a284_89154536 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="col-lg-<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['col']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['col'] ));
} else { ?>8<?php }
if (!(isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?> col-lg-offset-3<?php }?>">
								<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77860824167211fc080bae0_71263046', "input", $this->tplIndex);
?>
								<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_98494610467211fc08b10d9_21175373', "description", $this->tplIndex);
?>

								</div>
							<?php
}
}
/* {/block "field"} */
/* {block "input_row"} */
class Block_121080718367211fc07fda05_06460730 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="form-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['form_group_class']))) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['form_group_class'];
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'hidden') {?> hide<?php }?>"<?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'id_state') {?> id="contains_states"<?php if (!$_smarty_tpl->tpl_vars['contains_states']->value) {?> style="display:none;"<?php }
}
if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'dni') {?> id="dni_required"<?php if (!$_smarty_tpl->tpl_vars['dni_required']->value) {?> style="display:none;"<?php }
}
if ((isset($_smarty_tpl->tpl_vars['tabs']->value)) && (isset($_smarty_tpl->tpl_vars['input']->value['tab']))) {?> data-tab-id="<?php echo $_smarty_tpl->tpl_vars['input']->value['tab'];?>
"<?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'hidden') {?>
							<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] ?? null)===null||$tmp==='' ? '' ?? null : $tmp),'html','UTF-8' ));?>
" />
						<?php } else { ?>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185880346567211fc0804fb7_59079902', "label", $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_182710862767211fc080a284_89154536', "field", $this->tplIndex);
?>
						<?php }?>
						</div>
						<?php
}
}
/* {/block "input_row"} */
/* {block "other_input"} */
class Block_79552856967211fc08ba129_56649300 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "other_input"} */
/* {block "footer"} */
class Block_16490887567211fc08ba715_15495574 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>

			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_submit_btn', null, null);
echo smarty_function_counter(array('name'=>'form_submit_btn'),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
				<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit'])) || (isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['buttons']))) {?>
					<div class="panel-footer">
						<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit'])) && !empty($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit'])) {?>
						<button type="submit" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['value'] ?? null)===null||$tmp==='' ? '1' ?? null : $tmp);?>
"	id="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['id']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['id'];
} else {
echo $_smarty_tpl->tpl_vars['table']->value;?>
_form_submit_btn<?php }
if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_submit_btn') > 1) {?>_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_submit_btn')-1) ));
}?>" name="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['name']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['name'];
} else {
echo $_smarty_tpl->tpl_vars['submit_action']->value;
}
if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['stay'])) && $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['stay']) {?>AndStay<?php }?>" class="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['class']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['class'];
} else { ?>btn btn-default pull-right<?php }?>">
							<i class="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['icon']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['icon'];
} else { ?>process-icon-save<?php }?>"></i> <?php echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['submit']['title'];?>

						</button>
						<?php }?>
						<?php if ((isset($_smarty_tpl->tpl_vars['show_cancel_button']->value)) && $_smarty_tpl->tpl_vars['show_cancel_button']->value) {?>
						<a class="btn btn-default" <?php if ($_smarty_tpl->tpl_vars['table']->value) {?>id="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form_cancel_btn"<?php }?> onclick="javascript:window.history.back();">
							<i class="process-icon-cancel"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

						</a>
						<?php }?>
						<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']))) {?>
						<button
							type="reset"
							id="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['id']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['id'];
} else {
echo $_smarty_tpl->tpl_vars['table']->value;?>
_form_reset_btn<?php }?>"
							class="<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['class']))) {
echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['class'];
} else { ?>btn btn-default<?php }?>"
							>
							<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['icon']))) {?><i class="<?php echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['icon'];?>
"></i> <?php }?> <?php echo $_smarty_tpl->tpl_vars['fieldset']->value['form']['reset']['title'];?>

						</button>
						<?php }?>
						<?php if ((isset($_smarty_tpl->tpl_vars['fieldset']->value['form']['buttons']))) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fieldset']->value['form']['buttons'], 'btn', false, 'k');
$_smarty_tpl->tpl_vars['btn']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['btn']->value) {
$_smarty_tpl->tpl_vars['btn']->do_else = false;
?>
							<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['href'])) && trim($_smarty_tpl->tpl_vars['btn']->value['href']) != '') {?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['btn']->value['href'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['id']))) {?>id="<?php echo $_smarty_tpl->tpl_vars['btn']->value['id'];?>
"<?php }?> class="btn btn-default<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['btn']->value['class'];
}?>" <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['js'])) && $_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>><?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['icon']))) {?><i class="<?php echo $_smarty_tpl->tpl_vars['btn']->value['icon'];?>
" ></i> <?php }
echo $_smarty_tpl->tpl_vars['btn']->value['title'];?>
</a>
							<?php } else { ?>
								<button type="<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['type']))) {
echo $_smarty_tpl->tpl_vars['btn']->value['type'];
} else { ?>button<?php }?>" <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['id']))) {?>id="<?php echo $_smarty_tpl->tpl_vars['btn']->value['id'];?>
"<?php }?> class="btn btn-default<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['class']))) {?> <?php echo $_smarty_tpl->tpl_vars['btn']->value['class'];
}?>" name="<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['name']))) {
echo $_smarty_tpl->tpl_vars['btn']->value['name'];
} else { ?>submitOptions<?php echo $_smarty_tpl->tpl_vars['table']->value;
}?>"<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['js'])) && $_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>><?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['icon']))) {?><i class="<?php echo $_smarty_tpl->tpl_vars['btn']->value['icon'];?>
" ></i> <?php }
echo $_smarty_tpl->tpl_vars['btn']->value['title'];?>
</button>
							<?php }?>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
				<?php }?>
			<?php
}
}
/* {/block "footer"} */
/* {block "fieldset"} */
class Block_6508178467211fc07f60d2_55946006 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>

		<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'fieldset_name', null, null);
echo smarty_function_counter(array('name'=>'fieldset_name'),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<div class="panel" id="fieldset_<?php echo $_smarty_tpl->tpl_vars['f']->value;
if ((($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count') !== null )) && $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count')) {?>_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count') ));
}
if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'fieldset_name') > 1) {?>_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'fieldset_name')-1) ));
}?>">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fieldset']->value['form'], 'field', false, 'key');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value == 'legend') {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_60654246867211fc07f95c4_58438587', "legend", $this->tplIndex);
?>

				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'description' && $_smarty_tpl->tpl_vars['field']->value) {?>
					<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'warning' && $_smarty_tpl->tpl_vars['field']->value) {?>
					<div class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'success' && $_smarty_tpl->tpl_vars['field']->value) {?>
					<div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'error' && $_smarty_tpl->tpl_vars['field']->value) {?>
					<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'input') {?>
					<div class="form-wrapper">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value, 'input');
$_smarty_tpl->tpl_vars['input']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['input']->value) {
$_smarty_tpl->tpl_vars['input']->do_else = false;
?>
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_121080718367211fc07fda05_06460730', "input_row", $this->tplIndex);
?>

					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminForm','fieldset'=>$_smarty_tpl->tpl_vars['f']->value),$_smarty_tpl ) );?>

					<?php if ((isset($_smarty_tpl->tpl_vars['name_controller']->value))) {?>
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'hookName', 'hookName', null);?>display<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_controller']->value ));?>
Form<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>$_smarty_tpl->tpl_vars['hookName']->value,'fieldset'=>$_smarty_tpl->tpl_vars['f']->value),$_smarty_tpl ) );?>

					<?php } elseif ((isset($_GET['controller']))) {?>
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'hookName', 'hookName', null);?>display<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'htmlentities' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_GET['controller'] )) ));?>
Form<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>$_smarty_tpl->tpl_vars['hookName']->value,'fieldset'=>$_smarty_tpl->tpl_vars['f']->value),$_smarty_tpl ) );?>

					<?php }?>
				</div><!-- /.form-wrapper -->
				<?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'desc') {?>
					<div class="alert alert-info col-lg-offset-3">
						<?php if (is_array($_smarty_tpl->tpl_vars['field']->value)) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value, 'p', false, 'k');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
								<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)) {?>
									<span<?php if ((isset($_smarty_tpl->tpl_vars['p']->value['id']))) {?> id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
								<?php } else { ?>
									<?php echo $_smarty_tpl->tpl_vars['p']->value;?>

									<?php if ((isset($_smarty_tpl->tpl_vars['field']->value[$_smarty_tpl->tpl_vars['k']->value+1]))) {?><br /><?php }?>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['field']->value;?>

						<?php }?>
					</div>
				<?php }?>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_79552856967211fc08ba129_56649300', "other_input", $this->tplIndex);
?>

			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16490887567211fc08ba715_15495574', "footer", $this->tplIndex);
?>

		</div>
		<?php
}
}
/* {/block "fieldset"} */
/* {block "other_fieldsets"} */
class Block_129971599067211fc08cfaa8_04575593 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "other_fieldsets"} */
/* {block "defaultForm"} */
class Block_105825314167211fc07e4ad8_78328553 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'defaultForm' => 
  array (
    0 => 'Block_105825314167211fc07e4ad8_78328553',
  ),
  'fieldset' => 
  array (
    0 => 'Block_6508178467211fc07f60d2_55946006',
  ),
  'legend' => 
  array (
    0 => 'Block_60654246867211fc07f95c4_58438587',
  ),
  'input_row' => 
  array (
    0 => 'Block_121080718367211fc07fda05_06460730',
  ),
  'label' => 
  array (
    0 => 'Block_185880346567211fc0804fb7_59079902',
  ),
  'field' => 
  array (
    0 => 'Block_182710862767211fc080a284_89154536',
  ),
  'input' => 
  array (
    0 => 'Block_77860824167211fc080bae0_71263046',
  ),
  'description' => 
  array (
    0 => 'Block_98494610467211fc08b10d9_21175373',
  ),
  'other_input' => 
  array (
    0 => 'Block_79552856967211fc08ba129_56649300',
  ),
  'footer' => 
  array (
    0 => 'Block_16490887567211fc08ba715_15495574',
  ),
  'other_fieldsets' => 
  array (
    0 => 'Block_129971599067211fc08cfaa8_04575593',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>

<?php if ((isset($_smarty_tpl->tpl_vars['identifier_bk']->value)) && $_smarty_tpl->tpl_vars['identifier_bk']->value == $_smarty_tpl->tpl_vars['identifier']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'identifier_count', null, null);
echo smarty_function_counter(array('name'=>'identifier_count'),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}
$_smarty_tpl->_assignInScope('identifier_bk', $_smarty_tpl->tpl_vars['identifier']->value ,false ,2);
if ((isset($_smarty_tpl->tpl_vars['table_bk']->value)) && $_smarty_tpl->tpl_vars['table_bk']->value == $_smarty_tpl->tpl_vars['table']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'table_count', null, null);
echo smarty_function_counter(array('name'=>'table_count'),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}
$_smarty_tpl->_assignInScope('table_bk', $_smarty_tpl->tpl_vars['table']->value ,false ,8);?>
<form id="<?php if ((isset($_smarty_tpl->tpl_vars['fields']->value['form']['form']['id_form']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value['form']['form']['id_form'],'html','UTF-8' ));
} else {
if ($_smarty_tpl->tpl_vars['table']->value == null) {?>configuration_form<?php } else {
echo $_smarty_tpl->tpl_vars['table']->value;?>
_form<?php }
if ((($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'table_count') !== null )) && $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'table_count')) {?>_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'table_count') ));
}
}?>" class="defaultForm form-horizontal<?php if ((isset($_smarty_tpl->tpl_vars['name_controller']->value)) && $_smarty_tpl->tpl_vars['name_controller']->value) {?> <?php echo $_smarty_tpl->tpl_vars['name_controller']->value;
}?>"<?php if ((isset($_smarty_tpl->tpl_vars['current']->value)) && $_smarty_tpl->tpl_vars['current']->value) {?> action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['current']->value,'html','UTF-8' ));
if ((isset($_smarty_tpl->tpl_vars['token']->value)) && $_smarty_tpl->tpl_vars['token']->value) {?>&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));
}?>"<?php }?> method="post" enctype="multipart/form-data"<?php if ((isset($_smarty_tpl->tpl_vars['style']->value))) {?> style="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
"<?php }?> novalidate>
	<?php if ($_smarty_tpl->tpl_vars['form_id']->value) {?>
		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['identifier']->value;
if ((($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count') !== null )) && $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count')) {?>_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'identifier_count') ));
}?>" value="<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
" />
	<?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['submit_action']->value)) {?>
		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['submit_action']->value;?>
" value="1" />
	<?php }?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'fieldset', false, 'f');
$_smarty_tpl->tpl_vars['fieldset']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f']->value => $_smarty_tpl->tpl_vars['fieldset']->value) {
$_smarty_tpl->tpl_vars['fieldset']->do_else = false;
?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6508178467211fc07f60d2_55946006', "fieldset", $this->tplIndex);
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129971599067211fc08cfaa8_04575593', "other_fieldsets", $this->tplIndex);
?>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</form>
<?php
}
}
/* {/block "defaultForm"} */
/* {block "after"} */
class Block_65055109167211fc08d0769_44292833 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'after' => 
  array (
    0 => 'Block_65055109167211fc08d0769_44292833',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "after"} */
/* {block "autoload_tinyMCE"} */
class Block_150683872567211fc08d1e12_01187939 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'autoload_tinyMCE' => 
  array (
    0 => 'Block_150683872567211fc08d1e12_01187939',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			tinySetup({
				editor_selector :"autoload_rte"
			});
		<?php
}
}
/* {/block "autoload_tinyMCE"} */
/* {block "script"} */
class Block_16666215167211fc08d80b0_52003907 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16666215167211fc08d80b0_52003907',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
