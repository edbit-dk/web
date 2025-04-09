<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//Check session
session_start();
$errmsg_arr = array();
$errflag = false;

//Config
require_once("assets/conf/dbconfig.php");

// new data

$user = $_POST['user'];
$password = $_POST['pass'];

if ($user == '') {
    $errmsg_arr[] = 'Du skal indtaste dit brugernavn';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Du skal indtaste din adgangskode';
    $errflag = true;
}

// query
$result = $handler->prepare("SELECT * FROM pp_users WHERE user = :user AND pass = :pass");
$result->bindParam(':user', $user);
$result->bindParam(':pass', $password);
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