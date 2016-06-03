<?php
/* Smarty version 3.1.29, created on 2016-06-03 23:48:00
  from "C:\xampp\htdocs\pwgielda\inc\add_form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751fb108f9ef2_58628976',
  'file_dependency' => 
  array (
    '6e0e1d977f6a252e394dedd23362c693cc705fb9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\add_form.tpl',
      1 => 1464986357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751fb108f9ef2_58628976 ($_smarty_tpl) {
?>
<form action="./my_content.php" method="post" class="ui form">
	<h2 class="ui centered header">Dodaj ogłoszenie</h2>
	
	<div class="required field">
		<label for="title">Tytuł:</label>
		<input type="text" name="title" id="title" required>
	</div>
	
	<div class="required field">
		<label for="content">Treść:</label>
		<textarea name="content" id="content" required></textarea>
	</div>

	<input type="hidden" name="csrf" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="submit" name="add" value="Dodaj" class="ui button">
</form><?php }
}
