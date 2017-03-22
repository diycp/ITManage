<?php /* Smarty version Smarty-3.1.12, created on 2017-03-22 13:42:18
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:115209596158d27f3a06f268-68845483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7f6ba6ccb1f2c770bd7744c7f3024e1498b2d08' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html',
      1 => 1490190103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115209596158d27f3a06f268-68845483',
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
  'unifunc' => 'content_58d27f3a0bbeb5_67780549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d27f3a0bbeb5_67780549')) {function content_58d27f3a0bbeb5_67780549($_smarty_tpl) {?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <blockquote>
                <div class="btn-group-sm" style="float:right">
                    <?php if ($_smarty_tpl->tpl_vars['authority']->value){?>
                        <?php if (($_smarty_tpl->tpl_vars['statusID']->value==1||$_smarty_tpl->tpl_vars['statusID']->value==2)){?>
                        <button class="btn btn-success">提交开发</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==3||$_smarty_tpl->tpl_vars['statusID']->value==5||$_smarty_tpl->tpl_vars['statusID']->value==4)){?>
                        <button class="btn btn-success">提交测试</button>
                        <button class="btn btn-danger">打回需求</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==7||$_smarty_tpl->tpl_vars['statusID']->value==6)){?>
                        <button class="btn btn-success">开发通过</button>
                        <button class="btn btn-danger">打回开发</button>
                        <?php }elseif(($_smarty_tpl->tpl_vars['statusID']->value==9||$_smarty_tpl->tpl_vars['statusID']->value==8)){?>
                        <?php }?>
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
                    <?php if ($_smarty_tpl->tpl_vars['authority']->value){?>
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
                            <?php if ($_smarty_tpl->tpl_vars['authority']->value){?>
                            <button class="btn btn-danger btn-xs">删除</button>
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td>td-1</td>
                        <td>td-2</td>
                        <td>-</td>
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