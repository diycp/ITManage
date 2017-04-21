<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 17:23:37
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\board\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1819458f9cf9986a098-51933862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '393f9188c2e26486ed75d4c564fc8300f08c5c3f' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\board\\index.html',
      1 => 1492765152,
      2 => 'file',
    ),
    'd00beddddd1e60b9ce1f94531ca9439e38a07328' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\layouts\\itlayout.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1819458f9cf9986a098-51933862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cssURL' => 0,
    'jsURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58f9cf998dcd66_54740823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9cf998dcd66_54740823')) {function content_58f9cf998dcd66_54740823($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT管理系统</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
/menu/menu.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['jsURL']->value;?>
/jquery.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['jsURL']->value;?>
/bootstrap.min.js"></script>
    
</head>
<body>
    <?php echo $_smarty_tpl->getSubTemplate ('../menu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['row']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['row']->index++;
 $_smarty_tpl->tpl_vars['row']->first = $_smarty_tpl->tpl_vars['row']->index === 0;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['row']->first){?>class="active"<?php }?>><a href="#p<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" class=" protab" data-pid="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['row']->value['fdName'];?>
</a></li>
                <?php } ?>
            </ul>
            
            <div class="tab-content">
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['row']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['row']->index++;
 $_smarty_tpl->tpl_vars['row']->first = $_smarty_tpl->tpl_vars['row']->index === 0;
?>
                    <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['row']->first){?>active<?php }?>" id="p<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var cache = [];
        <?php if (!empty($_smarty_tpl->tpl_vars['project']->value[0]["id"])){?>
        $.ajax({
            'type': 'post',
            'dataType': 'json',
            'data': {"id":'<?php echo $_smarty_tpl->tpl_vars['project']->value[0]["id"];?>
'},
            'url': '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
            'beforeSend': function (){
            },
            'success': function(data) {
                var element = '#p'+'<?php echo $_smarty_tpl->tpl_vars['project']->value[0]["id"];?>
';
                $(element).empty();
                if (data.code != 0) {
                    $(element).append('<p class="text-center">暂无数据</p>');
                }
                if (data.code == 0) {
                    $(element).append(data['data']);
                    cache[id] = data['data'];
                }
            },
            'complete': function(){}
        })
        <?php }else{ ?>
        var element = '.tab-content';
        $(element).empty();
        $(element).append('<p class="text-center">暂无数据</p>');
        <?php }?>
        $('.protab').on('click', function () {
            var id = $(this).attr('data-pid');
            var element = '#p'+id;
            if (cache[id] == null) {
                $.ajax({
                    'type': 'post',
                    'dataType': 'json',
                    'data': {"id":id},
                    'url': '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
                    'beforeSend': function (){
                    },
                    'success': function(data) {
                        $(element).empty();
                        if (data.code != 0) {
                            $(element).append('<p class="text-center">暂无数据</p>');
                        }
                        if (data.code == 0) {
                            $(element).append(data['data']);
                            cache[id] = data['data'];
                        }
                    },
                    'complete': function(){}
                })
            }
        })
    });

</script>

    
</body>
</html><?php }} ?>