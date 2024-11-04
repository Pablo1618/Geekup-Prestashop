<?php
/* Smarty version 3.1.48, created on 2024-11-03 16:51:33
  from '/var/www/html/admin2137/themes/default/template/controllers/import/modal_import_progress.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67279c05d126b5_79075077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51193179e5aca1bbc9f6a88c804e5d56c46d217a' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/controllers/import/modal_import_progress.tpl',
      1 => 1702485415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67279c05d126b5_79075077 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-body">
  <div class="alert alert-warning" id="import_details_stop" style="display:none;">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Aborting, please wait...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

  </div>
  <p id="import_details_progressing">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Importing your data...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

  </p>
  <div class="alert alert-success" id="import_details_finished" style="display:none;">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Data imported!",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

    <br/>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Look at your listings to make sure it's all there as you wished.",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

  </div>
  <div id="import_messages_div" style="max-height:250px; overflow:auto;">
    <div class="alert alert-danger" id="import_details_error" style="display:none;">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Errors occurred:",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
<br/><ul></ul>
    </div>
    <div class="alert alert-warning" id="import_details_post_limit" style="display:none;">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Warning, the current import may require a PHP setting update, to allow more data to be transferred. If the current import stops before the end, you should increase your PHP \"post_max_size\" setting to [1]%size%[/1]MB at least, and try again.",'sprintf'=>array('[1]'=>'<span id="import_details_post_limit_value">','%size%'=>'16MB','[/1]'=>'</span>'),'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

    </div>
    <div class="alert alert-warning" id="import_details_warning" style="display:none;">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Some errors were detected. Please check the details:",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
<br/><ul></ul>
    </div>
    <div class="alert alert-info" id="import_details_info" style="display:none;">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"We made the following adjustments:",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
<br/><ul></ul>
    </div>
  </div>

  <div id="import_validate_div" style="margin-top:17px;">
    <div class="pull-right" id="import_validation_details" default-value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Validating data...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
">
      &nbsp;
    </div>
    <div class="progress active progress-striped" style="display: block; width: 100%">
      <div class="progress-bar progress-bar-info" role="progressbar" style="width: 0%" id="validate_progressbar_done">
        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"[1]%percentage%[/1]% validated",'sprintf'=>array('[1]'=>'<span id="validate_progression_done">','%percentage%'=>'0','[/1]'=>'</span>'),'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

        </span>
      </div>
      <div class="progress-bar progress-bar-info" role="progressbar" id="validate_progressbar_next" style="opacity: 0.5 ;width: 0%">
        <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Processing next page...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
</span>
      </div>
    </div>
  </div>

  <div id="import_progress_div" style="display:none;">
    <div class="pull-right" id="import_progression_details" default-value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Importing your data...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
">
      &nbsp;
    </div>
    <div class="progress active progress-striped" style="display: block; width: 100%">
      <div class="progress-bar progress-bar-info" role="progressbar" style="width: 0%" id="import_progressbar_done2">
        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Linking accessories...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
</span>
      </div>
      <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%" id="import_progressbar_done">
        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"[1]%size%[/1]% imported",'sprintf'=>array('[1]'=>'<span id="import_progression_done">','%size%'=>'0','[/1]'=>'</span>'),'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

        </span>
      </div>
      <div class="progress-bar progress-bar-success progress-bar-stripes active" role="progressbar" id="import_progressbar_next" style="opacity: 0.5 ;width: 0%">
        <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Processing next page...",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>
</span>
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <div class="input-group pull-right">
      <button type="button" class="btn btn-primary" tabindex="-1" id="import_continue_button" style="display: none;">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Ignore warnings and continue?",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

      </button>
      &nbsp;
      <button type="button" class="btn btn-default" tabindex="-1" id="import_stop_button">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Abort import",'d'=>"Admin.Advparameters.Notification"),$_smarty_tpl ) );?>

      </button>
      &nbsp;
      <button type="button" class="btn btn-success" data-dismiss="modal" tabindex="-1" id="import_close_button" style="display: none;">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Close",'d'=>"Admin.Actions"),$_smarty_tpl ) );?>

      </button>
    </div>
  </div>
</div>
<?php }
}
