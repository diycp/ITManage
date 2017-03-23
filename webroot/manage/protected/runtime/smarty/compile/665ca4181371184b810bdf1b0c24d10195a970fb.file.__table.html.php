<?php /* Smarty version Smarty-3.1.12, created on 2017-03-23 13:37:10
         compiled from "/home/itmanage/ITManage/webroot/manage/protected/views/project/__table.html" */ ?>
<?php /*%%SmartyHeaderCode:13644252558d3cf86edc7e9-21287819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '665ca4181371184b810bdf1b0c24d10195a970fb' => 
    array (
      0 => '/home/itmanage/ITManage/webroot/manage/protected/views/project/__table.html',
      1 => 1490262175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13644252558d3cf86edc7e9-21287819',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fdName' => 0,
    'fdNickName' => 0,
    'fdTimeStart' => 0,
    'fdTimeEnd' => 0,
    'fdDesc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58d3cf86f20b18_42788849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3cf86f20b18_42788849')) {function content_58d3cf86f20b18_42788849($_smarty_tpl) {?><div class="row" style="margin-top:20px">
    <div class="col-md-10">
        <blockquote>
            <?php echo $_smarty_tpl->tpl_vars['fdName']->value;?>

        </blockquote>
    </div>
</div>
<div class="row">
    <dvi class="col-md-2">组长：<?php echo $_smarty_tpl->tpl_vars['fdNickName']->value;?>
</dvi>
    <div class="col-md-3">开始时间：<?php echo $_smarty_tpl->tpl_vars['fdTimeStart']->value;?>
</div>
    <div class="col-md-3">结束时间：<?php echo $_smarty_tpl->tpl_vars['fdTimeEnd']->value;?>
</div>
</div>
<hr>
<div class="row">
    <div class="col-md-10">
        <blockquote>
            <h5><?php echo $_smarty_tpl->tpl_vars['fdDesc']->value;?>
</h5>
        </blockquote>
    </div>
</div>
<?php }} ?>