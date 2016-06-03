<div class="ui success message">
  <i class="close icon"></i>
  <div class="header">
    {$success_title}
  </div>
  <ul>
  {foreach from=$success_description item=$i}
		<li>{$i}</li>
	{/foreach}
  </ul>
    {if isset($redirect_hack)}{$redirect_hack}{/if}
</div>