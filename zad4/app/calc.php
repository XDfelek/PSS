<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

require_once $conf->root_path.'/app/calcCtrl.class.php';

$ctrl = new calcCtrl();
$ctrl->process();
