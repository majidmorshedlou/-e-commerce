<?php

$db = mysqli_connect('localhost','sylvanas','012457m@j!D','ecommerce');//Database


if (!$db) {

    echo mysqli_connect_error();
}
//else{
//
//    echo 'با موفقیت به دیتا بیس کانکتیدی!!!';}
error_reporting(E_ALL);       //For showing errors
ini_set('display_errors',1);

session_start();

define("ADMIN_USERNAME","admin");
define("ADMIN_PASSWORD","12541");
define("PATH","http://localhost/ecommerce/");

require_once 'functions.php';
require_once 'actions.php';
