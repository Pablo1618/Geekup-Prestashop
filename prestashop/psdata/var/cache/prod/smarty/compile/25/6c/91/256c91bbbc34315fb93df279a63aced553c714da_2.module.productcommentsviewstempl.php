<?php
/* Smarty version 3.1.48, created on 2024-11-08 18:40:44
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672e4d1cbb5d73_30249138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '256c91bbbc34315fb93df279a63aced553c714da' => 
    array (
      0 => 'module:productcommentsviewstempl',
      1 => 1731083045,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672e4d1cbb5d73_30249138 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="empty-product-comment" class="product-comment-list-item">
  <?php if ($_smarty_tpl->tpl_vars['post_allowed']->value) {?>
    <button class="btn btn-comment btn-comment-big post-product-comment">
      <i class="material-icons edit" data-icon="edit"></i>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Be the first to write your review','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

    </button>
  <?php } else { ?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No customer reviews for the moment.','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

  <?php }?>
</div>
<?php }
}
