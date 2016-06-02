<?php
/* Smarty version 3.1.29, created on 2016-05-30 22:50:05
  from "C:\xampp\htdocs\pwgielda\inc\change_password.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574ca77d0282f4_58967644',
  'file_dependency' => 
  array (
    '14862578274527e33655affe64c825392ef67b0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\change_password.tpl',
      1 => 1464637388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574ca77d0282f4_58967644 ($_smarty_tpl) {
?>
<form action="./edit_profile.php?action=password" method="post" class="ui form">
	<h3 class="ui header">Zmień hasło</h3>

	<div class="field">
		<label for="password">Aktualne hasło:</label>
		<input type="password" name="password" id="password">
	</div>
	
	<div class="field">
		<label for="new_password">Nowe hasło:</label>
		<input type="password" name="new_password" id="new_password">
	</div>
	
	<div class="field">
		<label for="new_password2">Powtórz nowe hasło:</label>
		<input type="password" name="new_password2" id="new_password2">
	</div>
	
	<input type="submit" name="change" value="Zmień hasło" class="ui button" />
</form><?php }
}
