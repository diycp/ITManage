<?php include_once(__DIR__.'/../menu.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">用户信息</a></li>
                <li><a href="#p2" data-toggle="tab">添加用户</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">
                       
                </div>
                <div class="tab-pane" id="p2">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAdd">
                                <div class="form-group">
                                    <label for="ho-nickname" class="col-md-2 control-label">昵称</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nickname" id="ho-nickname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-login" class="col-md-2 control-label">帐号</label>
                                    <div class="col-md-10">
                                        <input type="email" name="account" id="ho-login" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-pass" class="col-md-2 control-label">密码</label>
                                    <div class="col-md-10">
                                        <input type="text" name="password" id="ho-pass" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-career" class="col-md-2 control-label">职位</label>
                                    <div class="col-md-10">
                                        <select name="career" id="ho-career" class="form-control">
                                            <option value="1">管理员</option>
                                            <option value="2">产品经理</option>
                                            <option value="3">开发人员</option>
                                            <option value="4">测试员</option>
                                        </select>
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
<div class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           
        <div class="modal-header">修改用户信息</div>
        <div class="modal-body">
            <form action="" class="form-horizontal">
                <div class="form-group">
                    <label for="modal-ho-nickname" class="col-md-2 control-label">昵称</label>
                    <div class="col-md-10">
                        <input type="text" id="modal-ho-nickname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="modal-ho-account" class="col-md-2 control-label">帐号</label>
                    <div class="col-md-10">
                        <input type="text" id="modal-ho-account" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="modal-ho-career" class="col-md-2 control-label">职位</label>
                    <div class="col-md-10">
                        <select name="career" id="modal-ho-career" class="form-control">
                            <option value="1">管理员</option>
                            <option value="2">产品经理</option>
                            <option value="3">开发人员</option>
                            <option value="4">测试员</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="sign" value="" id="modal-ho-sign">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">
                close
            </button>
            <button class="btn btn-primary">
                submit
            </button>
        </div>
       </div>
    </div>
</div>
<script>
    $(function(){
        $.ajax({
            "dataType": "json",
            "type": "post",
            "data": {"operate": "list"},
            "url": "<?php echo $url;?>",
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
                console.log('complete');
            }
        });
        $("#addUser").on('click', function() {
            var params = $("#formAdd").serialize();
            $.ajax({
                "type": "post",
                "dataType": "json",
                "data": params+'&operate=add',
                "url": "<?php echo $url;?>",
                "beforeSend": function() {},
                "success": function(data) {
                    if (data.code != 0) {
                        alert(data.message);
                    }
                    if (data.code == 0) {
                        if( confirm('用户添加成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                "complete": function() {}
            })
        });
    })
    function edit(id) {
        console.log(users[id]);
        var user = users[id];
        $("#modal-ho-nickname").val(user['nickname']);
        $("#modal-ho-account").val(user['account']);
        $("#modal-ho-sign").val(user['id']);
        $("#modal-ho-career").val(user['type']);
        $('.modal').modal();
    }
</script>