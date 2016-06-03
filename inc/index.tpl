<h2 class="ui centered header">PWGiełda</h2>

<div class="ui feed">
	{foreach from=$entries item=$entry}
		<div class="event">
			<div class="label">
				<img class="ui medium right spaced avatar image" src="./img/avatars/{$entry['avatar']}" />
			</div>
			<div class="content">
				<div class="summary">
					<a>{$users[$entry['user_id']]}</a>: {$entry['title']} <div class="date">{date('d-m-Y',$entry['date'])} o {date('h-i')}</div>
				</div>
				<div class="extra text">
					{$entry['content']}
				</div>
			</div>
		</div>
	{/foreach}
</div>

<!--
<h1 class="ui centered header">PWGiełda</h1>
{foreach from=$entries item=$entry}
<div class="ui segment">
	<a class="ui blue ribbon label">
		<img class="ui medium right spaced avatar image" src="./img/avatars/{$entry['avatar']}" />
		{$users[$entry['user_id']]}
	</a>
	<span class="ui header">{$entry['title']}</span>
	<p>{date('d-m-Y',$entry['date'])}</p>
	<p></p>
	<p>{$entry['content']}</p>
</div>
{/foreach}
-->