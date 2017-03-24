<?php /* Smarty version Smarty-3.1.12, created on 2017-03-24 08:43:32
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:6561338658d4dc3475c5c6-71021336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7f6ba6ccb1f2c770bd7744c7f3024e1498b2d08' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html',
      1 => 1490238491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6561338658d4dc3475c5c6-71021336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authority' => 0,
    'statusID' => 0,
    'project' => 0,
    'name' => 0,
    'manager' => 0,
    'developer' => 0,
    'tester' => 0,
    'plantime' => 0,
    'prority' => 0,
    'status' => 0,
    'type' => 0,
    'completetime' => 0,
    'content' => 0,
    'log' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58d4dc347a7271_90583095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d4dc347a7271_90583095')) {function content_58d4dc347a7271_90583095($_smarty_tpl) {?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <blockquote>
                <div class="btn-group-sm" style="float:right">
                    <?php if ($_smarty_tpl->tpl_vars['authority']->value){?>
                        <?php if (($_smarty_tpl->tpl_vars['statusID']->value==1||$_smarty_tpl->tpl_vars['statusID']->value==2)){?>
                        <button class="btn btn-success" onclick="updateStatus(3)">提交开发</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==3||$_smarty_tpl->tpl_vars['statusID']->value==5)){?>
                        <button class="btn btn-primary" onclick="updateStatus(4)">开始开发</button>
                        <button class="btn btn-danger" onclick="updateStatus(1)">打回需求</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==5||$_smarty_tpl->tpl_vars['statusID']->value==4)){?>
                        <button class="btn btn-success" onclick="updateStatus(6)">提交测试</button>
                        <button class="btn btn-danger" onclick="updateStatus(1)">打回需求</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==6)){?>
                        <button class="btn btn-primary" onclick="updateStatus(7)">开始测试</button>
                        <button class="btn btn-danger" onclick="updateStatus(5)">打回开发</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==7)){?>
                        <button class="btn btn-success" onclick="updateStatus(8)">开发通过</button>
                        <button class="btn btn-danger" onclick="updateStatus(5)">打回开发</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==9||$_smarty_tpl->tpl_vars['statusID']->value==8)){?>
                        <?php }?>
                        <button class="btn btn-warning" onclick="updateStatus(9)">取消</button>
                    <?php }?>
                </div>
                <h6>项目：<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
</h6>
                <h3><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h3>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <dvi class="col-md-2 col-md-offset-1">产品经理：<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
</dvi>
        <div class="col-md-2">开发者：<?php echo $_smarty_tpl->tpl_vars['developer']->value;?>
</div>
        <div class="col-md-2">测试者：<?php echo $_smarty_tpl->tpl_vars['tester']->value;?>
</div>
        <div class="col-md-2">预上线：<?php echo $_smarty_tpl->tpl_vars['plantime']->value;?>
</div>
    </div>
    <div class="row">
        <dvi class="col-md-2 col-md-offset-1">优先级：<?php echo $_smarty_tpl->tpl_vars['prority']->value;?>
</dvi>
        <div class="col-md-2">状态：<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>
        <div class="col-md-2">类型：<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</div>
        <div class="col-md-2">完成：<?php echo $_smarty_tpl->tpl_vars['completetime']->value;?>
</div>
    </div>
    <hr class="col-md-10 col-md-offset-1">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <blockquote>
                <h5><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</h5>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-left:0%">
                <div class="panel-heading">
                    问题
                    <?php if (($_smarty_tpl->tpl_vars['authority']->value&&$_smarty_tpl->tpl_vars['status']->value==7)){?>
                    <button class="btn btn-success btn-xs" style="margin-right: 2%; float: right">添加</button>
                    <?php }?>
                </div>
                <table class="table default">
                    <tbody>
                    <tr>
                        <td>没有跳转没有跳转 转</td>
                        <td>修复：
                            <input type="radio" name="remind" value="1" id="">是
                            <input type="radio" name="remind" value="0" id="" checked>否
                        </td>
                        <td>
                            <?php if (($_smarty_tpl->tpl_vars['authority']->value&&$_smarty_tpl->tpl_vars['status']->value==7)){?>
                            <button class="btn btn-danger btn-xs">删除</button>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <blockquote>
                <h5>操作日志</h5>
                <h5><?php echo $_smarty_tpl->tpl_vars['log']->value;?>
</h5>
            </blockquote>
        </div>
    </div><?php }} ?>