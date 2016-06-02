<?php
/* Smarty version 3.1.29, created on 2016-05-31 20:48:43
  from "C:\xampp\htdocs\pwgielda\inc\success_message.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574ddc8b8ac081_55113702',
  'file_dependency' => 
  array (
    '674adaaa8757eece0ef30b561cc1bfd270e7702c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\success_message.tpl',
      1 => 1464720519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574ddc8b8ac081_55113702 ($_smarty_tpl) {
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
</div><?php }
}
