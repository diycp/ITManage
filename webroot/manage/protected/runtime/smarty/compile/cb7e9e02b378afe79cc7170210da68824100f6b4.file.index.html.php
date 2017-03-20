<?php /* Smarty version Smarty-3.1.12, created on 2017-03-20 11:49:37
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html" */ ?>
<?php /*%%SmartyHeaderCode:195793870258cfc1d13bf8d4-66599854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb7e9e02b378afe79cc7170210da68824100f6b4' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html',
      1 => 1490010422,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490002276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195793870258cfc1d13bf8d4-66599854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cssURL' => 0,
    'jsURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58cfc1d13e7ab3_75687292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cfc1d13e7ab3_75687292')) {function content_58cfc1d13e7ab3_75687292($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT管理系统</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/menu/menu.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['jsURL']->value;?>
/jquery.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['jsURL']->value;?>
/bootstrap.min.js"></script>
</head>
<body>
    <?php echo $_smarty_tpl->getSubTemplate ('../menu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
enter home

</body>
</html><?php }} ?>