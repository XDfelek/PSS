<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/app/calcForm.class.php';
require_once $conf->root_path.'/app/calcResult.class.php';
require_once $conf->root_path.'/lib/messages.class.php';

class calcCtrl{
    
    private $msgs;   //wiadomości dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    
    function __construct(){
        $this->msgs = new messages();
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
                    $this->msgs->addError('Nie podano kwoty.');
            }
            if ( $this->form->raty == "") {
                    $this->msgs->addError('Nie podano ilosci rat.');
            }
            if ( $this->form->procent == "") {
                    $this->msgs->addError('Nie podano oprocentowania.');
            }

            if(! $this->msgs->isError()){
                if (! is_numeric( $this->form->kwota )) {
                        $this->msgs->addError('Kwota nie jest liczbą.');
                }

                if (! is_numeric( $this->form->raty )){
                        $this->msgs->addError('Ilość lat nie jest liczbą.');
                }

                if (! is_numeric( $this->form->procent )) {
                        $this->msgs->addError('Oprocentowanie nie jest liczbą.');
                }
            }

            return ! $this->msgs->isError();
    }

    public function process(){
        $this->getParams();
        
        if($this->validate()){
            $this->msgs->addInfo("Parametry podane.");
            $this->form->kwota = doubleval($this->form->kwota);
            $this->form->raty = doubleval($this->form->raty);
            $this->form->procent = doubleval($this->form->procent);

            //wykonanie operacji
            $this->result->result = ($this->form->kwota/($this->form->raty*12))*(1+$this->form->procent/100);
            $this->msgs->addInfo("Wykonano obliczenia.");
        }
         $this->generateView();
    }
    
    public function generateView(){
        global $conf;
        $smarty = new Smarty();
        $smarty->assign('conf',$conf);
        $smarty->assign('page_title','Przykład 05');
        $smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
        $smarty->assign('page_header','Obiekty w PHP');


        //pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
        $smarty->assign('kwota',$this->form->kwota);
        $smarty->assign('raty',$this->form->raty);
        $smarty->assign('procent',$this->form->procent);
        $smarty->assign('result',$this->result->result);
        $smarty->assign('mess',$this->msgs);

        // 5. Wywołanie szablonu
        $smarty->display($conf->root_path.'/app/calc.html');
    }
}
