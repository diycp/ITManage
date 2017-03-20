<?php /* Smarty version Smarty-3.1.12, created on 2017-03-20 13:46:54
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/build/index.html" */ ?>
<?php /*%%SmartyHeaderCode:84726040558cfdd4e805d56-02500423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '272c32090da987afc4cd5491025670509649f0e4' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/build/index.html',
      1 => 1490017607,
      2 => 'file',
    ),
    '6c32ba4a2db5d15490b6567a5f8791b3490c9b4c' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/layouts/itlayout.html',
      1 => 1490002276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84726040558cfdd4e805d56-02500423',
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
  'unifunc' => 'content_58cfdd4e831998_36946304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cfdd4e831998_36946304')) {function content_58cfdd4e831998_36946304($_smarty_tpl) {?><!DOCTYPE html>
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
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">任务</a></li>
                <li><a href="#p2" data-toggle="tab">项目</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAdd">
                                <div class="form-group">
                                    <label for="ho-duty-name" class="col-md-2 control-label">名称</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="ho-duty-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-project" class="col-md-2 control-label">项目</label>
                                    <div class="col-md-10">
                                        <select name="project" id="ho-project" class="form-control">
                                            <option value="1">项目管理系统</option>
                                            <option value="2">电子商城</option>
                                            <option value="3">博客</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-type" class="col-md-2 control-label">类型</label>
                                    <div class="col-md-10">
                                        <select name="type" id="ho-type" class="form-control">
                                            <option value="1">需求</option>
                                            <option value="2">开发</option>
                                            <option value="3">测试</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-prority" class="col-md-2 control-label">优先级</label>
                                    <div class="col-md-10">
                                        <select name="prority" id="ho-prority" class="form-control">
                                            <option value="1">轻微</option>
                                            <option value="2">稳定</option>
                                            <option value="3">警告</option>
                                            <option value="4">严重</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-manager" class="col-md-2 control-label">产品经理</label>
                                    <div class="col-md-10">
                                        <input type="text" name="manager" id="ho-manager" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-developer" class="col-md-2 control-label">开发者</label>
                                    <div class="col-md-10">
                                        <input type="text" name="developer" id="ho-developer" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-tester" class="col-md-2 control-label">测试者</label>
                                    <div class="col-md-10">
                                        <input type="text" name="tester" id="ho-tester" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-duty-text" class="col-md-2 control-label">内容</label>
                                    <div class="col-md-10">
                                        <textarea name="duty-content" rows="10" class="form-control">                    
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-duty-time" class="col-md-2 control-label">上线时间</label>
                                    <div class="col-md-10">
                                        <input type="text" name="duty-time" id="ho-duty-time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-default" id="addUser">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="p2">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAdd">
                                <div class="form-group">
                                    <label for="ho-project-name" class="col-md-2 control-label">名称</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="ho-project-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-leader" class="col-md-2 control-label">组长</label>
                                    <div class="col-md-10">
                                        <input type="email" name="account" id="ho-leader" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-project-text" class="col-md-2 control-label">内容</label>
                                    <div class="col-md-10">
                                        <textarea name="project-content" rows="10" class="form-control">                    
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-pass" class="col-md-2 control-label">提醒</label>
                                    <div class="col-md-10">
                                        <input type="text" name="password" id="ho-pass" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-start-time" class="col-md-2 control-label">上线时间</label>
                                    <div class="col-md-10">
                                        <input type="text" name="start-time" id="ho-start-time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-end-time" class="col-md-2 control-label">上线时间</label>
                                    <div class="col-md-10">
                                        <input type="text" name="end-time" id="ho-end-time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-default" id="addUser">submit</button>
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

</body>
</html><?php }} ?>