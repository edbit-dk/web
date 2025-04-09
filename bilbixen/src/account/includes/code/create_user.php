<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT user_name FROM users WHERE user_name = ? LIMIT 1");
    $check->execute(array($_POST['user_name']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Bruger allerede oprettet';

    } else{

    // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO `rrf_users`( 

    user_name,
    user_pass)

	VALUES (
	:login,
	:pass
	)");
	$query->bindValue(':login', $_POST['user_name'], PDO::PARAM_STR);
 	$query->bindValue(':pass', $_POST['user_pass'], PDO::PARAM_STR);
	$query->execute();

	$succes = "Bruger oprettet!";
	 echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=users\" />";
    }
} 
?>

      <form  method="post" action="" data-parsley-validate>

          <p style="color: red;"><?php echo $error; ?></p>
          <p style="color: green;"><?php echo $succes; ?></p>
        <input type="text" name="user_name"  placeholder="* Brugernavn" data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required="" autofocus="">
        <input type="password" name="user_pass"  data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" placeholder="* Adgangskode" required="">
       <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>-->
           <input  type="submit" name="submit" value="Opret"><br>
      </form>