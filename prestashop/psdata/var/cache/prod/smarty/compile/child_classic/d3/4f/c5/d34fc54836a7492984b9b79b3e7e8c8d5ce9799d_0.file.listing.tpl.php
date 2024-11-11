<?php
/* Smarty version 3.1.48, created on 2024-11-10 16:01:20
  from '/var/www/html/modules/blockreassurance/views/templates/admin/tabs/content/listing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6730cac09d35c2_90196131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd34fc54836a7492984b9b79b3e7e8c8d5ce9799d' => 
    array (
      0 => '/var/www/html/modules/blockreassurance/views/templates/admin/tabs/content/listing.tpl',
      1 => 1731083045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6730cac09d35c2_90196131 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="reminder_listing" class="panel panel-default panel-blockreassurance col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
    <div class="panel-heading">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Block Content','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

      <span class="psre-add"><i class="material-icons">add_circle</i></span>
    </div>
    <div class="panel-body first-body">
        <div class="clearfix">
            <div class="listing-table col-xs-12">
                <div class="listing-head row">
                    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['position'];?>
</div>
                    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['image'];?>
</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['title'];?>
</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['description'];?>
</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['redirection'];?>
</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs content-header"><?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['actions'];?>
</div>
                </div>
                <div id="list-blockreassurance" class="listing-body col-lg-12 col-xs-12">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allblock']->value, 'block', false, 'key');
$_smarty_tpl->tpl_vars['block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->do_else = false;
?>
                        <div class="listing-general-rol row" data-block="<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
">
                            <div class="listing-row row">
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['position'];?>

                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-8">
                                    <a class="toolbar-button" href="#">
                                        <i class="material-icons">drag_handle</i>
                                    </a>
                                </div>
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['image'];?>

                                </div>                                
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-8">
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['icon'] != 'undefined') {?>
                                        <img class="svg"
                                             src="<?php if ($_smarty_tpl->tpl_vars['block']->value['icon']) {
echo $_smarty_tpl->tpl_vars['block']->value['icon'];
} elseif ($_smarty_tpl->tpl_vars['block']->value['custom_icon']) {
echo $_smarty_tpl->tpl_vars['block']->value['custom_icon'];
}?>"
                                        />
                                    <?php } else { ?>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'none','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

                                    <?php }?>
                                </div>
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['title'];?>

                                </div>                                
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-8">
                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['defaultFormLanguage']->value;
$_prefixVariable1 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['block']->value['title'][$_prefixVariable1];?>

                                </div>
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['description'];?>

                                </div>                                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['defaultFormLanguage']->value;
$_prefixVariable2 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['block']->value['description'][$_prefixVariable2];?>

                                </div>
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['redirection'];?>

                                </div>                                
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-8">
                                    <?php if ($_smarty_tpl->tpl_vars['block']->value['type_link'] == $_smarty_tpl->tpl_vars['LINK_TYPE_NONE']->value) {?>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'None','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['block']->value['type_link'] == $_smarty_tpl->tpl_vars['LINK_TYPE_URL']->value) {?>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Url link','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['block']->value['type_link'] == $_smarty_tpl->tpl_vars['LINK_TYPE_CMS']->value) {?>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CMS Page','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

                                    <?php }?>
                                </div>
                                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                                    <?php echo $_smarty_tpl->tpl_vars['fields_captions']->value['actions'];?>

                                </div>                                
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-8 inline-flex">
                                    <label class="col-lg-12 col-xs-12 status-toggle"
                                           id="reminder_active_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
"
                                           for="reminder_active_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
"
                                           data-cart_psreassurance_id='<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
'>
                                        <section class="switch-input <?php if ($_smarty_tpl->tpl_vars['block']->value['status']) {?>-checked<?php }?>">
                                            <input data-toggle="switch" class="switch-new" data-inverse="true"
                                                   type="checkbox" name="reminder_active_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
"
                                                   checked="">
                                        </section>
                                        <span class="switch_text switch-on" style="<?php if (!$_smarty_tpl->tpl_vars['block']->value['status']) {?>display:none;<?php }?>"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Activated','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
</span>
                                        <span class="switch_text switch-off" style="<?php if ($_smarty_tpl->tpl_vars['block']->value['status']) {?>display:none;<?php }?>"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Deactivated','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
</span>
                                    </label>
                                    <div class="btn-group">
                                        <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <span class="dropdown-item psre-edit" data-id="<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
"><i class="material-icons">mode_edit</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</span>
                                            <span class="dropdown-item psre-delete" data-id="<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
"><i class="material-icons">delete</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div id="_more_info" class="col-lg-12 more_info ajax_return"></div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="msgRecommendation">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'We recommend 3 blocks at maximum.','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

        </div>
    </div>
</div>
<?php }
}
