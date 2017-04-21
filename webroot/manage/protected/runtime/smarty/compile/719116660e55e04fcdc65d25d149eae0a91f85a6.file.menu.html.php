<?php /* Smarty version Smarty-3.1.12, created on 2017-04-21 18:57:53
         compiled from "D:\php\project\itmanage\webroot\manage\protected\views\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:699658f9e5b11b0444-77673414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719116660e55e04fcdc65d25d149eae0a91f85a6' => 
    array (
      0 => 'D:\\php\\project\\itmanage\\webroot\\manage\\protected\\views\\menu.html',
      1 => 1492763847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '699658f9e5b11b0444-77673414',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller' => 0,
    'data' => 0,
    'row' => 0,
    'career' => 0,
    'nickname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58f9e5b11caa32_50157112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f9e5b11caa32_50157112')) {function content_58f9e5b11caa32_50157112($_smarty_tpl) {?><div id="top" style="height:92px" role="navigation">
        <nav class="navbar navbar-custom">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li <?php if (($_smarty_tpl->tpl_vars['controller']->value=='home')){?>class="nav-current"<?php }?>><a href="index.php">Home</a></li>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <li <?php if (($_smarty_tpl->tpl_vars['controller']->value==$_smarty_tpl->tpl_vars['row']->value['tag'])){?>class="nav-current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</a></li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><?php echo $_smarty_tpl->tpl_vars['career']->value;?>
&nbsp;:&nbsp;<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
</a></li>
                        <li><a href="index.php?r=login/logout">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div><?php }} ?>