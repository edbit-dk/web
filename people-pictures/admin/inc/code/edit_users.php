<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM pp_users WHERE id =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user'];
$set_pass = $result['pass'];


}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $user = $_POST['user'];
    $pass = $_POST['pass'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
	$query = $handler->prepare('UPDATE pp_users SET 

    user = :user,
    pass = :pass

	WHERE id   =  :id');
	$query->bindValue(':id', $id, PDO::PARAM_STR);
	$query->bindValue(":user", $user, PDO::PARAM_STR);
 	$query->bindValue(":pass", $pass, PDO::PARAM_STR);
	$query->execute();
    
      $succes = "User Updated!";

$query = $handler->prepare('SELECT * FROM pp_users WHERE id   =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_login = $result['user'];
$set_pass = $result['pass'];


	}
} 

?>

        <form method="post" action="" data-parsley-validate>
             <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Brugernavn:</p> <textarea rows="4" cols="50" name="user"><?php echo $set_login ?></textarea><br><br>
            <p>Adgangskode:</p> <textarea rows="4" cols="50" name="pass"><?php echo $set_pass ?></textarea><br><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
        </form>