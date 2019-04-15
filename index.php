<?php

/**
 *  Another test project
 *  Author: Zane Stearman
 *  Date:   04/10/2019
 *  File:   index.php
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL); //sets level to everything

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
//you can do GET /home/main/hello/
$f3->route('GET /', function(){
//    echo '<h1>Hola!</h1>';
    //display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-free
$f3->run(); // ->called the object operator