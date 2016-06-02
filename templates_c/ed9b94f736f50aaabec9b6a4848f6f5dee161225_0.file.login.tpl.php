<?php
/* Smarty version 3.1.29, created on 2016-06-01 00:03:22
  from "C:\xampp\htdocs\pwgielda\inc\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574e0a2a00ce05_71498605',
  'file_dependency' => 
  array (
    'ed9b94f736f50aaabec9b6a4848f6f5dee161225' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\login.tpl',
      1 => 1464732194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574e0a2a00ce05_71498605 ($_smarty_tpl) {
?>
<form action="login.php" method="post" class="ui form">
	<div class="field"><label for="login">Login:</label><input type="text" name="login" id="login" autofocus></div>
	<div class="field"><label for="password">Hasło:</label><input type="password" name="password" id="password"></div>
	<input type="submit" class="ui button" value="Zaloguj" />
	<p><a href="register.php">Zarejestruj się</a></p>
</form><?php }
}
