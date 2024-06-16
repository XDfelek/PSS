<?php
// KONTROLER
require_once 'init.php';

switch($action){
    default:
        $ctrl = new app\controllers\calcCtrl();
        $ctrl->process();
        break;
    case 'calcCompute':
        $ctrl = new app\controllers\calcCtrl();
        $ctrl->process();        
        break;
}

