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
require_once('model/validate-functions.php');


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

$f3->route('POST|GET /Profile', function($f3){



    $f_name= $_POST['f_name'];
    $l_name= $_POST['l_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $f3->set('f_name', $f_name);
    $f3->set('l_name', $l_name);
    $f3->set('age', $age);
    $f3->set('gender', $gender);
    $f3->set('phone', $phone);

    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('POST /interests', function($f3){


    $email = $_POST['email'];
    $state = $_POST['state'];
    $seeking = $_POST['seeking'];
    $bio = $_POST['bio'];

    $f3->set('email', $email);
    $f3->set('state', $state);
    $f3->set('seeking', $seeking);
    $f3->set('bio', $bio);

    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('POST /Summary', function($f3){

    $interests = $_POST['interests'];

    $f3->set('interests', $interests);

    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-free
$f3->run(); // ->called the object operator