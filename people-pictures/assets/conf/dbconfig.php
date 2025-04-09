<?php
/*PDO DB CONFIG*/ 

/*Check for availeblie drivers*/
//print_r(PDO::getAvailableDrivers());


$db_driver = "mysql";  
$db_host = "127.0.0.1"; 
$db_name = "tsch75_wi3_sde_dk";
$username = "tsch75.wi3";
$passwd = "023101q0";

try{

$handler = new PDO("$db_driver:host=$db_host;dbname=$db_name;charset=utf8", $username, $passwd); 
$handler->exec("set names utf8");
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
 $errormessage = $error->getMessage();
 echo $errormessage;
}
