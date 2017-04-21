<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 09:02:13
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\project\__table.html" */ ?>
<?php /*%%SmartyHeaderCode:2210258f9ca95a5e7f1-08175931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5e7d03e43bbb7911ab29e6e6712a4a0868177e2' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\project\\__table.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2210258f9ca95a5e7f1-08175931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fdName' => 0,
    'fdNickName' => 0,
    'fdTimeStart' => 0,
    'fdTimeEnd' => 0,
    'fdDesc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58f9ca95aba774_95213988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9ca95aba774_95213988')) {function content_58f9ca95aba774_95213988($_smarty_tpl) {?><div class="row" style="margin-top:20px">
    <div class="col-md-10">
        <blockquote>
            <?php echo $_smarty_tpl->tpl_vars['fdName']->value;?>

        </blockquote>
    </div>
</div>
<div class="row">
    <dvi class="col-md-2">组长：<?php echo $_smarty_tpl->tpl_vars['fdNickName']->value;?>
</dvi>
    <div class="col-md-3">开始时间：<?php echo $_smarty_tpl->tpl_vars['fdTimeStart']->value;?>
</div>
    <div class="col-md-3">结束时间：<?php echo $_smarty_tpl->tpl_vars['fdTimeEnd']->value;?>
</div>
</div>
<hr>
<div class="row">
    <div class="col-md-10">
        <blockquote>
            <h5><?php echo $_smarty_tpl->tpl_vars['fdDesc']->value;?>
</h5>
        </blockquote>
    </div>
</div>
<?php }} ?>