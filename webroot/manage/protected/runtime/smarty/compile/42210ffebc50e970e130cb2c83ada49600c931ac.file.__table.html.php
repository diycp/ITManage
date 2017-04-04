<?php /* Smarty version Smarty-3.1.12, created on 2017-04-04 16:23:43
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/search/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:145036495358e3c88f9472b1-84895996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42210ffebc50e970e130cb2c83ada49600c931ac' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/search/__table.html',
      1 => 1490173351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145036495358e3c88f9472b1-84895996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58e3c88f9721f5_30324076',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e3c88f9721f5_30324076')) {function content_58e3c88f9721f5_30324076($_smarty_tpl) {?><table class="table table-striped">
    <caption> </caption>
        <thead>
            <td class="info">ID</td>
            <td class="info">任务名</td>
            <td class="info">产品经理</td>
            <td class="info">开发者</td>
            <td class="info">测试者</td>
            <td class="info">任务类型</td>
            <td class="info">任务状态</td>
            <td class="info">预计完成时间</td>
            <td class="info">实际完成时间</td>
        </thead>
         <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <tr>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 </a> </td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
 </a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['manager'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['developer'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['tester'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['status'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['plantime'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['completetime'];?>
</td>
            </tr>
        <?php } ?>
</table><?php }} ?>