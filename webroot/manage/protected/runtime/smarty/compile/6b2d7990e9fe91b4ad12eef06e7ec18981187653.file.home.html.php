<?php /* Smarty version Smarty-3.1.12, created on 2017-03-16 08:44:20
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/modules/Backstage/views/home/home.html" */ ?>
<?php /*%%SmartyHeaderCode:45493774258ca5064575a39-49333812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b2d7990e9fe91b4ad12eef06e7ec18981187653' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/modules/Backstage/views/home/home.html',
      1 => 1489653130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45493774258ca5064575a39-49333812',
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
  'unifunc' => 'content_58ca50645994b7_56697749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ca50645994b7_56697749')) {function content_58ca50645994b7_56697749($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/menu/menu.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['jsURL']->value;?>
/js/jquery.min.js"></script>
</head>
<body>
    <?php echo $_smarty_tpl->getSubTemplate ("../__menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('nav'=>true), 0);?>

</body>
</html><?php }} ?>