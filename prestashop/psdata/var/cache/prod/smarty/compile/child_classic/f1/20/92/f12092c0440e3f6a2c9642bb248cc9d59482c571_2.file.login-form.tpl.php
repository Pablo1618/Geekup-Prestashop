<?php
/* Smarty version 3.1.48, created on 2024-11-09 15:34:49
  from '/var/www/html/themes/classic/templates/customer/_partials/login-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672f7309d43003_10205060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f12092c0440e3f6a2c9642bb248cc9d59482c571' => 
    array (
      0 => '/var/www/html/themes/classic/templates/customer/_partials/login-form.tpl',
      1 => 1731083046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/form-errors.tpl' => 1,
  ),
),false)) {
function content_672f7309d43003_10205060 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1818073893672f7309d3f5f0_81425304', 'login_form');
?>

<?php }
/* {block 'login_form_errors'} */
class Block_155521556672f7309d3f868_41282686 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:_partials/form-errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errors'=>$_smarty_tpl->tpl_vars['errors']->value['']), 0, false);
?>
  <?php
}
}
/* {/block 'login_form_errors'} */
/* {block 'login_form_actionurl'} */
class Block_2069134717672f7309d40145_57741949 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'login_form_actionurl'} */
/* {block 'form_field'} */
class Block_2067057452672f7309d40f59_59057298 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0], array( array('field'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl ) );?>

          <?php
}
}
/* {/block 'form_field'} */
/* {block 'login_form_fields'} */
class Block_2089873762672f7309d40685_79900525 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['formFields']->value, 'field');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2067057452672f7309d40f59_59057298', 'form_field', $this->tplIndex);
?>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php
}
}
/* {/block 'login_form_fields'} */
/* {block 'form_buttons'} */
class Block_1873783485672f7309d426d2_62814167 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <button id="submit-login" class="btn btn-primary" data-link-action="sign-in" type="submit" class="form-control-submit">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign in','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

          </button>
        <?php
}
}
/* {/block 'form_buttons'} */
/* {block 'login_form_footer'} */
class Block_1470942627672f7309d424a5_32269131 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="form-footer text-sm-center clearfix">
        <input type="hidden" name="submitLogin" value="1">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1873783485672f7309d426d2_62814167', 'form_buttons', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'login_form_footer'} */
/* {block 'login_form'} */
class Block_1818073893672f7309d3f5f0_81425304 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'login_form' => 
  array (
    0 => 'Block_1818073893672f7309d3f5f0_81425304',
  ),
  'login_form_errors' => 
  array (
    0 => 'Block_155521556672f7309d3f868_41282686',
  ),
  'login_form_actionurl' => 
  array (
    0 => 'Block_2069134717672f7309d40145_57741949',
  ),
  'login_form_fields' => 
  array (
    0 => 'Block_2089873762672f7309d40685_79900525',
  ),
  'form_field' => 
  array (
    0 => 'Block_2067057452672f7309d40f59_59057298',
  ),
  'login_form_footer' => 
  array (
    0 => 'Block_1470942627672f7309d424a5_32269131',
  ),
  'form_buttons' => 
  array (
    0 => 'Block_1873783485672f7309d426d2_62814167',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155521556672f7309d3f868_41282686', 'login_form_errors', $this->tplIndex);
?>


  <form id="login-form" action="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2069134717672f7309d40145_57741949', 'login_form_actionurl', $this->tplIndex);
?>
" method="post">

    <div>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2089873762672f7309d40685_79900525', 'login_form_fields', $this->tplIndex);
?>

      <div class="forgot-password">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['password'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Forgot your password?','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

        </a>
      </div>
    </div>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1470942627672f7309d424a5_32269131', 'login_form_footer', $this->tplIndex);
?>


  </form>
<?php
}
}
/* {/block 'login_form'} */
}
