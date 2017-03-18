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
                <td><button type="button" class="btn btn-warning">edit</button></td>
                <td><button type="button" class="btn btn-danger">del</button></td>
            </tr>
        <?php endforeach; ?>
</table>