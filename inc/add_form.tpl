<form action="./my_content.php" method="post" class="ui form">
	<h3 class="ui header">Dodaj ogłoszenie</h3>
	
	<div class="required field">
		<label for="title">Tytuł:</label>
		<input type="text" name="title" id="title" required>
	</div>
	
	<div class="required field">
		<label for="content">Treść:</label>
		<textarea name="content" id="content" required></textarea>
	</div>

	<input type="hidden" name="csrf" value="{$csrf}" />
	<input type="submit" name="add" value="Dodaj" class="ui button">
</form>