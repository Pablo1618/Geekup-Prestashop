<?php
/* Smarty version 4.3.4, created on 2024-10-29 18:47:44
  from '/var/www/html/modules/dashproducts/views/templates/hook/dashboard_zone_two.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67211fc0951ad6_06970089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb4aabc058b2936ced374e503b46b343be235a4e' => 
    array (
      0 => '/var/www/html/modules/dashproducts/views/templates/hook/dashboard_zone_two.tpl',
      1 => 1701183736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67211fc0951ad6_06970089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="dashproducts" class="panel widget">
  <header class="panel-heading">
    <i class="icon-bar-chart"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products and Sales','d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>

    <span class="panel-heading-action">
      <?php if (!empty($_smarty_tpl->tpl_vars['dashproducts_config_form']->value)) {?>
        <a class="list-toolbar-btn" href="#" onclick="toggleDashConfig('dashproducts'); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
">
          <i class="process-icon-configure"></i>
        </a>
      <?php }?>
      <a class="list-toolbar-btn" href="#"  onclick="refreshDashboard('dashproducts'); return false;"  title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refresh','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
">
        <i class="process-icon-refresh"></i>
      </a>
    </span>
  </header>

  <?php if (!empty($_smarty_tpl->tpl_vars['dashproducts_config_form']->value)) {?>
    <section id="dashproducts_config" class="dash_config hide">
      <header><i class="icon-wrench"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configuration','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</header>
      <?php echo $_smarty_tpl->tpl_vars['dashproducts_config_form']->value;?>

    </section>
  <?php }?>

  <section>
    <nav>
      <ul class="nav nav-pills">
        <li class="active">
          <a href="#dash_recent_orders" data-toggle="tab">
            <i class="icon-fire"></i>
            <span class="hidden-inline-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Recent Orders','d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
</span>
          </a>
        </li>
        <li>
          <a href="#dash_best_sellers" data-toggle="tab">
            <i class="icon-trophy"></i>
            <span class="hidden-inline-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Best Sellers','d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
</span>
          </a>
        </li>
        <li>
          <a href="#dash_most_viewed" data-toggle="tab">
            <i class="icon-eye-open"></i>
            <span class="hidden-inline-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Most Viewed','d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
</span>
          </a>
        </li>
        <li>
          <a href="#dash_top_search" data-toggle="tab">
            <i class="icon-search"></i>
            <span class="hidden-inline-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top Searches','d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="tab-content panel">
      <div class="tab-pane active" id="dash_recent_orders">
        <div class="panel-heading">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last %d orders','sprintf'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['DASHPRODUCT_NBR_SHOW_LAST_ORDER']->value )),'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>

        </div>
        <div class="table-responsive">
          <table class="table data_table" id="table_recent_orders">
            <thead></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane" id="dash_best_sellers">
        <div class="panel-heading">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top %d products','sprintf'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['DASHPRODUCT_NBR_SHOW_BEST_SELLER']->value )),'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>

          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_from']->value,'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"to",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_to']->value,'htmlall','UTF-8' ));?>
</span>
        </div>
        <div class="table-responsive">
          <table class="table data_table" id="table_best_sellers">
            <thead></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane" id="dash_most_viewed">
        <div class="panel-heading">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Most Viewed",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>

          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_from']->value,'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"to",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_to']->value,'htmlall','UTF-8' ));?>
</span>
        </div>
        <div class="table-responsive">
          <table class="table data_table" id="table_most_viewed">
            <thead></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane" id="dash_top_search">
        <div class="panel-heading">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top %d most search terms','sprintf'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['DASHPRODUCT_NBR_SHOW_TOP_SEARCH']->value )),'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>

          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_from']->value,'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"to",'d'=>'Modules.Dashproducts.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_to']->value,'htmlall','UTF-8' ));?>
</span>
        </div>
        <div class="table-responsive">
          <table class="table data_table" id="table_top_10_most_search">
            <thead></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</section>
<?php }
}
