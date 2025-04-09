<?php
/*PDO DB CONFIG*/ 

/*Check for availeblie drivers*/
//print_r(PDO::getAvailableDrivers());


$db_driver = "mysql";  
$db_host = "127.0.0.1"; 
$db_name = "websuppo_portfolio_bilbixen";
$username = "websuppo_admin";
$passwd = "1992c.m.lange";

try{

$handler = new PDO("$db_driver:host=$db_host;dbname=$db_name;charset=utf8", $username, $passwd); 
$handler->exec("set names utf8");
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
 $errormessage = $error->getMessage();
 echo $errormessage;
}
