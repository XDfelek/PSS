<?php
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/PSS/zad2');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}

function outSelectedOprocentowanie(&$param, int $wartoscOprocentowania){
    if (isset($param)){
        if ($param == $wartoscOprocentowania){
            print('selected');
        }
    }
}
?>