<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 17:23:38
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\board\__table.html" */ ?>
<?php /*%%SmartyHeaderCode:808958f9cf9a2f73c3-46754103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '255d27b0189d3e1145c2bd401015edb8982e1dd7' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\board\\__table.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '808958f9cf9a2f73c3-46754103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'key' => 0,
    'val' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58f9cf9a3495a6_54730575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9cf9a3495a6_54730575')) {function content_58f9cf9a3495a6_54730575($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['val']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['val']->index++;
 $_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->index === 0;
?>
<div class="col-md-3 <?php if ($_smarty_tpl->tpl_vars['val']->first){?>col-md-offset-1<?php }?>" style="margin:20px">
    <a href="javascript:;" class="list-group-item active"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a>
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
 <span style="float:right">[<?php echo $_smarty_tpl->tpl_vars['row']->value['pname'];?>
]</span></a>
        <div style="clear: both"></div>
    <?php } ?>
</div>
<?php } ?><?php }} ?>