<?php /* Smarty version Smarty-3.1.12, created on 2017-03-12 09:51:27
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/login/login.html" */ ?>
<?php /*%%SmartyHeaderCode:164872666358c51a1f0935d3-36797539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d178d7b7179e94aec50db837196ee162b8dcfff' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/login/login.html',
      1 => 1489312284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164872666358c51a1f0935d3-36797539',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cssURL' => 0,
    'imgURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58c51a1f0b2582_15152188',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c51a1f0b2582_15152188')) {function content_58c51a1f0b2582_15152188($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT项目管理系统平台</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/all.css">
    <style>
        html,body{position: absolute;height: 100%;width: 100%;background: url(<?php echo $_smarty_tpl->tpl_vars['imgURL']->value;?>
/login/back.png) no-repeat}
        .login{margin: 120px 20% 120px 60%;height: 280px;width: 360px;border: 1px solid #b5a9a9; padding: 20px;}
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
                   <td><font size=5em>IT项目管理系统登录</font></td>
               </tr>
               <tr>
                   <td><label for="acc">账号</label><input type="email" id="acc" placeholder="邮箱" name="username"></td>
               </tr>
               <tr>
                   <td><label for="pas">密码</label><input type="password" id="pas" name="password"></td>
               </tr>
               <tr>
                   <td><input type="submit" value="提交"><input type="reset" value="重置"></td>
               </tr>
           </table>
       </form>
    </div>
</body>
</html><?php }} ?>