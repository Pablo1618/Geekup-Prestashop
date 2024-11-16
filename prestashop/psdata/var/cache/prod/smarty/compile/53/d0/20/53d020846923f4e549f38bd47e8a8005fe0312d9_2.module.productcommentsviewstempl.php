<?php
/* Smarty version 3.1.48, created on 2024-11-11 19:35:12
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67324e601252f8_19845443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53d020846923f4e549f38bd47e8a8005fe0312d9' => 
    array (
      0 => 'module:productcommentsviewstempl',
      1 => 1731336955,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67324e601252f8_19845443 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('icon', (($tmp = @$_smarty_tpl->tpl_vars['icon']->value)===null||$tmp==='' ? 'check_circle' : $tmp));
$_smarty_tpl->_assignInScope('modal_message', (($tmp = @$_smarty_tpl->tpl_vars['modal_message']->value)===null||$tmp==='' ? '' : $tmp));?>

<?php echo '<script'; ?>
 type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    const alertModal = $('#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_id']->value, ENT_QUOTES, 'UTF-8');?>
');
    alertModal.on('hidden.bs.modal', function () {
      alertModal.modal('hide');
    });
  });
<?php echo '</script'; ?>
>

<div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="modal fade product-comment-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h2">
          <i class="material-icons <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8');?>
" data-icon="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8');?>
"></i>
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_title']->value, ENT_QUOTES, 'UTF-8');?>

        </p>
      </div>
      <div class="modal-body">
        <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_id']->value, ENT_QUOTES, 'UTF-8');?>
-message">
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_message']->value, ENT_QUOTES, 'UTF-8');?>

        </div>
        <div class="post-comment-buttons">
          <button type="button" class="btn btn-comment btn-comment-huge" data-dismiss="modal">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'OK','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }
}
