<?php
// GET PAGE ID
$id = $_GET['celeb'];
$ID = $_GET['ID'];


// CONNECT DATABASE
require_once("assets/conf/dbconfig.php");

// 3. Perform db query
$query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch();
$celeb = $result['name'];