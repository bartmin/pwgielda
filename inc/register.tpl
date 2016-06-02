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
		<input type="text" name="login" id="login" value="{$login}">
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
		<input type="email" name="email" id="email" value="{$email}">
	</div>
	
	<div class="required field">
		<label for="email2">Powtórz email:</label>
		<input type="email" name="email2" id="email2" value="{$email2}">
	</div>
	
	<input type="submit" name="register" value="Zarejestruj" class="ui primary button" />
</form>