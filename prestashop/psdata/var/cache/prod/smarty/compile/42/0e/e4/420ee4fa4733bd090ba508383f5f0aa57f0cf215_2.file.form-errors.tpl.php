<?php
/* Smarty version 3.1.48, created on 2024-11-09 15:34:49
  from '/var/www/html/themes/classic/templates/_partials/form-errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f7309d8a3b8_01428875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '420ee4fa4733bd090ba508383f5f0aa57f0cf215' => 
    array (
      0 => '/var/www/html/themes/classic/templates/_partials/form-errors.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672f7309d8a3b8_01428875 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="help-block">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_387124752672f7309d89522_04979373', 'form_errors');
?>

  </div>
<?php }
}
/* {block 'form_errors'} */
class Block_387124752672f7309d89522_04979373 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_errors' => 
  array (
    0 => 'Block_387124752672f7309d89522_04979373',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
          <li class="alert alert-danger"><?php echo nl2br($_smarty_tpl->tpl_vars['error']->value);?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php
}
}
/* {/block 'form_errors'} */
}
