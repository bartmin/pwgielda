<form action="./edit_profile.php?action=profile" method="post" class="ui form" enctype="multipart/form-data">
	<h3 class="ui header">Edytuj profil</h3>
	
	<div class="field"><label for="email">Email:</label><input type="email" name="email" id="email" value="{$email}" /></div>
	
	<div class="field">
		<label>O mnie:</label>
		<textarea name="about_me">{$about_me}</textarea>
	</div>
	
	<div class="ui grid">
		<div class="six wide column">
			<label>Nowy avatar:</label>
			<input type="file" name="avatar" id="avatar" /></br />
			<div class="ui small label">Awatar może być w formacie JPG, GIF lub PNG.</div>
		</div>
		
		<div class="six wide column">
			{if $avatar neq ''}<img src="./img/avatars/{$avatar}" alt="awatar" />{else}<p>Avatar nie został ustawiony.</p>{/if}
		</div>
	</div>

	<input type="hidden" name="csrf" value="{$csrf}" />
	<input type="submit" name="edit" value="Zapisz" class="ui button" />
</form>