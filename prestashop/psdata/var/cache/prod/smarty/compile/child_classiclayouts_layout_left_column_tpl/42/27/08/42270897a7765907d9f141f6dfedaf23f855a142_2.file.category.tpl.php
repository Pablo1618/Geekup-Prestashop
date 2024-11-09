<?php
/* Smarty version 3.1.48, created on 2024-11-09 16:56:18
  from '/var/www/html/themes/classic/templates/catalog/listing/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f8622dc7650_52725409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42270897a7765907d9f141f6dfedaf23f855a142' => 
    array (
      0 => '/var/www/html/themes/classic/templates/catalog/listing/category.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/category-header.tpl' => 1,
  ),
),false)) {
function content_672f8622dc7650_52725409 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1201242018672f8622dc62f7_78905679', 'product_list_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block 'product_list_header'} */
class Block_1201242018672f8622dc62f7_78905679 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_header' => 
  array (
    0 => 'Block_1201242018672f8622dc62f7_78905679',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/category-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value), 0, false);
}
}
/* {/block 'product_list_header'} */
}
