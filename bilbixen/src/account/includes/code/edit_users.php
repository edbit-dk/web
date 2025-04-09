<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM users WHERE user_id   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user_name'];
$set_pass = $result['user_pass'];


}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $login = $_POST['user_name'];
    $pass = $_POST['user_pass'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
	$query = $handler->prepare('UPDATE users SET 

    user_name = :login,
    user_pass = :pass

	WHERE user_ID   =  :ID');
	$query->bindValue(':ID', $ID, PDO::PARAM_STR);
	$query->bindValue(":login", $login, PDO::PARAM_STR);
 	$query->bindValue(":pass", $pass, PDO::PARAM_STR);
	$query->execute();
    
      $succes = "Bruger opdateret!";
               echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=users\" />";

$query = $handler->prepare('SELECT * FROM users WHERE user_id   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user_name'];
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