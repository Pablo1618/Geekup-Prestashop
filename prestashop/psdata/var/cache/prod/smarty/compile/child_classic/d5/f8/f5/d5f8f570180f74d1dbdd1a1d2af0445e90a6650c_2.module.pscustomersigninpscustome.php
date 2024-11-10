<?php
/* Smarty version 3.1.48, created on 2024-11-10 11:42:10
  from 'module:pscustomersigninpscustome' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67308e02957515_72894678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5f8f570180f74d1dbdd1a1d2af0445e90a6650c' => 
    array (
      0 => 'module:pscustomersigninpscustome',
      1 => 1731083046,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67308e02957515_72894678 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="_desktop_user_info">
  <div class="user-info">
    <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
      <a
        class="logout hidden-sm-down"
        href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['actions']['logout'], ENT_QUOTES, 'UTF-8');?>
"
        rel="nofollow"
      >
        <i class="material-icons">&#xE7FF;</i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wyloguj się','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

      </a>
      <a
        class="account"
        href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
"
        title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View my customer account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
"
        rel="nofollow"
      >
        <i class="material-icons hidden-md-up logged">&#xE7FF;</i>
        <span class="hidden-sm-down"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customerName']->value, ENT_QUOTES, 'UTF-8');?>
</span>
      </a>
    <?php } else { ?>
      <div class="login-register">
        <a
          href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['register'], ENT_QUOTES, 'UTF-8');?>
"
          title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register to your customer account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
"
          rel="nofollow"
        >
          <i class="material-icons signIn">&#xE7FF;</i>
          <span class="hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Zarejestruj się','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
        </a>
        <a
          href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
"
          title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log in to your customer account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
"
          rel="nofollow"
        >
          <i class="material-icons signIn login"></i>
          <span class="hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Zaloguj się','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
        </a>
      </div>
    <?php }?>
  </div>
</div>
<?php }
}
