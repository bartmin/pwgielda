<?php
/* Smarty version 3.1.29, created on 2016-05-31 19:29:27
  from "C:\xampp\htdocs\pwgielda\inc\register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574dc9f77e0c93_57877265',
  'file_dependency' => 
  array (
    '68b8fb9fea6df147e7388682fafa573c20187207' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pwgielda\\inc\\register.tpl',
      1 => 1464715762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574dc9f77e0c93_57877265 ($_smarty_tpl) {
?>
<h2 class="ui centered header">Rejestracja</h2>
<div class="ui horizontal divider">
	<h3 class="ui centered header">Masz już konto? Zaloguj się:</h3>
</div>
<form action="./login.php" class="ui centered form" method="post">
	<div class="inline fields">
		<div class="six wide field">
			<label for="login">Login:</label>
			<input type="text" name="login" id="login">
		</div>
		
		<div class="six wide field">
			<label for="password">Hasło:</label>
			<input type="password" name="password" id="password">
		</div>
		
		<input type="submit" value="Zaloguj" class="ui primary button" />
	</div>
</form>
<div class="ui horizontal divider">
	<h3 class="ui centered header">Nie masz jeszcze konta? Dołącz już dziś!</h3>
</div>
<form action="./register.php" method="post" class="ui form">
	<div class="required field">
		<label for="login">Login:</label>
		<small>Max. 100 znaków.</small><br />
		<input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
">
	</div>
	
	<div class="required field">
		<label for="password">Hasło:</label>
		<input type="password" name="password" id="password">
	</div>
	
	<div class="required field">
		<label for="password2">Powtórz hasło:</label>
		<input type="password" name="password2" id="password2">
	</div>
	
	<div class="required field">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
	</div>
	
	<div class="required field">
		<label for="email2">Powtórz email:</label>
		<input type="email" name="email2" id="email2" value="<?php echo $_smarty_tpl->tpl_vars['email2']->value;?>
">
	</div>
	
	<input type="submit" name="register" value="Zarejestruj" class="ui primary button" />
</form><?php }
}
