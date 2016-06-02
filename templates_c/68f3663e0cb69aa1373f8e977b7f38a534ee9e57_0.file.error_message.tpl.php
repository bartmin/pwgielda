<?php
/* Smarty version 3.1.29, created on 2016-05-30 20:59:30
  from "C:\xampp\htdocs\pwgielda\inc\error_message.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574c8d9262d491_20464478',
  'file_dependency' => 
  array (
    '68f3663e0cb69aa1373f8e977b7f38a534ee9e57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\error_message.tpl',
      1 => 1464634763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574c8d9262d491_20464478 ($_smarty_tpl) {
?>
<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    <?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>

  </div>
  <ul class="list">
	<?php
$_from = $_smarty_tpl->tpl_vars['error_description']->value;
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
</div><?php }
}
