{if $msgs->isError()}
<div>
	<ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #f88;">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
{if $msgs->isInfo()}
<div>
	<ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #8f8;">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
