{extends file="main.tpl"}



{block name=content}
    <h3>Zaloguj się do systemu</h3>
<div class="row gtr-uniform gtr-50">
    <div class="col-6 col-12-mobilep">
        <form action="{$conf->action_url}login" method="post">
                <label for="id_login">login: </label>
                <input id="id_login" type="text" name="login"/>
                <label for="id_pass">pass: </label>
                <input id="id_pass" type="password" name="pass" /><br />
                <input type="submit" value="zaloguj"/>
        </form>
    </div>
    <div class="col-6 col-12-mobilep">
        {include file='messages.tpl'}
    </div>
</div>


{/block}

{extends file="main.tpl"}
