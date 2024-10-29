<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/admin2137/themes/default/template/search_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc0a059b2_77370088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f29fd73e1ca2f02b6776380275e78bb7fb0a5f1b' => 
    array (
      0 => '/var/www/html/admin2137/themes/default/template/search_form.tpl',
      1 => 1727103393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67211fc0a059b2_77370088 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="header_search" class="component bo_search_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseAdminUrl']->value;?>
index.php?controller=AdminSearch&amp;token=<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminSearch'),$_smarty_tpl ) );?>
" role="search">
	<div class="form-group">
		<input type="hidden" name="bo_search_type" id="bo_search_type" />
		<div class="input-group">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<i id="search_type_icon" class="material-icons">search</i>
				</button>
				<ul id="header_search_options" class="dropdown-menu">
					<li class="search-all search-option active">
						<a href="#" data-value="0" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'What are you looking for?','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">search</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Everywhere','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a>
					</li>
					<li class="divider"></li>
					<li class="search-book search-option">
						<a href="#" data-value="1" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product name, SKU, reference...','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">store_mall_directory</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Catalog','d'=>'Admin.Navigation.Menu'),$_smarty_tpl ) );?>

						</a>
					</li>
					<li class="search-customers-name search-option">
						<a href="#" data-value="2" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email, name...','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">group</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers by name','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>

						</a>
					</li>
					<li class="search-customers-addresses search-option">
						<a href="#" data-value="6" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'123.45.67.89'),$_smarty_tpl ) );?>
" data-icon="icon-desktop">
							<i class="material-icons">desktop_mac</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers by IP address','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a>
					</li>
					<li class="search-orders search-option">
						<a href="#" data-value="3" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order ID','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">shopping_basket</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Orders','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</a>
					</li>
					<li class="search-invoices search-option">
						<a href="#" data-value="4" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Number','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">book</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoices','d'=>'Admin.Navigation.Menu'),$_smarty_tpl ) );?>

						</a>
					</li>
					<li class="search-carts search-option">
						<a href="#" data-value="5" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart ID','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">shopping_cart</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carts','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</a>
					</li>
					<li class="search-modules search-option">
						<a href="#" data-value="7" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Module name','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
">
							<i class="material-icons">extension</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</a>
					</li>
				</ul>
			</div>
			<?php if ((isset($_smarty_tpl->tpl_vars['show_clear_btn']->value)) && $_smarty_tpl->tpl_vars['show_clear_btn']->value) {?>
			<a href="#" class="clear_search hide"><i class="material-icons">clear</i></a>
			<?php }?>
			<input id="bo_query" name="bo_query" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['bo_query']->value;?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
" />
		</div>
	</div>
	<?php echo '<script'; ?>
>
		<?php if ((isset($_smarty_tpl->tpl_vars['search_type']->value)) && $_smarty_tpl->tpl_vars['search_type']->value) {?>
			$(document).ready(function() {
				$('.search-option a[data-value='+<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_type']->value ));?>
+']').click();
			});
		<?php }?>
	<?php echo '</script'; ?>
>
</form>
<?php }
}
