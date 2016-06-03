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

	<input type="hidden" name="csrf" value="{$csrf}" />
	<input type="submit" name="add" value="Dodaj" class="ui button">
</form>