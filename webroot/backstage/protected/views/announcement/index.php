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
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading" data-toggle="collapse" data-target="#coll1">
                                heading-1
                                <div class="btn-group" style="float:right;">
                                    <button class="btn  dropdown-toggle" data-toggle="dropdown" style="background-color: #f5f5f5;padding:0;">
                                        操作
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="">编辑</a></li>
                                        <li><a href="">推送</a></li>
                                        <li><a href="">删除</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-collapse collapse" id="coll1">
                                <div class="panel-body">
                                    <div>操作者：hello&nbsp;world &nbsp; 时间：2017-03-03</div>
                                    body-1
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading" data-toggle="collapse" data-target="#coll2">heading-2</div>
                            <div class="panel-collapse collapse" id="coll2">
                                <div class="panel-body">body-2</div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading" data-toggle="collapse" data-target="#coll3">heading-3</div>
                            <div class="panel-collapse collapse" id="coll3">
                                <div class="panel-body">body-3</div>
                            </div>
                        </div>
                    </div>
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
                                        <textarea name="" id="ho-text" rows="10" class="form-control">                    
                                        </textarea>
                                    </div>
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