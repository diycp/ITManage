<?php /* Smarty version Smarty-3.1.12, created on 2017-03-23 13:18:00
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html" */ ?>
<?php /*%%SmartyHeaderCode:156791868158d3cb08520cb6-19936362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb7e9e02b378afe79cc7170210da68824100f6b4' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/search/index.html',
      1 => 1490239796,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156791868158d3cb08520cb6-19936362',
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
  'unifunc' => 'content_58d3cb08555661_07531035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3cb08555661_07531035')) {function content_58d3cb08555661_07531035($_smarty_tpl) {?><!DOCTYPE html>
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
            <form action="" class="form-horizontal" id="formSearch">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-1">
                        <input type="text" name="keyword" id="ho-search" class="form-control" placeholder="输入任务名称">
                    </div>
                    <label for="ho-search" class="col-md-1 control-label" style="padding-top: 0">
                        <button class="btn btn-default" id="search">search</button>
                    </label>
                </div>
            </form>
        </div>
    </div>

    <div class="row col-md-10 col-md-offset-1" id="duty">
    </div>

</div>
<script>
    $(function(){
        $('#search').on('click', function(){
            var params = $('#formSearch').serialize();
            $.ajax({
                'type': 'post',
                'dataType': 'json',
                'data': params,
                'url': '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
                'beforeSend': function (){
                    console.log(params);
                },
                'success': function(data) {
                    $('#duty').empty();
                    if (data.code != 0) {
                        $('#duty').append('<p class="text-center">暂无数据</p>');
                    }
                    if (data.code == 0) {
                        $('#duty').append(data['data']);
                    }
                },
                'complete': function(){}
            })
            return false;
        })
    })
</script>

    
</body>
</html><?php }} ?>