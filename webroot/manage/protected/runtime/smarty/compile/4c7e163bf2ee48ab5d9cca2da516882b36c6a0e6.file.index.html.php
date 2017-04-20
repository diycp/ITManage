<?php /* Smarty version Smarty-3.1.12, created on 2017-04-20 12:24:59
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/home/index.html" */ ?>
<?php /*%%SmartyHeaderCode:137000851758f8a89b23b666-59442347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c7e163bf2ee48ab5d9cca2da516882b36c6a0e6' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/home/index.html',
      1 => 1490239707,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137000851758f8a89b23b666-59442347',
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
  'unifunc' => 'content_58f8a89b268151_61182821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8a89b268151_61182821')) {function content_58f8a89b268151_61182821($_smarty_tpl) {?><!DOCTYPE html>
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

    
<div class="row" id="p1">
</div>
<script>
    $(function() {
        $.ajax({
            "dataType": "json",
            "type": "post",
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            "beforeSend": function()
            {
                console.log('call');
            },
            "success": function(data)
            {
                if (data.code != 0) {
                    $('#p1').append('<p class="text-center">暂无数据</p>');
                }
                if (data.code == 0) {
                    $('#p1').append(data['data']);
                }
            },
            "complete": function()
            {
            }
        });
    })
</script>

    
</body>
</html><?php }} ?>