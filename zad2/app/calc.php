<?php
require_once dirname(__FILE__) . '/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH . '/app/security/check.php';

//pobranie parametrów
function getParams(&$kwotaKredytu, &$iloscLat, &$oprocentowanie){
	$kwotaKredytu = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$iloscLat = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$oprocentowanie = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwotaKredytu, &$iloscLat, &$oprocentowanie, &$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwotaKredytu) && isset($iloscLat) && isset($oprocentowanie))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwotaKredytu == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $iloscLat == "") {
		$messages [] = 'Nie podano ilosci lat';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwotaKredytu )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $iloscLat )) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwotaKredytu, &$iloscLat, &$oprocentowanie, &$messages, &$result){
	global $role;
	
	//konwersja parametrów na int
	$kwotaKredytu = intval($kwotaKredytu);
	$iloscLat = intval($iloscLat);
	
	//wykonanie operacji
	switch ($oprocentowanie) {
		case '5' :
			if ($role == 'admin'){
                $result = (($kwotaKredytu*0.05*pow(1.05, $iloscLat))/(pow(1.05, $iloscLat)-1))/12;
			} else {
				$messages [] = 'Tylko administrator może miec tak niskie oprocentowanie, dla użytkowników tylko powyżej 11% !';
			}
			break;
		case '15' :
            $result = (($kwotaKredytu*0.15*pow(1.15, $iloscLat))/(pow(1.15, $iloscLat)-1))/12;
			break;
		case '10' :
			if ($role == 'admin'){
                $result = (($kwotaKredytu*0.1*pow(1.1, $iloscLat))/(pow(1.1, $iloscLat)-1))/12;
			} else {
				$messages [] = 'Tylko administrator może miec tak niskie oprocentowanie, dla użytkowników tylko powyżej 11% !';
			}
			break;
		default :
            $result = (($kwotaKredytu*0.2*pow(1.2, $iloscLat))/(pow(1.2, $iloscLat)-1))/12;
			break;
	}
}

//definicja zmiennych kontrolera
$kwotaKredytu = null;
$iloscLat = null;
$oprocentowanie = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwotaKredytu,$iloscLat,$oprocentowanie);
if ( validate($kwotaKredytu,$iloscLat,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwotaKredytu,$iloscLat,$oprocentowanie,$messages,$result);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';