<?php
/* Smarty version 3.1.48, created on 2024-11-16 21:37:44
  from '/var/www/html/themes/debug.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67390298b23977_25828134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fa50a785fcee2e48ada2c775ee87025f6837a49' => 
    array (
      0 => '/var/www/html/themes/debug.tpl',
      1 => 1731245773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67390298b23977_25828134 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.debug_print_var.php','function'=>'smarty_modifier_debug_print_var',),));
?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, '_smarty_debug', 'debug_output', null);?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>Smarty Debug Console</title>
        <style type="text/css">
            
            body, h1, h2, td, th, p {
                font-family: sans-serif;
                font-weight: normal;
                font-size: 0.9em;
                margin: 1px;
                padding: 0;
            }

            h1 {
                margin: 0;
                text-align: left;
                padding: 2px;
                background-color: #f0c040;
                color: black;
                font-weight: bold;
                font-size: 1.2em;
            }

            h2 {
                background-color: #9B410E;
                color: white;
                text-align: left;
                font-weight: bold;
                padding: 2px;
                border-top: 1px solid black;
            }

            body {
                background: black;
            }

            p, table, div {
                background: #f0ead8;
            }

            p {
                margin: 0;
                font-style: italic;
                text-align: center;
            }

            table {
                width: 100%;
            }

            th, td {
                font-family: monospace;
                vertical-align: top;
                text-align: left;
                width: 50%;
            }

            td {
                color: green;
            }

            .odd {
                background-color: #eeeeee;
            }

            .even {
                background-color: #fafafa;
            }

            .exectime {
                font-size: 0.8em;
                font-style: italic;
            }

            #table_assigned_vars th {
                color: blue;
            }

            #table_config_vars th {
                color: maroon;
            }

            
        </style>
    </head>
    <body>

    <h1>Smarty Debug Console
        -  <?php if ((isset($_smarty_tpl->tpl_vars['template_name']->value))) {
echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['template_name']->value);
} else { ?>Total Time <?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['execution_time']->value), ENT_QUOTES, 'UTF-8');
}?></h1>

    <?php if (!empty($_smarty_tpl->tpl_vars['template_data']->value)) {?>
        <h2>included templates &amp; config files (load time in seconds)</h2>
        <div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['template_data']->value, 'template');
$_smarty_tpl->tpl_vars['template']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->do_else = false;
?>
                <font color="brown"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['template']->value['name'], ENT_QUOTES, 'UTF-8');?>
</font>
                <span class="exectime">
   (compile <?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['compile_time']), ENT_QUOTES, 'UTF-8');?>
) (render <?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['render_time']), ENT_QUOTES, 'UTF-8');?>
) (cache <?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['cache_time']), ENT_QUOTES, 'UTF-8');?>

                    )
  </span>
                <br/>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php }?>

    <h2>assigned template variables</h2>

    <table id="table_assigned_vars">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assigned_vars']->value, 'vars');
$_smarty_tpl->tpl_vars['vars']->iteration = 0;
$_smarty_tpl->tpl_vars['vars']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vars']->key => $_smarty_tpl->tpl_vars['vars']->value) {
$_smarty_tpl->tpl_vars['vars']->do_else = false;
$_smarty_tpl->tpl_vars['vars']->iteration++;
$__foreach_vars_5_saved = $_smarty_tpl->tpl_vars['vars'];
?>
            <tr class="<?php if ($_smarty_tpl->tpl_vars['vars']->iteration%2 == 0) {?>odd<?php } else { ?>even<?php }?>">
                <th>$<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['vars']->key, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</th>
                <td><?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value);?>
</td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['vars'] = $__foreach_vars_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

    <h2>assigned config file variables (outer template scope)</h2>

    <table id="table_config_vars">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['config_vars']->value, 'vars');
$_smarty_tpl->tpl_vars['vars']->iteration = 0;
$_smarty_tpl->tpl_vars['vars']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vars']->key => $_smarty_tpl->tpl_vars['vars']->value) {
$_smarty_tpl->tpl_vars['vars']->do_else = false;
$_smarty_tpl->tpl_vars['vars']->iteration++;
$__foreach_vars_6_saved = $_smarty_tpl->tpl_vars['vars'];
?>
            <tr class="<?php if ($_smarty_tpl->tpl_vars['vars']->iteration%2 == 0) {?>odd<?php } else { ?>even<?php }?>">
                <th><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['vars']->key, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</th>
                <td><?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value);?>
</td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['vars'] = $__foreach_vars_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </table>
    </body>
    </html>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
echo '<script'; ?>
 type="text/javascript">
    <?php $_smarty_tpl->_assignInScope('id', md5((($tmp = @$_smarty_tpl->tpl_vars['template_name']->value)===null||$tmp==='' ? '' : $tmp)));?>
    _smarty_console = window.open("", "console<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
", "width=680,height=600,resizable,scrollbars=yes");
    _smarty_console.document.write("<?php echo strtr($_smarty_tpl->tpl_vars['debug_output']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
");
    _smarty_console.document.close();
<?php echo '</script'; ?>
>
<?php }
}
