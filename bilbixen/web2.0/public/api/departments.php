<?php
header('Content-Type: application/xml; charset=utf-8');

$db_driver = "mysql";
$db_host = "127.0.0.1";
$db_name = "wsdk_DWP-Bilbixen";
$username = "wsdk_admin";
$passwd = "websupport.dk";

try {

    $handler = new PDO("$db_driver:host=$db_host;dbname=$db_name;charset=utf8", $username, $passwd);
    $handler->exec("set names utf8");
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    $errormessage = $error->getMessage();
    echo $errormessage;
}

$query = $handler->query('SELECT * FROM departments ORDER BY id');


while ($result = $query->fetchObject()) {
    $markers .= "<marker>";
    $markers .= "<name>$result->name</name>";
    $markers .= "<address>$result->address</address>";
    $markers .= "<lat>$result->latitude</lat>";
    $markers .= "<lng>$result->longitude</lng>";
    $markers .= "</marker>";
}

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<markers>
$markers
</markers>
XML;

echo $xml;
