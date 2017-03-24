<?php /* Smarty version Smarty-3.1.12, created on 2017-03-24 07:14:54
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/build/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:140492204758d4c76e3cc349-15472470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05737a9b7e1af3045942aecaaa7960cf1053e56d' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/build/__table.html',
      1 => 1490111659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140492204758d4c76e3cc349-15472470',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'row' => 0,
    'type' => 0,
    'status' => 0,
    'prority' => 0,
    'manager' => 0,
    'developer' => 0,
    'tester' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58d4c76e40fa00_26968698',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d4c76e40fa00_26968698')) {function content_58d4c76e40fa00_26968698($_smarty_tpl) {?><div class="row" style="margin-top:20px">
    <div class="col-md-8">
        <form action="" class="form-horizontal" id="formAddDuty">
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
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-type" class="col-md-2 control-label">类型</label>
                <div class="col-md-10">
                    <select name="type" id="ho-type" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-status" class="col-md-2 control-label">状态</label>
                <div class="col-md-10">
                    <select name="status" id="ho-status" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-prority" class="col-md-2 control-label">优先级</label>
                <div class="col-md-10">
                    <select name="prority" id="ho-prority" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prority']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-manager" class="col-md-2 control-label">产品经理</label>
                <div class="col-md-10">
                    <select name="manager" id="ho-manager" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manager']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdNickname'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-developer" class="col-md-2 control-label">开发者</label>
                <div class="col-md-10">
                    <select name="developer" id="ho-developer" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['developer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdNickname'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-tester" class="col-md-2 control-label">测试者</label>
                <div class="col-md-10">
                    <select name="tester" id="ho-tester" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tester']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdNickname'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-duty-text" class="col-md-2 control-label">内容</label>
                <div class="col-md-10">
                    <textarea name="content" rows="10" class="form-control">                    
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="ho-duty-time" class="col-md-2 control-label">上线时间</label>
                <div class="col-md-10">
                    <input type="text" name="time" id="ho-duty-time" class="form-control date-picker-input-1">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <button type="button" class="btn btn-default" id="addDuty">submit</button>
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>