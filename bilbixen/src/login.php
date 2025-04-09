<?php
// COOKIE SET
session_start();

function check_login() {
    if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
        header("Location: account");
    } 
}

check_login();



// LOGIN FORM
if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
    foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
        $msg;
    }
    unset($_SESSION['ERRMSG_ARR']);
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="public/css/libs/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/backend.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <form class="form-signin" role="form" method="post" action="check.php" data-parsley-validate>
                <h2 class="form-signin-heading">Login</h2>
                <p style="color: red;"><?php echo $msg ?></p>
                <input type="text" name="user_name"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
                <input type="password" name="user_pass"  class="form-control" placeholder="Adgangskode" required="">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <input class=" btn-lg btn-primary btn-block" type="submit" name="submit" value="Login"><br>
                <a href="home">Tilbage</a><br>
                <a href="register.php">Opret bruger</a>
            </form>
        </div> <!-- /container -->


        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="public/js/valid.js"></script>
        <script src="public/js/da.js"></script>

    </body></html>
<?php
// CLOSE DATABASE
require_once("config/pdo/dbclose.php");
?>  