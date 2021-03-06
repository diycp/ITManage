<table class="table table-striped">
    <caption> </caption>
        <thead id="tableHead">
            <td>ID</td>
            <td>昵称</td>
            <td>帐号</td>
            <td>职位</td>
            <td>更新时间</td>
            <td>编辑</td>
            <td>删除</td>
        </thead>
        <?php foreach($list as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nickname']; ?></td>
                <td><?php echo $row['account']; ?></td>
                <td><?php echo $row['career']; ?></td>
                <td><?php echo $row['update']; ?></td>
                <td><button type="button" class="btn btn-warning" onclick="edit(<?php echo $row['id']; ?>)">edit</button></td>
                <td><button type="button" class="btn btn-danger del" onclick="del(<?php echo $row['id']; ?>)">del</button></td>
            </tr>
        <?php endforeach; ?>
</table>
<script>
        var users = <?php echo json_encode(array_column($list, null, 'id'));?>;
</script>