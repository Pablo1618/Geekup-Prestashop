<?php
/* Smarty version 3.1.48, created on 2024-11-10 19:12:33
  from 'module:blockwishlistviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6730f7917624b1_75099071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1bacae0f849d018ebb1880b67ace16e31cb4007' => 
    array (
      0 => 'module:blockwishlistviewstemplat',
      1 => 1731083045,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6730f7917624b1_75099071 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="wishlist-pagination pagination">
  <template v-if="display">
    <div class="col-md-4">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Showing %min% - %max% of %total% item(s)','sprintf'=>array('%min%'=>'((minShown))','%max%'=>'((maxShown))','%total%'=>'((total))'),'d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>

    </div>

    <div class="col-md-6 offset-md-2 pr-0">
      <ul class="page-list clearfix text-sm-center">
        <li :class="{current: page.current}" v-for="page of pages">
          <a class="js-wishlist-search-link" @click="paginate(page)" key="page.page" :class="{disabled: page.current, next: page.type === 'next', previous: page.type === 'previous'}">
            <span v-if="page.type === 'previous'">
              <i class="material-icons">keyboard_arrow_left</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Previous','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
 
            </span>

            <template v-if="page.type !== 'previous' && page.type !== 'next'">
              ((page.page))
            </template>

            <span v-if="page.type === 'next'">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
 <i class="material-icons"></i>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </template>
</nav>
<?php }
}
