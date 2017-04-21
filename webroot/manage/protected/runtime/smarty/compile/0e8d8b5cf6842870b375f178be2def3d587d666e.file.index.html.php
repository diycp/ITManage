<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 18:57:53
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\duty\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1008658f9e5b1087be4-99899576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e8d8b5cf6842870b375f178be2def3d587d666e' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\duty\\index.html',
      1 => 1492769371,
      2 => 'file',
    ),
    'd00beddddd1e60b9ce1f94531ca9439e38a07328' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\layouts\\itlayout.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1008658f9e5b1087be4-99899576',
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
  'unifunc' => 'content_58f9e5b10f65d4_24147002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9e5b10f65d4_24147002')) {function content_58f9e5b10f65d4_24147002($_smarty_tpl) {?><!DOCTYPE html>
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
<div class="modal fade modal-addbug">
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
                        alert(data.message);
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