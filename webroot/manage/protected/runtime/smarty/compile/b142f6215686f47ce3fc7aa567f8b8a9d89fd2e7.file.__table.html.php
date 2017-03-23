<?php /* Smarty version Smarty-3.1.12, created on 2017-03-23 13:27:38
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/announcement/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:77678572058d3cd4a34b702-03977401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b142f6215686f47ce3fc7aa567f8b8a9d89fd2e7' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/announcement/__table.html',
      1 => 1490275403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77678572058d3cd4a34b702-03977401',
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
  'unifunc' => 'content_58d3cd4a375f27_34516450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3cd4a375f27_34516450')) {function content_58d3cd4a375f27_34516450($_smarty_tpl) {?><div class="row col-md-10 col-md-offset-1">
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