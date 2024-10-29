<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/admin2137/themes/default/template/controllers/dashboard/helpers/view/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc098a256_64805881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '741f14885a0d77424df7852722536c3d1f767c79' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/controllers/dashboard/helpers/view/view.tpl',
      1 => 1727103393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67211fc098a256_64805881 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	var dashboard_ajax_url = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDashboard');?>
';
	var adminstats_ajax_url = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats');?>
';
	var no_results_translation = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No result','js'=>1),$_smarty_tpl ) );?>
';
	var read_more = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read more','js'=>1),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>

<div id="dashboard">
	<div class="row">
		<div class="col-lg-12">
      <?php if ($_smarty_tpl->tpl_vars['warning']->value) {?>
        <div class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</div>
      <?php }?>
			<div id="calendar" class="panel">
				<form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value ));?>
" method="post" id="calendar_form" name="calendar_form" class="form-inline">
					<div class="btn-group">
						<button type="button" name="submitDateDay" class="btn btn-default submitDateDay<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'day') {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Day','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</button>
						<button type="button" name="submitDateMonth" class="btn btn-default submitDateMonth<?php if ((!(isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) || !$_smarty_tpl->tpl_vars['preselect_date_range']->value) || ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'month')) {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Month','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</button>
						<button type="button" name="submitDateYear" class="btn btn-default submitDateYear<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'year') {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Year','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</button>
						<button type="button" name="submitDateDayPrev" class="btn btn-default submitDateDayPrev<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'prev-day') {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Day','d'=>'Admin.Global'),$_smarty_tpl ) );?>
-1
						</button>
						<button type="button" name="submitDateMonthPrev" class="btn btn-default submitDateMonthPrev<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'prev-month') {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Month','d'=>'Admin.Global'),$_smarty_tpl ) );?>
-1
						</button>
						<button type="button" name="submitDateYearPrev" class="btn btn-default submitDateYearPrev<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) && $_smarty_tpl->tpl_vars['preselect_date_range']->value == 'prev-year') {?> active<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Year','d'=>'Admin.Global'),$_smarty_tpl ) );?>
-1
						</button>
					</div>
					<input type="hidden" name="datepickerFrom" id="datepickerFrom" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_from']->value ));?>
" class="form-control">
					<input type="hidden" name="datepickerTo" id="datepickerTo" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_to']->value ));?>
" class="form-control">
					<input type="hidden" name="preselectDateRange" id="preselectDateRange" value="<?php if ((isset($_smarty_tpl->tpl_vars['preselect_date_range']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['preselect_date_range']->value,'html' ));
}?>" class="form-control">
					<div class="form-group pull-right">
						<button id="datepickerExpand" class="btn btn-default" type="button">
							<i class="icon-calendar-empty"></i>
							<span class="hidden-xs">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','d'=>'Admin.Global'),$_smarty_tpl ) );?>

								<strong class="text-info" id="datepicker-from-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_from']->value ));?>
</strong>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','d'=>'Admin.Global'),$_smarty_tpl ) );?>

								<strong class="text-info" id="datepicker-to-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_to']->value ));?>
</strong>
								<strong class="text-info" id="datepicker-diff-info"></strong>
							</span>
							<i class="icon-caret-down"></i>
						</button>
					</div>
					<?php echo $_smarty_tpl->tpl_vars['calendar']->value;?>

				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-3" id="hookDashboardZoneOne">
			<?php echo $_smarty_tpl->tpl_vars['hookDashboardZoneOne']->value;?>

		</div>
		<div class="col-md-8 col-lg-<?php if ($_smarty_tpl->tpl_vars['hookDashboardZoneThree']->value) {?>7<?php } else { ?>9<?php }?>" id="hookDashboardZoneTwo">
			<?php echo $_smarty_tpl->tpl_vars['hookDashboardZoneTwo']->value;?>

		</div>
    <?php if ($_smarty_tpl->tpl_vars['hookDashboardZoneThree']->value) {?>
      <div class="col-md-12 col-lg-2" id="hookDashboardZoneThree">
          <?php echo $_smarty_tpl->tpl_vars['hookDashboardZoneThree']->value;?>

      </div>
    <?php }?>
	</div>
</div>
<?php }
}
