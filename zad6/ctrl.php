<?php
// KONTROLER
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)
//
getRouter()->addRoute('calcShow',    'calcCtrl', ['user','admin']);
getRouter()->addRoute('calcCompute', 'calcCtrl',  ['user','admin']);
getRouter()->addRoute('login',       'loginCtrl');
getRouter()->addRoute('logout',      'loginCtrl', ['user','admin']);
//
getRouter()->go(); //wybiera i uruchamia odpowiednią ścieżkę na podstawie parametru 'action';

