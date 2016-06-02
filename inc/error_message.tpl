<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    {$error_title}
  </div>
  <ul class="list">
	{foreach from=$error_description item=$i}
		<li>{$i}</li>
	{/foreach}
  </ul>
</div>