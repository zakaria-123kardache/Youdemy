<?php

require_once('../vendor/autoload.php');

require_once('../public/index.php');
require_once('../public/test.php');


$route = isset($_GET['route']) ? $_GET['route'] : 'index';

switch ($route) {

    case 'index':
        echo " am in index";
        break;

    case 'test':
        echo " am in page test";
        break;

    default:
        echo "404";
        break;
}



echo"======================";