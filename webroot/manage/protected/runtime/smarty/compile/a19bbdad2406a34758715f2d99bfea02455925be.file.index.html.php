<?php /* Smarty version Smarty-3.1.12, created on 2017-03-24 08:43:31
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html" */ ?>
<?php /*%%SmartyHeaderCode:54381783058d4dc33e92613-83085455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19bbdad2406a34758715f2d99bfea02455925be' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html',
      1 => 1490271374,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54381783058d4dc33e92613-83085455',
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
  'unifunc' => 'content_58d4dc33f27db2_63012205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d4dc33f27db2_63012205')) {function content_58d4dc33f27db2_63012205($_smarty_tpl) {?><!DOCTYPE html>
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
                    $('#dutyContainer').append('<p class="text-center">暂无数据</p>');
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
    function updateStatus(status)
    {
        var id = '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
        var status = status;
        $.ajax({
                "dataType": "json",
                "type": "post",
                "data": {"operate": "updateStatus","id":"<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
", "status":status},
                "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
                "beforeSend": function()
                {
                    console.log('call');
                },
                "success": function(data)
                {
                    if (data.code != 0) {
                        alert('操作失败');
                    }
                    if (data.code == 0) {
                        alert('操作成功');
                        location.reload(true);
                    }
                },
                "complete": function()
                {
                }
            }); 
    }
</script>

    
</body>
</html><?php }} ?>