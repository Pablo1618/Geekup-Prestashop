<?php
/* Smarty version 3.1.48, created on 2024-11-10 16:01:20
  from '/var/www/html/modules/blockreassurance/views/templates/admin/tabs/content/config.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6730cac09de247_10830431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c294521e1600d8aa91a1df445db40464d79df28' => 
    array (
      0 => '/var/www/html/modules/blockreassurance/views/templates/admin/tabs/content/config.tpl',
      1 => 1731083045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./config_elements/reassurance_block.tpl' => 1,
    'file:./config_elements/icon.tpl' => 2,
    'file:./config_elements/language.tpl' => 2,
    'file:./config_elements/title.tpl' => 2,
    'file:./config_elements/description.tpl' => 2,
    'file:./config_elements/redirection.tpl' => 2,
    'file:./config_elements/cms.tpl' => 2,
    'file:./config_elements/url.tpl' => 2,
  ),
),false)) {
function content_6730cac09de247_10830431 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="blockDisplay" class="panel panel-default panel-blockreassurance col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1 inactive">
    <div class="panel-heading">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reassurance Block','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>

    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/reassurance_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form class="form_" method="post" ENCTYPE="multipart/form-data">
      <div class="panel-body-0 panel-body show-rea-block inactive">
                    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/icon.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/language.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                            <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                            <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/description.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/redirection.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/cms.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
    </form>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allblock']->value, 'block', false, 'key');
$_smarty_tpl->tpl_vars['block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->do_else = false;
?>
        <form class="form_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
" method="post" ENCTYPE="multipart/form-data">
            <div class="panel-body-<?php echo $_smarty_tpl->tpl_vars['block']->value['id_psreassurance'];?>
 panel-body show-rea-block inactive">
                                <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/icon.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/language.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                                        <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                        <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/description.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/redirection.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/cms.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:./config_elements/url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>
        </form>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <div class="panel-footer">
        <div class="col-xs-6 text-left">
            <input name="refreshPage" type="submit"
                    class="btn btn-primary refreshPage" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
">
        </div>
        <div class="col-xs-6 text-right">
            <input name="saveContentConfiguration" id="saveContentConfiguration" data-id="" type="submit"
                   class="btn btn-primary" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
">
        </div>
    </div>
</div>
<?php }
}
