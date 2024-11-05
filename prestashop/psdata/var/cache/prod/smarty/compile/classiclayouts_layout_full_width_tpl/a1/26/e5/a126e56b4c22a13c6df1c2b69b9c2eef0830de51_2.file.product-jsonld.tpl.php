<?php
/* Smarty version 3.1.48, created on 2024-11-05 16:27:21
  from '/var/www/html/themes/classic/templates/_partials/microdata/product-jsonld.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_672a39596b2d83_22872653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a126e56b4c22a13c6df1c2b69b9c2eef0830de51' => 
    array (
      0 => '/var/www/html/themes/classic/templates/_partials/microdata/product-jsonld.tpl',
      1 => 1730817657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672a39596b2d83_22872653 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_assignInScope('hasAggregateRating', false);
if (!empty($_smarty_tpl->tpl_vars['product']->value['productComments']['averageRating']) && !empty($_smarty_tpl->tpl_vars['product']->value['productComments']['nbComments'])) {?>
    <?php $_smarty_tpl->_assignInScope('hasAggregateRating', true);?>
    <?php $_smarty_tpl->_assignInScope('ratingValue', $_smarty_tpl->tpl_vars['product']->value['productComments']['averageRating']);?>
    <?php $_smarty_tpl->_assignInScope('ratingReviewCount', $_smarty_tpl->tpl_vars['product']->value['productComments']['nbComments']);
}
if (!empty($_smarty_tpl->tpl_vars['ratings']->value['avg']) && !empty($_smarty_tpl->tpl_vars['nbComments']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('hasAggregateRating', true);?>
    <?php $_smarty_tpl->_assignInScope('ratingValue', $_smarty_tpl->tpl_vars['ratings']->value['avg']);?>
    <?php $_smarty_tpl->_assignInScope('ratingReviewCount', $_smarty_tpl->tpl_vars['nbComments']->value);
}
$_smarty_tpl->_assignInScope('hasWeight', false);
if ((isset($_smarty_tpl->tpl_vars['product']->value['weight'])) && ($_smarty_tpl->tpl_vars['product']->value['weight'] != 0)) {?>
    <?php $_smarty_tpl->_assignInScope('hasWeight', true);
}
$_smarty_tpl->_assignInScope('hasOffers', $_smarty_tpl->tpl_vars['product']->value['show_price']);
echo '<script'; ?>
 type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Product",
    "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
",
    "description": "<?php echo htmlspecialchars(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['meta']['description'],"/[\r\n]/"," "), ENT_QUOTES, 'UTF-8');?>
",
    "category": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['category_name'], ENT_QUOTES, 'UTF-8');?>
",
    <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover'])) {?>"image" :"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
",<?php }?>
    "sku": "<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');
}?>",
    "mpn": "<?php if ($_smarty_tpl->tpl_vars['product']->value['mpn']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['mpn'], ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['product']->value['reference']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');
}?>"
    <?php if ($_smarty_tpl->tpl_vars['product']->value['ean13']) {?>,"gtin13": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['ean13'], ENT_QUOTES, 'UTF-8');?>
"
    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['upc']) {?>,"gtin13": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['upc'], ENT_QUOTES, 'UTF-8');?>
"
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['product_manufacturer']->value->name || $_smarty_tpl->tpl_vars['shop']->value['name']) {?>,
    "brand": {
      "@type": "Thing",
      "name": "<?php if ($_smarty_tpl->tpl_vars['product_manufacturer']->value->name) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product_manufacturer']->value->name,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');
}?>"
    }
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasAggregateRating']->value) {?>,
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( round($_smarty_tpl->tpl_vars['ratingValue']->value,1),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
      "reviewCount": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ratingReviewCount']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
    }
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasWeight']->value) {?>,
    "weight": {
        "@context": "https://schema.org",
        "@type": "QuantitativeValue",
        "value": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight'], ENT_QUOTES, 'UTF-8');?>
",
        "unitCode": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight_unit'], ENT_QUOTES, 'UTF-8');?>
"
    }
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasOffers']->value) {?>,
    "offers": {
      "@type": "Offer",
      "priceCurrency": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
",
      "name": "<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['product']->value['name']), ENT_QUOTES, 'UTF-8');?>
",
      "price": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_amount'], ENT_QUOTES, 'UTF-8');?>
",
      "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
",
      "priceValidUntil": "<?php echo htmlspecialchars(smarty_modifier_date_format((time()+(int) (60*60*24*15)),"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
",
      <?php if (count($_smarty_tpl->tpl_vars['product']->value['images']) > 0) {?>
        "image": [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'p_img', false, NULL, 'p_img_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['p_img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p_img']->value) {
$_smarty_tpl->tpl_vars['p_img']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['total'];
?>"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_img']->value['large']['url'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last'] : null)) {?>,<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
      <?php }?>
      "sku": "<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');
}?>",
      "mpn": "<?php if ($_smarty_tpl->tpl_vars['product']->value['mpn']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['mpn'], ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['product']->value['reference']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');
}?>",
      <?php if ($_smarty_tpl->tpl_vars['product']->value['ean13']) {?>"gtin13": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['ean13'], ENT_QUOTES, 'UTF-8');?>
",<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['upc']) {?>"gtin13": "0<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['upc'], ENT_QUOTES, 'UTF-8');?>
",<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'new') {?>"itemCondition": "https://schema.org/NewCondition",<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['product']->value['show_condition'] > 0) {?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'used') {?>"itemCondition": "https://schema.org/UsedCondition",<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'refurbished') {?>"itemCondition": "https://schema.org/RefurbishedCondition",<?php }?>
      <?php }?>
      "availability": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['seo_availability'], ENT_QUOTES, 'UTF-8');?>
",
      "seller": {
        "@type": "Organization",
        "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      }
    }
    <?php }?>
  }
<?php echo '</script'; ?>
>
<?php }
}
