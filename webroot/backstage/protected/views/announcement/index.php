<?php include_once(__DIR__.'/../menu.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">公告信息</a></li>
                <li><a href="#p2" data-toggle="tab">添加公告</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="p1" style="margin-top:20px">

                </div>
                <div class="tab-pane" id="p2">
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <form action="" class="form-horizontal" id="formAdd">
                                <div class="form-group">
                                    <label for="ho-name" class="col-md-2 control-label">主题</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="ho-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-batch" class="col-md-2 control-label">群发邮件</label>
                                    <div class="col-md-8">
                                        <label for="" class="radio-inline"><input type="radio" name="batch" value="1" id="">是</label>
                                        <label for="" class="radio-inline"><input type="radio" name="batch" value="0" id="">否</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ho-text" class="col-md-2 control-label">内容</label>
                                    <div class="col-md-10">
                                        <textarea name="content" id="text-input" oninput="this.editor.update()" rows="10" class="form-control">                    
                                        </textarea>
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="preview" style="margin-top:20px"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-default" id="saveAnnouncement">保存</button>
                                        <button type="button" class="btn btn-default" id="sendAnnouncement">推送</button>
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
           
        <div class="modal-header">修改公告信息</div>
        <div class="modal-body">
            <form action="" class="form-horizontal" id="modal-form">
                <div class="form-group">
                    <label for="modal-ho-name" class="col-md-2 control-label">主题</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="modal-ho-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="modal-ho-batch" class="col-md-2 control-label">群发邮件</label>
                    <div class="col-md-8">
                        <label for="" class="radio-inline"><input type="radio" name="batch" value="1" id="modal-batch-1">是</label>
                        <label for="" class="radio-inline"><input type="radio" name="batch" value="0" id="modal-batch-0">否</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ho-text" class="col-md-2 control-label">内容</label>
                    <div class="col-md-10">
                        <textarea name="content" id="modal-text-input" oninput="this.editor.update()" rows="10" class="form-control">                    
                        </textarea>
                    </div>
                    <div class="col-md-10 col-md-offset-2" id="modal-preview" style="margin-top:20px"></div>
                </div>
                <input type="hidden" name="sign" value="" id="modal-ho-sign">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">
                close
            </button>
            <button class="btn btn-primary" id="modifyAnnouncement">
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
        $("#saveAnnouncement").on('click', function(){
            addAnnouncement(0);
        });
        $('#sendAnnouncement').on('click', function(){
            addAnnouncement(1);
        });
        function addAnnouncement(status) {
            var params = $('#formAdd').serialize();
            var md = $('#preview').html();
            params+= '&operate=add&status='+status+'&md='+md;
            $.ajax({
                'type': 'post',
                'dataType': 'json',
                'data': params,
                'url': '<?php echo $url; ?>',
                'beforeSend': function (){},
                'success': function(data) {
                    if (data.code != 0) {
                        alert(data.message);
                    }
                    if (data.code == 0) {
                        if( confirm('公告添加成功，是否刷新页面？'))
                            location.reload(true);
                    }
                },
                'complete': function(){}
            })
        }

        $("#modifyAnnouncement").on('click', function() {
            var params = $("#modal-form").serialize();
            var md = $('#modal-preview').html();
            md = encodeURI(md);
            $.ajax({
                "type": "post",
                "dataType": "json",
                "data": params+'&operate=modify'+'&md='+md,
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

        function Editor(input, preview) {
            this.update = function () {
            preview.innerHTML = markdown.toHTML(input.value);
            };
            input.editor = this;
            this.update();
        }
        var $md = function (id) { return document.getElementById(id); };
        new Editor($md("text-input"), $md("preview"));
        new Editor($md("modal-text-input"), $md("modal-preview"));

    })
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
    };

    function edit(id) {
        var row = announcements[id];
        var batch = "#modal-batch-"+row['batch'];
        $("#modal-ho-name").val(row['name']);
        $("#modal-ho-sign").val(row['id']);
        $("#modal-text-input").val(row['content']);
        $(batch).attr("checked", "checked");
        $("#modal-preview").text(row['md']);
        $('.modal').modal();
    };
</script>
<script src="<?php echo BASE_PLUGIN_URL;?>/markdown/markdown.js"></script>