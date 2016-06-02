<div class="ui blue vertical pointing menu">
	<div class="ui center aligned header item">{$username}</div>
	<a class="{if $class eq 'edit_profile'}active {/if}item" href="./edit_profile.php?action=profile">Edytuj profil</a>
	<a class="{if $class eq 'change_password'}active {/if}item" href="./edit_profile.php?action=password">Zmień hasło</a>
	<a class="{if $class eq 'my_content'}active {/if}item" href="./my_content.php">Moje ogłoszenia</a>
	<a class="{if $class eq 'logout'}active {/if}item" href="./logout.php">Wyloguj</a>
</div>