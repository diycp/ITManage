<?php /* Smarty version Smarty-3.1.12, created on 2017-03-22 13:42:17
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html" */ ?>
<?php /*%%SmartyHeaderCode:118609824358d27f39b7ce37-82950024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19bbdad2406a34758715f2d99bfea02455925be' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html',
      1 => 1490187848,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118609824358d27f39b7ce37-82950024',
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
  'unifunc' => 'content_58d27f39bae4b9_43971187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d27f39bae4b9_43971187')) {function content_58d27f39bae4b9_43971187($_smarty_tpl) {?><!DOCTYPE html>
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

    
<div class="container" id="dutyContainer">
</div>
<script>
    $(function() {
        $.ajax({
            "dataType": "json",
            "type": "post",
            "data": {"operate": "list","id":"<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"},
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            "beforeSend": function()
            {
                console.log('call');
            },
            "success": function(data)
            {
                if (data.code != 0) {
                    console.log('暂无数据');
                }
                if (data.code == 0) {
                    $('#dutyContainer').append(data['data']);
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