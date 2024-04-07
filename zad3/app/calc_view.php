<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Prosty kalkulator</h3>

    <legend>Kalkulator Kredytowy</legend>
    <fieldset>
        <label for="id_x">Kwota kredytu: </label>
        <input id="id_x" type="text" name="x" value="<?php out($kwotaKredytu) ?>" />

        <label for="id_y">Ilość lat: </label>
        <input id="id_y" type="text" name="y" value="<?php out($iloscLat) ?>" />

        <label for="id_op">Oprocentowanie: </label>
        <select name="op">
            <option value="5" <?php outSelectedOprocentowanie($oprocentowanie, 5) ?>>5%</option>  //5 procent
            <option value="10" <?php outSelectedOprocentowanie($oprocentowanie, 10) ?>>10%</option> //10 procent
            <option value="15" <?php outSelectedOprocentowanie($oprocentowanie, 15) ?>>15%</option> //15 procent
            <option value="20" <?php outSelectedOprocentowanie($oprocentowanie, 20) ?>>20%</option>      //20 procent
        </select>

    </fieldset>
    <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />

<div class="messages">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php
//wyświeltenie listy informacji, jeśli istnieją
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>