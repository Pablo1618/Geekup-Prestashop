<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/admin2137/themes/default/template/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc09ea428_35135943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '784492dd471b72b178042a44e502cf0c4dcdd557' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/header.tpl',
      1 => 1727103393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:search_form.tpl' => 1,
    'file:nav.tpl' => 1,
  ),
),false)) {
function content_67211fc09ea428_35135943 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--[if lt IE 7]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js ie9"> <![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
app_icon.png" />

  <meta name="robots" content="NOFOLLOW, NOINDEX">
  <title><?php if ($_smarty_tpl->tpl_vars['meta_title']->value != '') {
echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
 • <?php }
echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</title>
  <?php if (!(isset($_smarty_tpl->tpl_vars['display_header_javascript']->value)) || $_smarty_tpl->tpl_vars['display_header_javascript']->value) {?>
  <?php echo '<script'; ?>
 type="text/javascript">
    var help_class_name = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['controller_name']->value,'\'' ));?>
';
    var iso_user = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['iso_user']->value,'\'' ));?>
';
    var lang_is_rtl = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang_is_rtl']->value ));?>
';
    var full_language_code = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['full_language_code']->value,'\'' ));?>
';
    var full_cldr_language_code = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['full_cldr_language_code']->value,'\'' ));?>
';
    var country_iso_code = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['country_iso_code']->value,'\'' ));?>
';
    var _PS_VERSION_ = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( (defined('_PS_VERSION_') ? constant('_PS_VERSION_') : null),'\'' ));?>
';
    var roundMode = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['round_mode']->value ));?>
;
<?php if ((isset($_smarty_tpl->tpl_vars['shop_context']->value))) {?>
  <?php if ($_smarty_tpl->tpl_vars['shop_context']->value == Shop::CONTEXT_ALL) {?>
    var youEditFieldFor = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for all your shops.','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) ) ));?>
';
  <?php } elseif ($_smarty_tpl->tpl_vars['shop_context']->value == Shop::CONTEXT_GROUP) {?>
    var youEditFieldFor = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for all shops in this shop group:','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) ) ));?>
 <b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['shop_name']->value,'\'' ));?>
</b>';
  <?php } else { ?>
    var youEditFieldFor = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for this shop:','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) ) ));?>
 <b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addcslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['shop_name']->value,'\'' ));?>
</b>';
  <?php }
} else { ?>
    var youEditFieldFor = '';
<?php }?>
		var new_order_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new order has been placed on your store.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
';
		var order_number_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order number:','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
 ';
		var total_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','js'=>1,'d'=>'Admin.Global'),$_smarty_tpl ) ) ));?>
 ';
		var from_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From:','js'=>1,'d'=>'Admin.Global'),$_smarty_tpl ) ) ));?>
 ';
		var see_order_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View this order','js'=>1,'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) ) ));?>
';
		var new_customer_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new customer registered on your store.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
';
        var customer_name_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'registered','js'=>1,'d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
 ';
		var new_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new message was posted on your store.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
';
		var see_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read this message','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
';
		var token = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value ));?>
';
		var token_admin_orders = tokenAdminOrders = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminOrders'),$_smarty_tpl ) );?>
';
		var token_admin_customers = tokenAdminCustomers = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminCustomers'),$_smarty_tpl ) );?>
';
		var token_admin_customer_threads = tokenAdminCustomerThreads = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminCustomerThreads'),$_smarty_tpl ) );?>
';
		var currentIndex = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'javascript','UTF-8' )),'quotes' ));?>
';
		var employee_token = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminEmployees'),$_smarty_tpl ) );?>
';
		var choose_language_translate = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose language:','js'=>1,'d'=>'Admin.Actions'),$_smarty_tpl ) ) ));?>
';
		var default_language = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_language']->value ));?>
';
		var admin_notification_get_link = adminNotificationGetLink = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminCommon") ));?>
';
		var admin_notification_push_link = adminNotificationPushLink ='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminCommon",true,array('route'=>'admin_common_notifications_ack')) ));?>
';
		var tab_modules_list = '<?php if ((isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)) && $_smarty_tpl->tpl_vars['tab_modules_list']->value) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab_modules_list']->value ));
}?>';
		var update_success_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Successful update','js'=>1,'d'=>'Admin.Notifications.Success'),$_smarty_tpl ) ) ));?>
';
		var search_product_msg = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search for a product','js'=>1,'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) ) ));?>
';
	<?php echo '</script'; ?>
>
<?php }
ob_start();
echo __PS_BASE_URI__;
$_prefixVariable1=ob_get_clean();
ob_start();
echo basename(_PS_ADMIN_DIR_);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('admin_path', $_prefixVariable1.$_prefixVariable2."/themes/default/public/");?>

<?php $_smarty_tpl->_assignInScope('preloadFilePath', "../public/preload.tpl");?>

<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['preloadFilePath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('admin_dir'=>$_smarty_tpl->tpl_vars['admin_path']->value), 0, true);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['css_files']->value))) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['css_files']->value, 'media', false, 'css_uri');
$_smarty_tpl->tpl_vars['media']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->value => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->do_else = false;
?>
  <link href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8' ));?>
" rel="stylesheet" type="text/css"/>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
  <?php if (((isset($_smarty_tpl->tpl_vars['js_def']->value)) && count($_smarty_tpl->tpl_vars['js_def']->value) || (isset($_smarty_tpl->tpl_vars['js_files']->value)) && count($_smarty_tpl->tpl_vars['js_files']->value))) {?>
    <?php $_smarty_tpl->_subTemplateRender(((defined('_PS_ALL_THEMES_DIR_') ? constant('_PS_ALL_THEMES_DIR_') : null)).("javascript.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php }?>

  <?php if ((isset($_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value;?>

  <?php }?>
  <?php if ((isset($_smarty_tpl->tpl_vars['brightness']->value))) {?>
  <!--
    // @todo: multishop color
    <style type="text/css">
      div#header_infos, div#header_infos a#header_shopname, div#header_infos a#header_logout, div#header_infos a#header_foaccess {color:<?php echo $_smarty_tpl->tpl_vars['brightness']->value;?>
}
    </style>
  -->
  <?php }?>
</head>

<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
<body class="lang-<?php echo $_smarty_tpl->tpl_vars['iso_user']->value;
if ($_smarty_tpl->tpl_vars['lang_is_rtl']->value) {?> lang-rtl<?php }?> ps_back-office<?php if ($_smarty_tpl->tpl_vars['employee']->value->bo_menu) {?> page-sidebar<?php if ($_smarty_tpl->tpl_vars['collapse_menu']->value) {?> page-sidebar-closed<?php }
} else { ?> page-topbar<?php }?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strtolower' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['controller_name']->value )) ));
if (!empty($_smarty_tpl->tpl_vars['debug_mode']->value)) {?> developer-mode<?php }?>"
      <?php if ((isset($_smarty_tpl->tpl_vars['js_router_metadata']->value['base_url']))) {?>data-base-url="<?php echo $_smarty_tpl->tpl_vars['js_router_metadata']->value['base_url'];?>
"<?php }?>
      <?php if ((isset($_smarty_tpl->tpl_vars['js_router_metadata']->value['token']))) {?>data-token="<?php echo $_smarty_tpl->tpl_vars['js_router_metadata']->value['token'];?>
"<?php }?>>
    <header id="header" class="bootstrap">
    <nav id="header_infos" role="navigation">
      <i class="material-icons js-mobile-menu">menu</i>

            <a id="header_logo" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8' ));?>
" aria-label="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop logo','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
"></a>
      <span id="shop_version"><?php echo $_smarty_tpl->tpl_vars['ps_version']->value;?>
</span>

            <div id="header_quick" class="component">
        <div class="dropdown">
          <button
            id="quick_select"
            class="btn btn-link dropdown-toggle"
            data-toggle="dropdown"
          ><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick Access','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
 <i class="material-icons">arrow_drop_down</i></button>
          <ul class="dropdown-menu">
            <?php if (!empty($_smarty_tpl->tpl_vars['quick_access']->value)) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quick_access']->value, 'quick');
$_smarty_tpl->tpl_vars['quick']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['quick']->value) {
$_smarty_tpl->tpl_vars['quick']->do_else = false;
?>
                <li class="quick-row-link<?php ob_start();
echo $_smarty_tpl->tpl_vars['quick']->value['link'];
$_prefixVariable3 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['link']->value->matchQuickLink($_prefixVariable3)) {
$_smarty_tpl->_assignInScope('matchQuickLink', $_smarty_tpl->tpl_vars['quick']->value['id_quick_access']);?> active<?php }?>">
                  <a <?php if ((isset($_smarty_tpl->tpl_vars['quick']->value['class']))) {?>class="<?php echo $_smarty_tpl->tpl_vars['quick']->value['class'];?>
"<?php }?> href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['quick']->value['link'],'html','UTF-8' ));?>
" <?php if ($_smarty_tpl->tpl_vars['quick']->value['new_window']) {?>target="_blank"<?php }?>>
                      <?php echo $_smarty_tpl->tpl_vars['quick']->value['name'];?>

                  </a>
                </li>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
            <li class="divider"></li>
            <?php if ((isset($_smarty_tpl->tpl_vars['matchQuickLink']->value))) {?>
              <li>
                <a id="quick-remove-link" href="javascript:void(0);" class="ajax-quick-link" data-method="remove"
                  data-quicklink-id="<?php echo $_smarty_tpl->tpl_vars['matchQuickLink']->value;?>
">
                  <i class="material-icons">remove_circle</i>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from QuickAccess','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>

                </a>
              </li>
            <?php } else { ?>
              <li>
                <a id="quick-add-link" href="javascript:void(0);" class="ajax-quick-link" data-method="add">
                  <i class="material-icons">add_circle</i>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add current page to QuickAccess','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>

                </a>
              </li>
            <?php }?>
            <li>
              <a id="quick-manage-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'addslashes' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminQuickAccesses") ));?>
">
                <i class="material-icons">settings</i>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manage quick accesses','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>

              </a>
            </li>
          </ul>
        </div>
      </div>
      <?php $_smarty_tpl->_assignInScope('quick_access_current_link_name', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'explode' ][ 0 ], array( " - ",$_smarty_tpl->tpl_vars['quick_access_current_link_name']->value )));?>
      <?php echo '<script'; ?>
>
        $(function() {
          $('.ajax-quick-link').on('click', function(e){
            e.preventDefault();

            var method = $(this).data('method');

            if(method == 'add')
              var name = prompt('<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please name this shortcut:','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
', '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['quick_access_current_link_name']->value[0],32 ));?>
');

            if(method == 'add' && name || method == 'remove')
            {
              $.ajax({
                type: 'POST',
                headers: { "cache-control": "no-cache" },
                async: false,
                url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminQuickAccesses',true,array(),array('action'=>'GetUrl','rand'=>(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'rand' ][ 0 ], array( 1,200 ))),'ajax'=>1));?>
" + "&method=" + method + ( $(this).data('quicklink-id') ? "&id_quick_access=" + $(this).data('quicklink-id') : ""),
                data: {
                  "url": "<?php echo $_smarty_tpl->tpl_vars['link']->value->getQuickLink(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_SERVER['REQUEST_URI'],'javascript' )));?>
",
                  "name": name,
                  "icon": "<?php echo $_smarty_tpl->tpl_vars['quick_access_current_link_icon']->value;?>
"
                },
                dataType: "json",
                success: function(data) {
                  var quicklink_list ='';
                  $.each(data, function(index,value){
                    if (typeof data[index]['name'] !== 'undefined')
                      quicklink_list += '<li><a href="' + data[index]['link'] + '">' + data[index]['name'] + '</a></li>';
                  });

                  if (typeof data['has_errors'] !== 'undefined' && data['has_errors'])
                    $.each(data, function(index, value)
                      {
                        if (typeof data[index] == 'string')
                          $.growl.error({ title: "", message: data[index]});
                    });
                  else if (quicklink_list)
                  {
                    $('#header_quick ul.dropdown-menu .divider').prevAll().remove();
                    $('#header_quick ul.dropdown-menu').prepend(quicklink_list);
                    $(e.target).remove();
                    showSuccessMessage(update_success_msg);
                  }
                }
              });
            }
          });
        });
      <?php echo '</script'; ?>
>

            <?php $_smarty_tpl->_subTemplateRender("file:search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('show_clear_btn'=>1), 0, false);
?>

      <?php if ((isset($_smarty_tpl->tpl_vars['debug_mode']->value)) && $_smarty_tpl->tpl_vars['debug_mode']->value == true) {?>
      <div class="component hide-mobile-sm">
        <a class="shop-state label-tooltip" id="debug-mode"
           data-toggle="tooltip"
           data-placement="bottom"
           data-html="true"
           title="<p class=&quot;text-left&quot;><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your store is in debug mode.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
</strong></p><p class=&quot;text-left&quot;><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All the PHP errors and messages are displayed. When you no longer need it, [1]turn off[/1] this mode.','html'=>true,'sprintf'=>array('[1]'=>'<strong>','[/1]'=>'</strong>'),'d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
</p>"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPerformance'),'html','UTF-8' ));?>
"
          >
          <i class="material-icons">bug_report</i>
          <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Debug mode','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</span>
        </a>
      </div>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['maintenance_mode']->value)) && $_smarty_tpl->tpl_vars['maintenance_mode']->value == true) {?>
        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "title", null, null);?>
          <p class="text-left text-nowrap">
            <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your store is in maintenance mode.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
</strong>
          </p>
          <p class="text-left">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your visitors and customers cannot access your store while in maintenance mode.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>

          </p>
          <p class="text-left">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To manage the maintenance settings, go to Shop Parameters > General > Maintenance tab.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>

          </p>
          <?php if ((isset($_smarty_tpl->tpl_vars['maintenance_allow_admins']->value)) && $_smarty_tpl->tpl_vars['maintenance_allow_admins']->value) {?>
            <p class="text-left">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Admins can access the store front office without storing their IP.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>

            </p>
          <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <div class="component hide-mobile-sm">
          <a class="shop-state label-tooltip" id="maintenance-mode"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminMaintenance'),'html','UTF-8' ));?>
"
             data-toggle="tooltip"
             data-placement="bottom"
             data-html="true"
             title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'htmlspecialchars' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'title') ));?>
"
          >
            <i class="material-icons"
               style="<?php if ((isset($_smarty_tpl->tpl_vars['maintenance_allow_admins']->value))) {?>color: #72c279;<?php }?>"
            >build</i>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Maintenance mode','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</span>
          </a>
        </div>
      <?php }?>

            <?php ob_start();
echo $_smarty_tpl->tpl_vars['base_url']->value;
$_prefixVariable4 = ob_get_clean();
if ($_prefixVariable4) {?>
        <ul id="header-list" class="header-list">
          <li class="shopname" data-mobile="true" data-from="header-list" data-target="menu">
            <?php if ((isset($_smarty_tpl->tpl_vars['is_multishop']->value)) && $_smarty_tpl->tpl_vars['is_multishop']->value && $_smarty_tpl->tpl_vars['shop_list']->value && ((isset($_smarty_tpl->tpl_vars['multishop_context']->value)) && $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_GROUP || $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_SHOP || $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_ALL)) {?>
              <ul id="header_shop" class="shop-state">
                <li class="dropdown">
                  <i class="material-icons">visibility</i>
                  <span><?php echo $_smarty_tpl->tpl_vars['shop_list']->value;?>
</span>
                </li>
              </ul>
            <?php } else { ?>
              <a id="header_shopname" class="shop-state" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8' ));?>
" target="_blank">
                <i class="material-icons">visibility</i>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View my store','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</span>
              </a>
            <?php }?>
          </li>
        </ul>
      <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value || $_smarty_tpl->tpl_vars['show_new_customers']->value || $_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
        <ul class="header-list component">
          <li id="notification" class="dropdown">
            <a href="javascript:void(0);" class="notification dropdown-toggle notifs">
              <i class="material-icons">notifications_none</i>
              <span id="total_notif_number_wrapper" class="notifs_badge hide">
                <span id="total_notif_value">0</span>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right notifs_dropdown">
              <div class="notifications">
                <ul class="nav nav-tabs" role="tablist">
                  <?php $_smarty_tpl->_assignInScope('active', "active");?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="order" href="#orders-notifications" role="tab" id="orders-tab"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Orders','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
<span id="orders_notif_value" class="notif-counter"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="customer" href="#customers-notifications" role="tab" id="customers-tab"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
<span id="customers_notif_value" class="notif-counter"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="customer_message" href="#messages-notifications" role="tab" id="messages-tab"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl ) ) ));?>
<span id="customer_messages_notif_value" class="notif-counter"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <?php $_smarty_tpl->_assignInScope('active', "active");?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="orders-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new order for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_order_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="customers-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new customer for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_customer_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="messages-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new message for now.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) ) ));?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_customer_message_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                </div>
              </div>
            </div>
          </li>
        </ul>
      <?php }?>

            <ul id="header_employee_box" class="component">
        <li id="employee_infos" class="dropdown">
          <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees',true,array(),array('id_employee'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['employee']->value->id )),'updateemployee'=>1)),'html','UTF-8' ));?>
"
             class="employee_name dropdown-toggle"
             data-toggle="dropdown"
          >
            <i class="material-icons">account_circle</i>
          </a>
          <ul id="employee_links" class="dropdown-menu dropdown-menu-right">
            <li class="employee-wrapper-avatar" data-mobile="true" data-from="employee_links" data-target="menu">
              <span class="employee_avatar">
                <img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee']->value->getImage();?>
" width="60" height="60" />
              </span>
            </li>
            <li class="text-left text-nowrap username" data-mobile="true" data-from="employee_links" data-target="menu"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Welcome back %name%','sprintf'=>array('%name%'=>$_smarty_tpl->tpl_vars['employee']->value->firstname),'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</li>
            <li class="employee-wrapper-profile"><a class="admin-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees',true,array(),array('id_employee'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['employee']->value->id )),'updateemployee'=>1)),'html','UTF-8' ));?>
"><i class="material-icons">edit</i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your profile','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</a></li>
            <li class="divider"></li>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['displayBackOfficeEmployeeMenu']->value, 'menuItem', true);
$_smarty_tpl->tpl_vars['menuItem']->iteration = 0;
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
$_smarty_tpl->tpl_vars['menuItem']->iteration++;
$_smarty_tpl->tpl_vars['menuItem']->last = $_smarty_tpl->tpl_vars['menuItem']->iteration === $_smarty_tpl->tpl_vars['menuItem']->total;
$__foreach_menuItem_33_saved = $_smarty_tpl->tpl_vars['menuItem'];
?>
              <?php $_smarty_tpl->_assignInScope('menuItemProperties', $_smarty_tpl->tpl_vars['menuItem']->value->getProperties());?>
              <li class="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getClass();?>
">
                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['menuItemProperties']->value['link'];?>
" <?php if (!(isset($_smarty_tpl->tpl_vars['menuItemProperties']->value['isExternalLink'])) || true === $_smarty_tpl->tpl_vars['menuItemProperties']->value['isExternalLink']) {?> target="_blank"<?php }?> rel="noopener noreferrer nofollow">
                  <?php if ((isset($_smarty_tpl->tpl_vars['menuItemProperties']->value['icon']))) {?><i class="material-icons"><?php echo $_smarty_tpl->tpl_vars['menuItemProperties']->value['icon'];?>
</i> <?php }
echo $_smarty_tpl->tpl_vars['menuItem']->value->getContent();?>

                </a>
              </li>
              <?php if ($_smarty_tpl->tpl_vars['menuItem']->last) {?>
                <p class="divider"></p>
              <?php }?>
            <?php
$_smarty_tpl->tpl_vars['menuItem'] = $__foreach_menuItem_33_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <li class="signout text-center" data-mobile="true" data-from="employee_links" data-target="menu" data-after="true"><a id="header_logout" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logout_link']->value,'html','UTF-8' ));?>
"><i class="material-icons visible-xs">power_settings_new</i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign out','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) ) ));?>
</a></li>
          </ul>
        </li>
      </ul>

            <span id="ajax_running" class="hidden-xs">
        <i class="icon-refresh icon-spin icon-fw"></i>
      </span>

    <?php if ((isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value))) {
echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;
}?>
    </nav>  </header>
    <?php $_smarty_tpl->_subTemplateRender('file:nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div id="main">
    <div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }
if (!(isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value))) {?> no-header-toolbar<?php }?> <?php if ($_smarty_tpl->tpl_vars['current_tab_level']->value == 3) {?>with-tabs<?php }?>">
      <?php if ((isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value))) {
echo $_smarty_tpl->tpl_vars['page_header_toolbar']->value;
}?>
      <?php if ((isset($_smarty_tpl->tpl_vars['modal_module_list']->value))) {
echo $_smarty_tpl->tpl_vars['modal_module_list']->value;
}?>

<?php if ($_smarty_tpl->tpl_vars['install_dir_exists']->value) {?>
      <div class="alert alert-warning">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For security reasons, you must also delete the /install folder.','d'=>'Admin.Login.Notification'),$_smarty_tpl ) ) ));?>

      </div>
<?php }?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminAfterHeader'),$_smarty_tpl ) );?>



<?php } else { ?>
  <body<?php if ((isset($_smarty_tpl->tpl_vars['lite_display']->value)) && $_smarty_tpl->tpl_vars['lite_display']->value) {?> class="ps_back-office display-modal"<?php }?>>
    <div id="main">
      <div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }?>">
<?php }
}
}
