<?php /* Smarty version Smarty-3.1.12, created on 2017-03-22 04:04:23
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/announcement/index.html" */ ?>
<?php /*%%SmartyHeaderCode:144747788058d1f7c742e3f4-27332750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd70d04a529bc103e24ab45fdabc89b403288f978' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/announcement/index.html',
      1 => 1490010428,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144747788058d1f7c742e3f4-27332750',
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
  'unifunc' => 'content_58d1f7c748c6c2_64911354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d1f7c748c6c2_64911354')) {function content_58d1f7c748c6c2_64911354($_smarty_tpl) {?><!DOCTYPE html>
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