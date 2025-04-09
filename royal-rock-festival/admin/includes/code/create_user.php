<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT `user_login` FROM `rrf_users` WHERE `user_login` = ? LIMIT 1");
    $check->execute(array($_POST['user_login']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Bruger allerede oprettet';

    } else{

    // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO `rrf_users`( 

    `user_login`,
    `user_pass`)

	VALUES (
	:login,
	:pass
	)");
	$query->bindValue(':login', $_POST['user_login'], PDO::PARAM_STR);
 	$query->bindValue(':pass', $_POST['user_pass'], PDO::PARAM_STR);
	$query->execute();

	$succes = "Bruger oprettet!";
	  echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=13\" />";
    }
} 
?>

      <form  method="post" action="" data-parsley-validate>

          <p style="color: red;"><?php echo $error; ?></p>
          <p style="color: green;"><?php echo $succes; ?></p>
        <input type="text" name="user_login"  placeholder="* Brugernavn" data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required="" autofocus="">
        <input type="password" name="user_pass"  data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" placeholder="* Adgangskode" required="">
       <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>-->
           <input  type="submit" name="submit" value="Opret"><br>
      </form>