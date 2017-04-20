<?php /* Smarty version Smarty-3.1.12, created on 2017-04-09 07:24:49
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/build/index.html" */ ?>
<?php /*%%SmartyHeaderCode:114944303458e9e1c15b1f73-89331555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '272c32090da987afc4cd5491025670509649f0e4' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/build/index.html',
      1 => 1490100382,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490027715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114944303458e9e1c15b1f73-89331555',
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
  'unifunc' => 'content_58e9e1c15f2ee4_09255964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e9e1c15f2ee4_09255964')) {function content_58e9e1c15f2ee4_09255964($_smarty_tpl) {?><!DOCTYPE html>
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
    
    <link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/jquery-ui-1.10.1.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/siena.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/santiago.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/latoja.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/lugo.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/cangas.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/vigo.datepicker.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/css/nigran.datepicker.css" rel="stylesheet">
    <style>
        
	</style>

</head>
<body>
    <?php echo $_smarty_tpl->getSubTemplate ('../menu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">任务</a></li>
                <li><a href="#p2" data-toggle="tab">项目</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">
                    
                </div>
                <div class="tab-pane" id="p2">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAddProject">
                                <div class="form-group">
                                    <label for="ho-project-name" class="col-md-2 control-label">名称</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="ho-project-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-leader" class="col-md-2 control-label">组长</label>
                                    <div class="col-md-10">
                                        <select name="leader" id="ho-leader" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-project-text" class="col-md-2 control-label">内容</label>
                                    <div class="col-md-10">
                                        <textarea name="content" rows="10" class="form-control">                    
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-remind" class="col-md-2 control-label">提醒</label>
                                    <div class="col-md-8">
                                        <label for="" class="radio-inline"><input type="radio" name="remind" value="1" id="">是</label>
                                        <label for="" class="radio-inline"><input type="radio" name="remind" value="0" id="" checked>否</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-start-time" class="col-md-2 control-label">开始时间</label>
                                    <div class="col-md-10">
                                        <input type="text" name="start-time" id="ho-start-time" class="form-control date-picker-input-1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-end-time" class="col-md-2 control-label">结束时间</label>
                                    <div class="col-md-10">
                                        <input type="text" name="end-time" id="ho-end-time" class="form-control date-picker-input-1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-default" id="addProject">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $.ajax({
            "dataType": "json",
            "type": "post",
            "data": {"operate": "listDuty"},
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            "beforeSend": function()
            {
                console.log('call');
            },
            "success": function(data)
            {
                if (data.code == -1) {
                    alert('暂无数据');
                }
                if (data.code == 0) {
                    $('#p1').append(data['data']);
                }
            },
            "complete": function()
            {
                $( ".date-picker-input-1" ).datepicker({
                    inline: true,
                    showOtherMonths: true
                })
                .datepicker('widget').wrap('<div class="ll-skin-nigran"/>');

                $("#addDuty").on('click', function() {
                    var params = $('#formAddDuty').serialize();
                    params+= '&operate=addDuty';
                    $.ajax({
                        'type': 'post',
                        'dataType': 'json',
                        'data': params,
                        'url': '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
                        'beforeSend': function (){},
                        'success': function(data) {
                            if (data.code != 0) {
                                alert(data.message);
                            }
                            if (data.code == 0) {
                                if( confirm('任务添加成功，是否刷新页面？'))
                                    location.reload(true);
                            }
                        },
                        'complete': function(){}
                    })
                })
            }
        });

        $.ajax({
            "dataType": "json",
            "type": "post",
            "data": {"operate": "listProject"},
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            "beforeSend": function()
            {
                console.log('call');
            },
            "success": function(data)
            {
                if (data.code == -1) {
                    console.log('暂无数据');
                }
                if (data.code == 0) {
                    var arr = data.data.developer;
                    for(var i=0,length=arr.length; i<length; i++ ) {
                        $("#ho-leader").append("<option value="+arr[i]['id']+">"+arr[i]['fdNickname']+"</option>");
                    }
                }
            },
            "complete": function()
            {
            }
        });

        $("#addProject").on('click', function() {
            var params = $('#formAddProject').serialize();
            params+= '&operate=addProject';
            $.ajax({
                'type': 'post',
                'dataType': 'json',
                'data': params,
                'url': '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
                'beforeSend': function (){},
                'success': function(data) {
                    if (data.code != 0) {
                        alert(data.message);
                    }
                    if (data.code == 0) {
                        if( confirm('项目添加成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                'complete': function(){}
            })
        });

        
    })
</script>

    
	<script src="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/js/jquery-1.9.1.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['pluginURL']->value;?>
/calendar/js/jquery-ui-1.10.1.min.js"></script>

</body>
</html><?php }} ?>