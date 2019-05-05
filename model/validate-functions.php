<?php
/*
 * Validate functions for Dating2b
 *
 * @author:      Zane Stearman
 * @file:        validate-functions.php
 * @date:        05/05/2019
 */



function validName($name){
    return !empty($name) && ctype_alpha($name);
}

function validAge($age){
    return !empty($age) && ctype_digit($age) && ($age >= 18 && $age <= 118);
}

function validPhone($phone){
    //this one is a bit tricky, had to do some searching on the web.
    return !empty($phone) && ctype_digit($phone) &&
        preg_match(
            "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone
        );
}

function validEmail($email){
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validOutdoor(){
    global $f3;
    return true;
}

function validIndoor(){
    global $f3;
    return true;
}