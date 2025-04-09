<?php
//session_save_path("tmp");
session_start();
$con = new mysqli('127.0.0.1', 'edbitdk_web', 'tub,Cou0koSk', 'edbitdk_web') or die("unable to connect");
$con->set_charset("utf8");

$_cart = 'cart';
$_user = 'user';
$_coupon = 'coupon';
$_prefix = 'simpleshop';

require_once 'functions.php';



//session_destroy();

/*
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
 */