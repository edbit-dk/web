<?php

//Check session
session_start();
$errmsg_arr = array();
$errflag = false;

//Config
require_once("config/pdo/dbconfig.php");

// new data

$user = $_POST['user_login'];
$password = $_POST['user_pass'];

if ($user == '') {
    $errmsg_arr[] = 'Du skal indtaste dit brugernavn';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Du skal indtaste din adgangskode';
    $errflag = true;
}

// query
$result = $handler->prepare("SELECT * FROM rrf_users WHERE user_login= :hjhjhjh AND user_pass= :asas");
$result->bindParam(':hjhjhjh', $user);
$result->bindParam(':asas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if ($rows > 0) {
    if ($user == 'admin') {
        $_SESSION['admin'] = $user;
        header("location: admin");
    } else {
        $_SESSION['user'] = $user;
        header("location: index.php");
    }
} else {
    $errmsg_arr[] = 'Brugernavn eller adgangskode eksistere ikke';
    $errflag = true;
}
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: login.php");
    exit();
}