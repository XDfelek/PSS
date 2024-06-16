<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

// 1. pobranie parametrów
function getParams(&$kwota, &$raty, &$procent){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$raty = isset($_REQUEST['raty']) ? $_REQUEST['raty'] : null;
	$procent = isset($_REQUEST['procent']) ? $_REQUEST ['procent'] : null;
}

// 2. walidacja parametrów

function checkParams(&$kwota, &$raty, &$procent, &$messages, &$info){
// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($raty) && isset($procent))) {
		//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		return false;
	}

	$info[] = "Parametry podane.";

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty.';
	}
	if ( $raty == "") {
		$messages [] = 'Nie podano ilosci rat.';
	}
	if ( $procent == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	if(count ( $messages ) != 0) return false;
		
	// sprawdzenie, czy $kwota, $raty i $procent są liczbami
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą.';
	}

	if (! is_numeric( $raty )){
		$messages [] = 'Ilość lat nie jest liczbą.';
	}
	
	if (! is_numeric( $procent )) {
		$messages [] = 'Oprocentowanie nie jest liczbą.';
	}

	if(count ( $messages ) != 0) return false;
	else {
		$info[] = "Parametry poprawne, wykonuję obliczenia";
		return true;}
}

function calcPayment(&$kwota, &$raty, &$procent) {
	
	//konwersja parametrów na double
	$kwota = doubleval($kwota);
	$raty = doubleval($raty);
	$procent = doubleval($procent);
	
	//wykonanie operacji
	return ($kwota/($raty*12))*(1+$procent/100);
}

// Inicjacja zmiennych

$kwota = null;
$raty = null;
$procent = null;
$result = null;
$messages = array();
$info = array();

getParams($kwota, $raty, $procent);
if(checkParams($kwota, $raty, $procent, $messages, $info)){
	$result = calcPayment($kwota, $raty, $procent);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');


//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('kwota',$kwota);
$smarty->assign('raty',$raty);
$smarty->assign('procent',$procent);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('info',$info);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');

