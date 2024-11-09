<?php
/* Smarty version 3.1.48, created on 2024-11-09 16:57:18
  from '/var/www/html/themes/classic/templates/cms/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f865e6f6639_20454699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4851dd06c30d8e2ce265da7e1e433e09b42e253e' => 
    array (
      0 => '/var/www/html/themes/classic/templates/cms/page.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672f865e6f6639_20454699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_777478069672f865e6f2874_06300310', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1543774396672f865e6f3a02_66348465', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_title'} */
class Block_777478069672f865e6f2874_06300310 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_777478069672f865e6f2874_06300310',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cms']->value['meta_title'], ENT_QUOTES, 'UTF-8');?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'cms_content'} */
class Block_1178083832672f865e6f4255_17281371 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo $_smarty_tpl->tpl_vars['cms']->value['content'];?>

    <?php
}
}
/* {/block 'cms_content'} */
/* {block 'hook_cms_dispute_information'} */
class Block_1201853662672f865e6f4dc1_07344981 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCMSDisputeInformation'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_cms_dispute_information'} */
/* {block 'hook_cms_print_button'} */
class Block_896869848672f865e6f5a96_38263241 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCMSPrintButton'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_cms_print_button'} */
/* {block 'page_content_container'} */
class Block_1543774396672f865e6f3a02_66348465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_1543774396672f865e6f3a02_66348465',
  ),
  'cms_content' => 
  array (
    0 => 'Block_1178083832672f865e6f4255_17281371',
  ),
  'hook_cms_dispute_information' => 
  array (
    0 => 'Block_1201853662672f865e6f4dc1_07344981',
  ),
  'hook_cms_print_button' => 
  array (
    0 => 'Block_896869848672f865e6f5a96_38263241',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="content" class="page-content page-cms page-cms-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cms']->value['id'], ENT_QUOTES, 'UTF-8');?>
">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1178083832672f865e6f4255_17281371', 'cms_content', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1201853662672f865e6f4dc1_07344981', 'hook_cms_dispute_information', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_896869848672f865e6f5a96_38263241', 'hook_cms_print_button', $this->tplIndex);
?>


  </section>
<?php
}
}
/* {/block 'page_content_container'} */
}
