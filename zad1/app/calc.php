<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwotaKredytu = $_REQUEST ['x']; //kwota kredytu
$iloscLat = $_REQUEST ['y']; //na ile lat
$oprocentowanie = $_REQUEST ['op']; //oprocentowanie

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwotaKredytu) && isset($iloscLat) && isset($oprocentowanie))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwotaKredytu == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $iloscLat == "") {
	$messages [] = 'Nie podano liczby 2';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwotaKredytu )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $iloscLat )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwotaKredytu = intval($kwotaKredytu);
	$iloscLat = intval($iloscLat);
	
	//wykonanie operacji
	switch ($oprocentowanie) {
		case '5' :      //5% x-kwota kredytu y-lata
			$result = (($kwotaKredytu*0.05*pow(1.05, $iloscLat))/(pow(1.05, $iloscLat)-1))/12;
			break;
		case '10' :      //10%
			$result = (($kwotaKredytu*0.1*pow(1.1, $iloscLat))/(pow(1.1, $iloscLat)-1))/12;
			break;
		case '15' :
			$result = (($kwotaKredytu*0.15*pow(1.15, $iloscLat))/(pow(1.15, $iloscLat)-1))/12;
			break;
		case '20' :
			$result = (($kwotaKredytu*0.2*pow(1.2, $iloscLat))/(pow(1.2, $iloscLat)-1))/12;
			break;
	}
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';