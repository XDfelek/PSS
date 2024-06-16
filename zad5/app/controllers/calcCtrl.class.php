<?php

namespace app\controllers;

use app\forms\calcForm;
use app\transfer\calcResult;

class calcCtrl{
    
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    
    function __construct(){
        $this->form = new calcForm();
        $this->result = new calcResult();
    }
    
    // pobranie parametrów
    public function getParams(){
            $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
            $this->form->raty = isset($_REQUEST['raty']) ? $_REQUEST['raty'] : null;
            $this->form->procent = isset($_REQUEST['procent']) ? $_REQUEST ['procent'] : null;
    }

    // 2. walidacja parametrów

    public function validate(){
    // sprawdzenie, czy parametry zostały przekazane
            if ( ! (isset($this->form->kwota) && isset($this->form->raty) && isset($this->form->procent))) {
                    //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                    return false;
            }


            // sprawdzenie, czy potrzebne wartości zostały przekazane
            if ( $this->form->kwota == "") {
                    getMessages()->addError('Nie podano kwoty.');
            }
            if ( $this->form->raty == "") {
                    getMessages()->addError('Nie podano ilosci rat.');
            }
            if ( $this->form->procent == "") {
                    getMessages()->addError('Nie podano oprocentowania.');
            }

            if(! getMessages()->isError()){
                if (! is_numeric( $this->form->kwota )) {
                        getMessages()->addError('Kwota nie jest liczbą.');
                }

                if (! is_numeric( $this->form->raty )){
                        getMessages()->addError('Ilość lat nie jest liczbą.');
                }

                if (! is_numeric( $this->form->procent )) {
                        getMessages()->addError('Oprocentowanie nie jest liczbą.');
                }
            }

            return ! getMessages()->isError();
    }

    public function process(){
        $this->getParams();
        
        if($this->validate()){
            getMessages()->addInfo("Parametry podane.");
            $this->form->kwota = doubleval($this->form->kwota);
            $this->form->raty = doubleval($this->form->raty);
            $this->form->procent = doubleval($this->form->procent);

            //wykonanie operacji
            $this->result->result = ($this->form->kwota/($this->form->raty*12))*(1+$this->form->procent/100);
            getMessages()->addInfo("Wykonano obliczenia.");
        }
         $this->generateView();
    }
    
    public function generateView(){

        getSmarty()->assign('page_title','Przykład 05');
        getSmarty()->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
        getSmarty()->assign('page_header','Obiekty w PHP');


        //pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
        getSmarty()->assign('kwota',$this->form->kwota);
        getSmarty()->assign('raty',$this->form->raty);
        getSmarty()->assign('procent',$this->form->procent);
        getSmarty()->assign('result',$this->result->result);

        // 5. Wywołanie szablonu
        getSmarty()->display('calc.tpl');
    }
}
