<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
	<label for="id_x">kwota kredytu: </label>
    <br/>
	<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>" />
    <br/>
	<label for="id_y">ilość lat: </label>
    <br/>
	<input id="id_y" type="text" name="y" value="<?php if (isset($y)) print($y); ?>" />
    <br/><br/>
    <label for="id_op">Oprocentowanie: </label>
    <select name="op">
        <option value="5" <?php if (isset($operation)) if ($operation == '5') print('selected'); ?>>5%</option>  //5 procent
        <option value="10" <?php if (isset($operation)) if ($operation == '10') print('selected'); ?>>10%</option> //10 procent
        <option value="15" <?php if (isset($operation)) if ($operation == '15') print('selected'); ?>>15%</option> //15 procent
        <option value="20" <?php if (isset($operation)) if ($operation == '20') print('selected'); ?>>20%</option>      //20 procent
    </select>
    <br/>
    <br/>
	<input type="submit" value="Oblicz ratę" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Rata miesięczna: '.$result; ?>
</div>
<?php } ?>

</body>
</html>