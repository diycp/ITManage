<?php /* Smarty version Smarty-3.1.12, created on 2017-04-04 16:23:54
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:2815764258e3c89aa9e853-56558123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7f6ba6ccb1f2c770bd7744c7f3024e1498b2d08' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/duty/__table.html',
      1 => 1491322298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2815764258e3c89aa9e853-56558123',
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
    'bug' => 0,
    'row' => 0,
    'log' => 0,
    'id' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58e3c89aaec4c0_02566507',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e3c89aaec4c0_02566507')) {function content_58e3c89aaec4c0_02566507($_smarty_tpl) {?>
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
                    <?php if (($_smarty_tpl->tpl_vars['authority']->value&&$_smarty_tpl->tpl_vars['statusID']->value==7)){?>
                    <button class="btn btn-success btn-xs addbug" style="margin-right: 2%; float: right">添加</button>
                    <?php }?>
                </div>
                <table class="table default">
                    <tbody id="bodybug">
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bug']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['fdDesc'];?>
</td>
                                <td>修复：
                                    <input type="radio" name="remind-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="1" <?php if (($_smarty_tpl->tpl_vars['row']->value['fdStatus']==1)){?>checked<?php }?>>是
                                    <input type="radio" name="remind-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="0" <?php if (($_smarty_tpl->tpl_vars['row']->value['fdStatus']==0)){?>checked<?php }?>>否
                                </td>
                                <td>
                                <?php if (($_smarty_tpl->tpl_vars['authority']->value&&$_smarty_tpl->tpl_vars['statusID']->value==7)){?>
                                    <button class="btn btn-success btn-xs" onclick="confirm(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">确定</button>
                                    <button class="btn btn-danger btn-xs"  onclick="delBug(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">删除</button>
                                    <?php }?>
                                </td>
                            </td>
                        </tr>
                        <?php } ?>
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
    </div>

<?php if (($_smarty_tpl->tpl_vars['authority']->value&&$_smarty_tpl->tpl_vars['statusID']->value==7)){?>
<script>
    $(function(){
        $('.addbug').on('click', function(){
            $('.modal').modal();
        });
        $('#modaladdbug').on('click', function(){
            var bug = $('#modal-ho-name').val();
            var id = '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
            $('#modal-ho-name').val('');
            $.ajax({
                'dataType' : 'json',
                "type": "post",
                "data": {"operate": "addBug","value":bug, "id": id},
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
                        var id = data['data'].id;
                        var tr = 
                        '<tr><td>'+bug+'</td><td>修复：&nbsp;<input type="radio" name="remind-1" value="1" id="">是<input type="radio" name="remind-1" value="0" id="" checked>否</td><td><button class="btn btn-success btn-xs" onclick="confirm('+id+')">确定</button> <button class="btn btn-danger btn-xs">删除</button></td></tr>';
                        $('#bodybug').append(tr);
                        $('#modalclose').click();
                    }
                },
                "complete": function()
                {
                }
            })
            
        })

    });
    function confirm(id)
    {
        var radio = 'remind-'+id;
        var slector = 'input[name='+radio+']:checked';
        var val = $(slector).val()
        $.ajax({
            'dataType': 'json',
            'type': 'post',
            'data': {"operate": "updateBug", "bugID": id, "bugStatus": val},
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            'success': function(data) {
                if (data.code != 0) {
                    alert('操作失败');
                }
                if (data.code == 0) {
                    alert('操作成功');
                }
            }
        })
        console.log(val);
    }
    function delBug(id)
    {
        $.ajax({
            'dataType': 'json',
            'type': 'post',
            'data': {"operate": "delBug", "bugID": id},
            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
            'success': function(data) {
                if (data.code != 0) {
                    alert('操作失败');
                }
                if (data.code == 0) {
                    alert('操作成功');
                }
            }
        })
    }
</script>
<?php }?><?php }} ?>