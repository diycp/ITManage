<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 09:01:00
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\announcement\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3070358f9ca4ce6de00-97603084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '850769b2ed1592a6124e3b3f985594aac9c65410' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\announcement\\index.html',
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
  'nocache_hash' => '3070358f9ca4ce6de00-97603084',
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
  'unifunc' => 'content_58f9ca4cebdb16_56379904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9ca4cebdb16_56379904')) {function content_58f9ca4cebdb16_56379904($_smarty_tpl) {?><!DOCTYPE html>
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

    
<div class="container" id="p1">

</div>
<script>
    $(function() {
        $.ajax({
           "dataType": "json",
            "type": "post",
            "data": {"operate": "list"},
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
                console.log('complete');
            }   
        })
    })
</script>

    
</body>
</html><?php }} ?>