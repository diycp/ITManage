<table class="table table-striped">
    <caption> </caption>
        <thead>
            <td>ID</td>
            <td>菜单名</td>
            <td>平台</td>
            <td>控制器</td>
            <td>动作</td>
            <td>开启状态</td>
            <td>更新时间</td>
            <td>编辑</td>
            <td>删除</td>
        </thead>
         <?php foreach($list as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['platform'] ? '前台' : '后台'; ?></td>
                <td><?php echo $row['controller']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><?php echo $row['status'] ? '开启' : '关闭'; ?></td>
                <td><?php echo $row['update']; ?></td>
                <td><button type="button" class="btn btn-warning" onclick="edit(<?php echo $row['id']; ?>)">edit</button></td>
                <td><button type="button" class="btn btn-danger del" onclick="del(<?php echo $row['id']; ?>)">del</button></td>
            </tr>
        <?php endforeach; ?>
</table>
<script>
        var menus = <?php echo json_encode(array_column($list, null, 'id'));?>;
</script>