<?php
/* Smarty version 3.1.48, created on 2024-11-06 12:51:07
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672b582b4d11b8_28126603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9e4d0b935584380ea8beb3f467908e1cd2486f5' => 
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
function content_672b582b4d11b8_28126603 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="product-list-reviews" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['product_comment_grade_url']->value;?>
">
  <div class="grade-stars small-stars"></div>
  <div class="comments-nb"></div>
</div>
<?php }
}
