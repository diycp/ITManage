<div class="panel-group">
    <?php foreach($list as $row): ?>
    <div class="panel panel-default">
        <div class="panel-heading" data-toggle="collapse" data-target="#coll<?php echo $row['id'];?>">
            <?php echo $row['name']; ?>
            
            <div class="btn-group" style="float:right;">
                <button class="btn  dropdown-toggle" data-toggle="dropdown" style="background-color: #f5f5f5;padding:0;">
                    操作
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                <?php if(!$row['sent']):?>
                    <li><a href="javascript:;"  onclick="edit(<?php echo $row['id']; ?>)">编辑</a></li>
                    <li><a href="javascript:;"  onclick="send(<?php echo $row['id']; ?>)">推送</a></li>
                <?php endif;?>
                    <li><a href="javascript:;"  onclick="del(<?php echo $row['id']; ?>)">删除</a></li>
                </ul>
            </div>
        </div>
        <div class="panel-collapse collapse" id="coll<?php echo $row['id'];?>">
            <div class="panel-body">
                <div>操作者：<?php echo $row['operator'];?> &nbsp; 时间：<?php echo $row['update'];?></div>
                <?php echo $row['md']; ?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<script>
        var announcements = <?php echo json_encode(array_column($list, null, 'id'));?>;
</script>