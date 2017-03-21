<?php /* Smarty version Smarty-3.1.12, created on 2017-03-21 13:23:58
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/project/index.html" */ ?>
<?php /*%%SmartyHeaderCode:143939641958d1296e33b2f1-56039246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ff22513bd4ac61377796012e21a671b8975342b' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/project/index.html',
      1 => 1490102569,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143939641958d1296e33b2f1-56039246',
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
  'unifunc' => 'content_58d1296e36c490_53367668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d1296e36c490_53367668')) {function content_58d1296e36c490_53367668($_smarty_tpl) {?><!DOCTYPE html>
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

    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">tab-1</a></li>
                <li><a href="#p2" data-toggle="tab">tabs-2</a></li>
                <li><a href="#p3" data-toggle="tab">tabs-3</a></li>
                <li><a href="#p4" data-toggle="tab">tabs-4</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">tab-pane-1</div>
                <div class="tab-pane" id="p2">tab-pane-2</div>
                <div class="tab-pane" id="p3">tab-pane-3</div>
                <div class="tab-pane" id="p4">tab-pane-4</div>
            </div>
        </div>
    </div>
</div>

    
</body>
</html><?php }} ?>