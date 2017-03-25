<?php /* Smarty version Smarty-3.1.12, created on 2017-03-25 17:18:22
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html" */ ?>
<?php /*%%SmartyHeaderCode:214530888858d6a65e095b56-93021857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19bbdad2406a34758715f2d99bfea02455925be' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/index.html',
      1 => 1490462280,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214530888858d6a65e095b56-93021857',
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
  'unifunc' => 'content_58d6a65e0c78e8_20367029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d6a65e0c78e8_20367029')) {function content_58d6a65e0c78e8_20367029($_smarty_tpl) {?><!DOCTYPE html>
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
<div class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           
        <div class="modal-header">添加BUG</div>
        <div class="modal-body">
            <form action="" class="form-horizontal" id="modal-form">
                <div class="form-group">
                    <label for="modal-ho-name" class="col-md-2 control-label">问题</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="modal-ho-name" class="form-control">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" id="modalclose">
                close
            </button>
            <button class="btn btn-primary" id="modaladdbug">
                submit
            </button>
        </div>
       </div>
    </div>
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