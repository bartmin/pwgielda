<h2 class="ui centered header">Moja zawartość</h2>

<div class="ui secondary  menu">
	<div class="right menu">
		<a href="./my_content.php?action=add">
		<button class="ui primary button ">Dodaj</button>
		</a>
	</div>
</div>

{foreach from=$entries item=$entry}
<div class="ui segment">
	<div class="ui grid">
		<div class="ten wide column">
			<h4 class="ui header">{$entry['title']}</h4>
		</div>
		<div class="right aligned six wide column">
			<a href="{$entry['edit_link']}" class="ui label">
				<i class="edit icon"></i>
				<span>Edytuj</span>
			</a>
			<a href="{$entry['remove_link']}" class="ui red basic label">
				<i class="ban icon"></i>
				<span>Usuń</span>
			</a>
		</div>
	</div>
	<p></p>
	<p>{$entry['content']}</p>
</div>
{/foreach}