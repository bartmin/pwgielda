<?php
/* Smarty version 3.1.29, created on 2016-06-03 21:27:07
  from "C:\xampp\htdocs\pwgielda\inc\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751da0b0c6449_11273818',
  'file_dependency' => 
  array (
    '123c2840531f9a8b2065a601c50b5d261dc8e9b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\index.tpl',
      1 => 1464981678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751da0b0c6449_11273818 ($_smarty_tpl) {
?>
<h1 class="ui centered header">PWGiełda</h1>
<?php
$_from = $_smarty_tpl->tpl_vars['entries']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_0_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_0_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
<div class="ui segment">
	<a class="ui blue ribbon label"><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->tpl_vars['entry']->value['user_id']];?>
<br /><?php echo date('d-m-Y',$_smarty_tpl->tpl_vars['entry']->value['date']);?>
</a>
	<span class="ui header"><?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
</span>
	<p></p>
	<p><?php echo $_smarty_tpl->tpl_vars['entry']->value['content'];?>
</p>
</div>
<?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_0_saved_local_item;
}
if ($__foreach_entry_0_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_0_saved_item;
}
}
}
