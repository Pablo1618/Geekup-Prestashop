<?php
/* Smarty version 3.1.48, created on 2024-11-20 23:48:24
  from '/var/www/html/themes/child_classic/templates/catalog/_partials/product-flags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_673e67382860f0_69633206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a96b4f4e12307d51c5039d535750e3001b6942d' => 
    array (
      0 => '/var/www/html/themes/child_classic/templates/catalog/_partials/product-flags.tpl',
      1 => 1731789802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673e67382860f0_69633206 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1418922294673e6738284ca6_16329419', 'product_flags');
?>

<?php }
/* {block 'product_flags'} */
class Block_1418922294673e6738284ca6_16329419 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_1418922294673e6738284ca6_16329419',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['flag']->value['type'] == "discount") {?>
            <em class="product-flag <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</em>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
/* {/block 'product_flags'} */
}
