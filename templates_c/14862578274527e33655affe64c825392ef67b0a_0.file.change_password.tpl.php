<?php
/* Smarty version 3.1.29, created on 2016-06-03 22:38:54
  from "C:\xampp\htdocs\pwgielda\inc\change_password.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5751eade29c656_76309936',
  'file_dependency' => 
  array (
    '14862578274527e33655affe64c825392ef67b0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\change_password.tpl',
      1 => 1464986331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5751eade29c656_76309936 ($_smarty_tpl) {
?>
<form action="./edit_profile.php?action=password" method="post" class="ui form">
	<h2 class="ui centered header">Zmień hasło</h2>

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
