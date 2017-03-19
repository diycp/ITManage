<?php include_once(__DIR__.'/../menu.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">菜单信息</a></li>
                <li><a href="#p2" data-toggle="tab">添加菜单</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">
                      
                </div>
                <div class="tab-pane" id="p2">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAdd">
                                <div class="form-group">
                                    <label for="ho-name" class="col-md-2 control-label">菜单名</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="ho-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-login" class="col-md-2 control-label">平台</label>
                                    <div class="col-md-8">
                                        <label for="" class="radio-inline"><input type="radio" name="platform" value="1" id="">前台</label>
                                        <label for="" class="radio-inline"><input type="radio" name="platform" value="0" id="">后台</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-controller" class="col-md-2 control-label">控制器</label>
                                    <div class="col-md-10">
                                        <input type="text" name="controller" id="ho-controller" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-action" class="col-md-2 control-label">动作名</label>
                                    <div class="col-md-10">
                                        <input type="text" name="action" id="ho-action" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-status" class="col-md-2 control-label">开启状态</label>
                                    <div class="col-md-8">
                                        <label for="" class="radio-inline"><input type="radio" name="status" value="1" id="">开启</label>
                                        <label for="" class="radio-inline"><input type="radio" name="status" value="0" id="">关闭</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-default" id="addMenu">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="p3">tab-pane-3</div>
                <div class="tab-pane" id="p4">tab-pane-4</div>
           
            </div>
        </div>
    </div>
</div>
<div class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           
        <div class="modal-header">修改用户信息</div>
        <div class="modal-body">
            <form action="" class="form-horizontal" id="modal-form">
                <div class="form-group">
                    <label for="ho-name" class="col-md-2 control-label">菜单名</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="modal-ho-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ho-login" class="col-md-2 control-label">平台</label>
                    <div class="col-md-8">
                        <label for="" class="radio-inline"><input type="radio" name="platform" value="1" id="modal-platform-1">前台</label>
                        <label for="" class="radio-inline"><input type="radio" name="platform" value="0" id="modal-platform-0">后台</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ho-controller" class="col-md-2 control-label">控制器</label>
                    <div class="col-md-10">
                        <input type="text" name="controller" id="modal-ho-controller" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ho-action" class="col-md-2 control-label">动作名</label>
                    <div class="col-md-10">
                        <input type="text" name="action" id="modal-ho-action" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ho-status" class="col-md-2 control-label">开启状态</label>
                    <div class="col-md-8">
                        <label for="" class="radio-inline"><input type="radio" name="status" value="1" id="modal-status-1">开启</label>
                        <label for="" class="radio-inline"><input type="radio" name="status" value="0" id="modal-status-0">关闭</label>
                    </div>
                </div>
                <input type="hidden" name="sign" value="" id="modal-ho-sign">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">
                close
            </button>
            <button class="btn btn-primary" id="modifyMenu">
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
        $("#addMenu").on('click', function() {
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
                        if( confirm('菜单添加成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                "complete": function() {}
            })
        });
        $("#modifyMenu").on('click', function() {
            var params = $("#modal-form").serialize();
            $.ajax({
                "type": "post",
                "dataType": "json",
                "data": params+'&operate=modify',
                "url": "<?php echo $url;?>",
                "beforeSend": function() {},
                "success": function(data) {
                    if (data.code != 0) {
                        alert(data.message);
                    }
                    if (data.code == 0) {
                        if( confirm('菜单编辑成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                "complete": function() {}
            })
        })
    });
    function edit(id) {
        var row = menus[id];
        var platform = "#modal-platform-"+row['platform'];
        var status = "#modal-status-"+row['status'];
        $("#modal-ho-name").val(row['name']);
        $("#modal-ho-controller").val(row['controller']);
        $("#modal-ho-sign").val(row['id']);
        $("#modal-ho-action").val(row['action']);
        $(platform).attr("checked", "checked");
        $(status).attr("checked", "checked");
        $('.modal').modal();
    };
    function del(id) {
        var sign = id;
        if (confirm("该操作无法撤销，是否确认删除？")) {
            $.ajax({
                "type": "post",
                "dataType": 'json',
                "data": "operate=del&sign="+sign,
                "url": "<?php echo $url;?>",
                "beforeSend": function() {},
                "success": function(data) {
                    if (data.code != 0) {
                        alert(data.message);
                    }
                    if (data.code == 0) {
                        if( confirm('菜单删除成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                "complete": function() {}
            })
        }
    }
</script>