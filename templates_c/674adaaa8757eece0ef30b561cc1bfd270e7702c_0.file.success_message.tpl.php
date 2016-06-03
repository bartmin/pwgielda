<?php
/* Smarty version 3.1.29, created on 2016-06-03 21:39:08
  from "C:\xampp\htdocs\pwgielda\inc\success_message.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751dcdccb2289_41927964',
  'file_dependency' => 
  array (
    '674adaaa8757eece0ef30b561cc1bfd270e7702c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\success_message.tpl',
      1 => 1464982739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751dcdccb2289_41927964 ($_smarty_tpl) {
?>
<div class="ui success message">
  <i class="close icon"></i>
  <div class="header">
    <?php echo $_smarty_tpl->tpl_vars['success_title']->value;?>

  </div>
  <ul>
  <?php
$_from = $_smarty_tpl->tpl_vars['success_description']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_i_0_saved_item = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['i']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
$__foreach_i_0_saved_local_item = $_smarty_tpl->tpl_vars['i'];
?>
		<li><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</li>
	<?php
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_local_item;
}
if ($__foreach_i_0_saved_item) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_item;
}
?>
  </ul>
    <?php if (isset($_smarty_tpl->tpl_vars['redirect_hack']->value)) {
echo $_smarty_tpl->tpl_vars['redirect_hack']->value;
}?>
</div><?php }
}
