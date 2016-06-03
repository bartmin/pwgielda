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
</form>