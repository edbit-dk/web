<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT user FROM pp_users WHERE user = ? LIMIT 1");
    $check->execute(array($_POST['user']));

    if ( $check->rowCount() > 0 ) {
        $error = 'User already exists!';

    } else{

    // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO pp_users( 

    user,
    pass)

	VALUES (
	:user,
	:pass
	)");
	$query->bindValue(':user', $_POST['user'], PDO::PARAM_STR);
 	$query->bindValue(':pass', $_POST['pass'], PDO::PARAM_STR);
	$query->execute();

	$succes = "User Created!";
    }
} 
?>

      <form  method="post" action="" data-parsley-validate>

          <p style="color: red;"><?php echo $error; ?></p>
          <p style="color: green;"><?php echo $succes; ?></p>
        <input type="text" name="user"  placeholder="* Brugernavn" data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required="" autofocus="">
        <input type="password" name="pass"  data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" placeholder="* Adgangskode" required="">
       <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>-->
           <input  type="submit" name="submit" value="Opret"><br>
      </form>