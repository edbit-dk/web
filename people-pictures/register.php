<?php
// COOKIE SET
session_start();

function validate_user() {
    if (isset($_SESSION['admin'])) {
        header("Location: admin");
    } elseif (isset($_SESSION['user'])) {
        header("Location: index.php");
    }
}

validate_user();

// CONNECT DATABASE
require_once("assets/conf/dbconfig.php");

if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT user FROM pp_users WHERE user = ? LIMIT 1");
    $check->execute(array($_POST['user']));

    if ($check->rowCount() > 0) {
        $error = 'Bruger allerede oprettet';
    } else {

        // INSERT PAGE FROM FORM
        $query = $handler->prepare("INSERT INTO pp_users( 

    user,
    pass)

	VALUES (
	:login,
	:pass
	)");
        $query->bindValue(':login', $_POST['user'], PDO::PARAM_STR);
        $query->bindValue(':pass', $_POST['pass'], PDO::PARAM_STR);
        $query->execute();

        $succes = "Bruger oprettet!";
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>Login</title>

   <!-- Bootstrap core CSS -->
        <link href="assets/css/libs/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/cp.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/libs/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <form class="form-signin" role="form" method="post" action="" data-parsley-validate>
                <h2 class="form-signin-heading">Opret Bruger</h2>
                <p style="color: red;"><?php echo $error; ?></p>
                <p style="color: green;"><?php echo $succes; ?></p>
                <input type="text" name="user"  class="form-control" placeholder="* Brugernavn" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required="" autofocus="">
                <input type="password" name="pass"  class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 5 karaktere" placeholder="* Adgangskode" required="">
                <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>-->
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Opret"><br>
                <a href="login.php">Login</a><br>
                <a href="index.php">Tilbage</a>
            </form>
        </div> <!-- /container -->

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/libs/ie10-viewport-bug-workaround.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="assets/js/valid.js"></script>
        <script src="assets/js/da.js"></script>

    </body></html>
<?php
// CLOSE DATABASE
require_once("assets/conf/dbclose.php");
?>  
