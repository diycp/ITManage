<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 09:01:01
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\announcement\__table.html" */ ?>
<?php /*%%SmartyHeaderCode:3068258f9ca4d829db2-00016888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73e71646d8d7cf46607b64fbc5d51a427e8e5a52' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\announcement\\__table.html',
      1 => 1492763846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3068258f9ca4d829db2-00016888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'content' => 0,
    'operater' => 0,
    'update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58f9ca4d8f0a04_40569911',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9ca4d8f0a04_40569911')) {function content_58f9ca4d8f0a04_40569911($_smarty_tpl) {?><div class="row col-md-10 col-md-offset-1">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h3>
    </div>
    <div class="panel-body">
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['operater']->value;?>
</p>
        <p class="text-right"><?php echo $_smarty_tpl->tpl_vars['update']->value;?>
</p>
    </div>
    </div>
</div><?php }} ?>