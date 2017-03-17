<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统平台</title>
    <link rel="stylesheet" href="<?php echo BASE_CSS_URL;?>/all.css">
    <script src="<?php echo BASE_JS_URL; ?>/jquery.min.js"></script>
    <style>
        html,body{position: absolute;height: 100%;width: 100%;background: url(<?php echo BASE_IMG_URL; ?>/login/21017.jpg) no-repeat}
        .login{margin: 120px auto;height: 280px;width: 360px;border: 1px solid #b5a9a9; padding: 20px;}
        table{margin: auto}
        tr td{text-align: center; margin-top: 2px; margin-bottom: 12px;border-bottom: 1px solid #cec5c5;padding: 4px; }
        
        input{margin: 4px;padding: 4px;transition: padding .25s}
        #pas:focus,#acc:focus{padding-right: 60px}
    </style>
</head>
<body>
    <div class="login">
       <form action="" method="post">
           <table>
               <tr>
                   <td><font size=5em>后台管理系统登录</font></td>
               </tr>
               <tr>
                   <td><label for="acc">账号</label><input type="email" id="acc" placeholder="邮箱" name="account"></td>
               </tr>
               <tr>
                   <td><label for="pas">密码</label><input type="password" id="pas" name="password"></td>
               </tr>
               <tr>
                   <td><input type="submit" value="提交" name="submit" class="submit"><input type="reset" value="重置"></td>
               </tr>
           </table>
       </form>
    </div>
</body>
<script>
    $(function(){
        $(".submit").on('click', function(){
            var data = $('form').serialize();
            $.ajax(
                {
                    type:"post",
                    dataType:"json",
                    data:data,
                    url:"<?php echo BASE_URL;?>index.php?r=login/validate",
                    success:function(msg){
                        if(msg.code != 0) {
                            alert(msg.message);
                        } else if(msg.code == 0) {
                            window.location.href = '<?php echo $url;?>';
                        }
                    } 
                }
            )
            return false;
        })
    })
</script>
</html>