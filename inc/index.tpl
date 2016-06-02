<h1 class="ui centered header">PWGiełda</h1>
{foreach from=$entries item=$entry}
<div class="ui segment">
	<a class="ui blue ribbon label" {if $user_profile} href="show_profile.php?user={$entry['user_id']}" {/if}>{$users[$entry['user_id']]}<br />{date('d-m-Y',$entry['date'])}</a>
	<span class="ui header">{$entry['title']}</span>
	<p></p>
	<p>{$entry['content']}</p>
</div>
{/foreach}