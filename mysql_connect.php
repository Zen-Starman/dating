<?php
#   Dating  Assignment
#   Author: Zane Stearman
#   Date:   04/14/2019
#   File:   mysql_connect.php

define('DB_USER', 'ztsgreen_phpscript');
define('DB_PASSWORD', '123!@#hello');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ztsgreen_sitename');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
