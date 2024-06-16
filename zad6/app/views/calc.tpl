{extends file="main.tpl"}

{block name=logout}
    <li><a href = "{$conf->action_url}logout">Wyloguj</a></li>
{/block}

{block name=content}


<h3>Oblicz swoją ratę</h3>
<div class="row gtr-uniform gtr-50">
  <div class="col-6 col-12-mobilep">
      <form method="post" action="{$conf->action_root}calcCompute">
      <label for="id_kwota">Kwota: </label>
      <input id="id_kwota" type="text" name="kwota" /><br />
      <label for="id_raty">Ilość Lat: </label>
      <input id="id_raty" type="text" name="raty" /><br />
      <label for="id_procent">Oprocentowanie: </label>
      <input id="id_procent" type="text" name="procent" /><br />
      <input type="submit" value="Oblicz" />
    </form>
  </div>
  <div class="col-6 col-12-mobilep">
    {* wyświeltenie listy błędów, jeśli istnieją *} 
          {include file='messages.tpl'}
    {if (isset($result))}
    <div style="margin: 2em auto; padding: 2em auto; border-radius: 5px; background-color: #ff0;">
      Wynik: {round($result, 2)}
    </div>
    {/if}
  </div>
</div>
    
{/block}