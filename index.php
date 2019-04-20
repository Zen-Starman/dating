<?php

/**
 *  Dating Site Assignment part2
 *  Author: Zane Stearman
 *  Date:   04/18/2019
 */

session_start();

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

//define profile paths
$f3->route('GET /personal_info', function(){
    $view = new Template();
    echo $view->render('views/prsnInfo.html');
});

$f3->route('POST /Profile', function(){
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('POST /interests', function(){
    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('POST /Summary', function(){
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-free
$f3->run(); // ->called the object operator