<?php include_once(__DIR__.'/../menu.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#p1" data-toggle="tab">用户信息</a></li>
                <li><a href="#p2" data-toggle="tab">添加用户</a></li>
                <li><a href="#p3" data-toggle="tab">添加用户</a></li>
                <li><a href="#p4" data-toggle="tab">编辑用户</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="p1">
                     <table class="table table-striped">
                        <caption> </caption>
                            <thead>
                                <td>昵称</td>
                                <td>帐号</td>
                                <td>职位</td>
                                <td>编辑</td>
                                <td>删除</td>
                            </thead>
                            <tr>
                                <td>td1</td>
                                <td>td2</td>
                                <td>td3</td>
                                <td>td3</td>
                                <td>td3</td>
                            </tr>
                            <tr>
                                <td>td1</td>
                                <td>td2</td>
                                <td>td3</td>
                                <td>td3</td>
                                <td>td3</td>
                            </tr>
                            <tr>
                                <td>td1</td>
                                <td>td2</td>
                                <td>td3</td>
                                <td>td3</td>
                                <td>td3</td>
                            </tr>
                    </table>    
                </div>
                <div class="tab-pane" id="p2">tab-pane-2</div>
                <div class="tab-pane" id="p3">tab-pane-3</div>
                <div class="tab-pane" id="p4">tab-pane-4</div>
           
            </div>
        </div>
    </div>
</div>