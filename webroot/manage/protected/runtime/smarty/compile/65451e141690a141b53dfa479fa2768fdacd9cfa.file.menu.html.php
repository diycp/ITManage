<?php /* Smarty version Smarty-3.1.12, created on 2017-03-21 02:22:06
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:136869973958d08e4e85c264-07996056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65451e141690a141b53dfa479fa2768fdacd9cfa' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/menu.html',
      1 => 1490009942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136869973958d08e4e85c264-07996056',
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
  'unifunc' => 'content_58d08e4e869769_59017398',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d08e4e869769_59017398')) {function content_58d08e4e869769_59017398($_smarty_tpl) {?><div id="top" style="height:92px" role="navigation">
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