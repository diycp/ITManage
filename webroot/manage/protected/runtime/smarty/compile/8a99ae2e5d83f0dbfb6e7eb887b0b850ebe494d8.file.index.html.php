<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 18:57:15
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\home\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1178058f9e58b5b4867-96733404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a99ae2e5d83f0dbfb6e7eb887b0b850ebe494d8' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\home\\index.html',
      1 => 1492763847,
      2 => 'file',
    ),
    'd00beddddd1e60b9ce1f94531ca9439e38a07328' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\layouts\\itlayout.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1178058f9e58b5b4867-96733404',
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
  'unifunc' => 'content_58f9e58b602262_58061906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9e58b602262_58061906')) {function content_58f9e58b602262_58061906($_smarty_tpl) {?><!DOCTYPE html>
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