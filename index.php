<?php

/**
 *  Dating Site Assignment
 *  Author: Zane Stearman
 *  Date:   04/14/2019
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){

    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-free
$f3->run(); // ->called the object operator