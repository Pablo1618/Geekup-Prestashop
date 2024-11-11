<?php
/* Smarty version 3.1.48, created on 2024-11-10 16:58:36
  from '/var/www/html/themes/child_classic/templates/_partials/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6730d82c5f9474_02328094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13935e1429b0ad16ea5cd0f8f294b6bc57b61b39' => 
    array (
      0 => '/var/www/html/themes/child_classic/templates/_partials/footer.tpl',
      1 => 1731244394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6730d82c5f9474_02328094 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
  
  <div class="container">
    <div class="row">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2936752766730d82c5f4dc7_90317253', 'hook_footer_before');
?>

    </div>
  </div>
  
  <div class="footer-container">
    <div class="container">
      <div class="row">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3147170236730d82c5f57f7_22964943', 'hook_footer');
?>

      </div>
      <div class="row">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13465310566730d82c5f5ff1_12478229', 'hook_footer_after');
?>

      </div>
      <div id="shoper-foot" class="row">
        <div class="rwd wce_footer-social">
          <div class="container social-media">
            <div class="right">
              <a
                class="wce_social-ico wce_fb fa fa-facebook"
                href="https://www.facebook.com/geekuppl/"
                target="_blank"
                rel="nofollow"
                ><span>Facebook</span></a
              >
              <a
                class="wce_social-ico wce_inst fa fa-instagram"
                href="https://www.instagram.com/geekuppl/"
                target="_blank"
                rel="nofollow"
                ><span>Instagram</span></a
              >
            </div>
          </div>
        </div>
        <div class="col-md-12 copyright">
          <p class="text-sm-center">
            <div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20361568356730d82c5f67f3_05145049', 'copyright_link');
?>

            </div>
            <div class="copyright_link shop-gadget shoper">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20326816936730d82c5f7d60_63747720', 'copyright_link');
?>

            <span class="separator"></span>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10754554936730d82c5f88e9_42469008', 'copyright_link');
?>

          </p>
        </div>
      </div>
    </div>
  </div>
</contact@prestashop.com>
<?php }
/* {block 'hook_footer_before'} */
class Block_2936752766730d82c5f4dc7_90317253 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_2936752766730d82c5f4dc7_90317253',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>
 <?php
}
}
/* {/block 'hook_footer_before'} */
/* {block 'hook_footer'} */
class Block_3147170236730d82c5f57f7_22964943 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_3147170236730d82c5f57f7_22964943',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>
 <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'hook_footer_after'} */
class Block_13465310566730d82c5f5ff1_12478229 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_after' => 
  array (
    0 => 'Block_13465310566730d82c5f5ff1_12478229',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterAfter'),$_smarty_tpl ) );?>
 <?php
}
}
/* {/block 'hook_footer_after'} */
/* {block 'copyright_link'} */
class Block_20361568356730d82c5f67f3_05145049 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_20361568356730d82c5f67f3_05145049',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <span>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%copyright% %year% %prestashop%. Wszelkie prawa zastrzeżone.','sprintf'=>array('%prestashop%'=>'geekup.pl','%year%'=>date('Y'),'%copyright%'=>'©'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

            </span>
            <?php
}
}
/* {/block 'copyright_link'} */
/* {block 'copyright_link'} */
class Block_20326816936730d82c5f7d60_63747720 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_20326816936730d82c5f7d60_63747720',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <a
              href="https://www.shopgadget.pl/"
              target="_blank"
              rel="noopener noreferrer nofollow"
            >
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Styl graficzny i aplikacje %prestashop%','sprintf'=>array('%prestashop%'=>'ShopGadget.pl'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

            </a>
            <?php
}
}
/* {/block 'copyright_link'} */
/* {block 'copyright_link'} */
class Block_10754554936730d82c5f88e9_42469008 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_10754554936730d82c5f88e9_42469008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <a
              href="https://www.shoper.pl/"
              target="_blank"
              rel="noopener noreferrer nofollow"
            >
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sklep internetowy %prestashop%','sprintf'=>array('%prestashop%'=>'Shoper.pl'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

            </a>
            </div>
            <?php
}
}
/* {/block 'copyright_link'} */
}
