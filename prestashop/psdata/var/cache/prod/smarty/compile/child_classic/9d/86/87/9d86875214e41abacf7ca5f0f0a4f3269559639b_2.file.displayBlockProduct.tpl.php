<?php
/* Smarty version 3.1.48, created on 2024-11-05 20:08:07
  from '/var/www/html/modules/blockreassurance/views/templates/hook/displayBlockProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672a6d17d94be8_07272533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d86875214e41abacf7ca5f0f0a4f3269559639b' => 
    array (
      0 => '/var/www/html/modules/blockreassurance/views/templates/hook/displayBlockProduct.tpl',
      1 => 1730833230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672a6d17d94be8_07272533 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="blockreassurance_product">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blocks']->value, 'block', false, 'key');
$_smarty_tpl->tpl_vars['block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->do_else = false;
?>
        <div<?php if ($_smarty_tpl->tpl_vars['block']->value['type_link'] !== $_smarty_tpl->tpl_vars['LINK_TYPE_NONE']->value && !empty($_smarty_tpl->tpl_vars['block']->value['link'])) {?> style="cursor:pointer;" onclick="window.open('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['link'], ENT_QUOTES, 'UTF-8');?>
')"<?php }?>>
            <span class="item-product">
                <?php if ($_smarty_tpl->tpl_vars['block']->value['icon'] != 'undefined') {?>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['custom_icon']) {?>
                    <img <?php if ($_smarty_tpl->tpl_vars['block']->value['is_svg']) {?>class="svg invisible" <?php }?>src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['custom_icon'], ENT_QUOTES, 'UTF-8');?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['block']->value['icon']) {?>
                    <img class="svg invisible" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['icon'], ENT_QUOTES, 'UTF-8');?>
">
                    <?php }?>
                <?php }?>&nbsp;
            </span>
            <?php if (empty($_smarty_tpl->tpl_vars['block']->value['description'])) {?>
              <p class="block-title" style="color:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['textColor']->value, ENT_QUOTES, 'UTF-8');?>
;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');?>
</p>
            <?php } else { ?>
              <span class="block-title" style="color:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['textColor']->value, ENT_QUOTES, 'UTF-8');?>
;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
              <p style="color:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['textColor']->value, ENT_QUOTES, 'UTF-8');?>
;"><?php echo $_smarty_tpl->tpl_vars['block']->value['description'];?>
</p>
            <?php }?>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <div class="clearfix"></div>
</div>
<?php }
}
