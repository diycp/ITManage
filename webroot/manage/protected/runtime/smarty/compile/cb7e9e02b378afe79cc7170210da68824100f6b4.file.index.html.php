<?php /* Smarty version Smarty-3.1.12, created on 2017-03-21 13:24:07
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html" */ ?>
<?php /*%%SmartyHeaderCode:37384910258d129775b9425-64137842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb7e9e02b378afe79cc7170210da68824100f6b4' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html',
      1 => 1490102426,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37384910258d129775b9425-64137842',
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
  'unifunc' => 'content_58d129775f95c8_26033140',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d129775f95c8_26033140')) {function content_58d129775f95c8_26033140($_smarty_tpl) {?><!DOCTYPE html>
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
            <form action="" class="form-horizontal" id="formAddProject">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-1">
                        <input type="text" name="name" id="ho-search" class="form-control" placeholder="通过任务名称全文检索">
                    </div>
                    <label for="ho-search" class="col-md-1 control-label" style="padding-top: 0">
                        <button class="btn btn-default" id="search">search</button>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#search').on('click', function(){
            return false;
        })
    })
</script>

    
</body>
</html><?php }} ?>