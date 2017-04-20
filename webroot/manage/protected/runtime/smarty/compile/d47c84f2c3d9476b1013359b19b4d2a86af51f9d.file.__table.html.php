<?php /* Smarty version Smarty-3.1.12, created on 2017-04-20 12:24:13
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/board/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:197055927958f8a86d168f25-62718627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd47c84f2c3d9476b1013359b19b4d2a86af51f9d' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/board/__table.html',
      1 => 1490276895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197055927958f8a86d168f25-62718627',
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
  'unifunc' => 'content_58f8a86d1e2cf6_11747772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8a86d1e2cf6_11747772')) {function content_58f8a86d1e2cf6_11747772($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
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