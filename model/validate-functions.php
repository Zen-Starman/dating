<?php
/*
 * Validate functions for Dating2b
 *
 * @author:      Zane Stearman
 * @file:        validate-functions.php
 * @date:        05/05/2019
 */
/* Validate the form
 * @return boolean
 */
function validForm()
{
    global $f3;
    $isValid = true;

    if (!validName(($f3->get('f_name')), ($f3->get('l_name')))) {

        $isValid = false;

        $f3->set("errors['f_name']"."errors['l_name']", "Please enter your first name.");
//        $f3->set("errors['l_name']", "Please enter your last name.");
    }

    if (!validAge($f3->get('age'))) {

        $isValid = false;
        $f3->set("errors['age']", "Please enter your age.");
    }

    if (!validPhone($f3->get('phone'))) {

        $isValid = false;
        $f3->set("errors['phone']", "Please enter valid phone number.");
    }

    if (!validEmail($f3->get('email'))) {

        $isValid = false;
        $f3->set("errors['email']", "Please select email.");
    }

    return $isValid;
}


function validName($f_name, $l_name){
    return (!empty($f_name) && ctype_alpha($f_name)) && (!empty($l_name) && ctype_alpha($l_name));
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