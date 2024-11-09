<?php
/* Smarty version 3.1.48, created on 2024-11-09 16:56:18
  from '/var/www/html/themes/classic/templates/catalog/_partials/subcategories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f8622ed0ce8_98086633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be50bdc2624eef87e65262861e801c02cc349680' => 
    array (
      0 => '/var/www/html/themes/classic/templates/catalog/_partials/subcategories.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672f8622ed0ce8_98086633 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
  <?php if (((isset($_smarty_tpl->tpl_vars['display_subcategories']->value)) && $_smarty_tpl->tpl_vars['display_subcategories']->value == 1) || !(isset($_smarty_tpl->tpl_vars['display_subcategories']->value))) {?>
    <div id="subcategories" class="card card-block">
      <h2 class="subcategory-heading"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subcategories','d'=>'Shop.Theme.Category'),$_smarty_tpl ) );?>
</h2>

      <ul class="subcategories-list">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategories']->value, 'subcategory');
$_smarty_tpl->tpl_vars['subcategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->value) {
$_smarty_tpl->tpl_vars['subcategory']->do_else = false;
?>
          <li>
            <div class="subcategory-image">
              <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['subcategory']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="img">
                <?php if (!empty($_smarty_tpl->tpl_vars['subcategory']->value['image']['large']['url'])) {?>
                  <img class="replace-2x" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['image']['large']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['subcategory']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" loading="lazy" width="141" height="180"/>
                <?php }?>
              </a>
            </div>

            <h5><a class="subcategory-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['subcategory']->value['name'],25,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a></h5>
              <?php if ($_smarty_tpl->tpl_vars['subcategory']->value['description']) {?>
                <div class="cat_desc"><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['subcategory']->value['description'], ENT_QUOTES);?>
</div>
              <?php }?>
          </li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    </div>
  <?php }
}
}
}
