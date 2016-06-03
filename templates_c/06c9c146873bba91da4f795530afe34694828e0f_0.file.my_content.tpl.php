<?php
/* Smarty version 3.1.29, created on 2016-06-03 22:39:02
  from "C:\xampp\htdocs\pwgielda\inc\my_content.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751eae608ae76_58576589',
  'file_dependency' => 
  array (
    '06c9c146873bba91da4f795530afe34694828e0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\my_content.tpl',
      1 => 1464986341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751eae608ae76_58576589 ($_smarty_tpl) {
?>
<h2 class="ui centered header">Moja zawartość</h2>

<div class="ui secondary  menu">
	<div class="right menu">
		<a href="./my_content.php?action=add">
		<button class="ui primary button ">Dodaj</button>
		</a>
	</div>
</div>

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
	<div class="ui grid">
		<div class="ten wide column">
			<h4 class="ui header"><?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
</h4>
		</div>
		<div class="right aligned six wide column">
			<a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value['edit_link'];?>
" class="ui label">
				<i class="edit icon"></i>
				<span>Edytuj</span>
			</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value['remove_link'];?>
" class="ui red basic label">
				<i class="ban icon"></i>
				<span>Usuń</span>
			</a>
		</div>
	</div>
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
