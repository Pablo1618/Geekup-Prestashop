<?php
/* Smarty version 3.1.48, created on 2024-11-06 12:49:34
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672b57ce07d464_92421006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '398a01900f4d6cf86662af00f918b37d4904287d' => 
    array (
      0 => 'module:productcommentsviewstempl',
      1 => 1730833230,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672b57ce07d464_92421006 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('icon', (($tmp = @$_smarty_tpl->tpl_vars['icon']->value)===null||$tmp==='' ? 'check_circle' : $tmp));
$_smarty_tpl->_assignInScope('modal_message', (($tmp = @$_smarty_tpl->tpl_vars['modal_message']->value)===null||$tmp==='' ? '' : $tmp));?>

<?php echo '<script'; ?>
 type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    const confirmModal = $('#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modal_id']->value, ENT_QUOTES, 'UTF-8');?>
');
    confirmModal.on('hidden.bs.modal', function () {
      confirmModal.modal('hide');
      confirmModal.trigger('modal:confirm', false);
    });

    $('.confirm-button', confirmModal).click(function() {
      confirmModal.trigger('modal:confirm', true);
    });
    $('.refuse-button', confirmModal).click(function() {
      confirmModal.trigger('modal:confirm', false);
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
          <button type="button" class="btn btn-comment-inverse btn-comment-huge refuse-button" data-dismiss="modal">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

          </button>
          <button type="button" class="btn btn-comment btn-comment-huge confirm-button" data-dismiss="modal">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }
}
