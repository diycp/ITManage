<?php include_once(__DIR__.'/../menu.php');?>
<div class="container" id="p1">

</div>
<script>
    $(function() {
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
                if (data.code != 0) {
                    $('#p1').append('<p class="text-center">暂无数据</p>');
                }
                if (data.code == 0) {
                    $('#p1').append(data['data']);
                }
            },
            "complete": function()
            {
                console.log('complete');
            }   
        })
    })
</script>