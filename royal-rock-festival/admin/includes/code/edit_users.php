<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM `rrf_users` WHERE user_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user_login'];
$set_pass = $result['user_pass'];


}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $login = $_POST['user_login'];
    $pass = $_POST['user_pass'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
	$query = $handler->prepare('UPDATE `rrf_users` SET 

    `user_login` = :login,
    `user_pass` = :pass

	WHERE user_ID   =  :ID');
	$query->bindValue(':ID', $ID, PDO::PARAM_STR);
	$query->bindValue(":login", $login, PDO::PARAM_STR);
 	$query->bindValue(":pass", $pass, PDO::PARAM_STR);
	$query->execute();
    
      $succes = "Bruger opdateret!";
           echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=13\" />";

$query = $handler->prepare('SELECT * FROM `rrf_users` WHERE user_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user_login'];
$set_pass = $result['user_pass'];

}
} 

?>

        <form method="post" action="" data-parsley-validate>
             <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Brugernavn:</p> <textarea rows="4" cols="50" name="user_login"><?php echo $set_login ?></textarea><br><br>
            <p>Adgangskode:</p> <textarea rows="4" cols="50" name="user_pass"><?php echo $set_pass ?></textarea><br><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Opdatér">
        </form>