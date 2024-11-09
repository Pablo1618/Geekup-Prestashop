<?php
/* Smarty version 3.1.48, created on 2024-11-09 16:57:24
  from '/var/www/html/themes/classic/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f8664c57716_49957279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bb2e0c71a57b4d9dfc73e20efa991854819bd9e' => 
    array (
      0 => '/var/www/html/themes/classic/templates/index.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672f8664c57716_49957279 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_63804153672f8664c56432_41432359', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_2082187383672f8664c56721_90415744 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_1106433145672f8664c56d32_60722460 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_921420676672f8664c56b32_03290323 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1106433145672f8664c56d32_60722460', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_63804153672f8664c56432_41432359 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_63804153672f8664c56432_41432359',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_2082187383672f8664c56721_90415744',
  ),
  'page_content' => 
  array (
    0 => 'Block_921420676672f8664c56b32_03290323',
  ),
  'hook_home' => 
  array (
    0 => 'Block_1106433145672f8664c56d32_60722460',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2082187383672f8664c56721_90415744', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_921420676672f8664c56b32_03290323', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
