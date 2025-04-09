<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en" hola_ext_inject="ready"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo URL; ?>public/js/ie8-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body hola-ext-player="1">

        <div class="container form-signin">

            <form action="<?php echo URL; ?>login/check" method="post">
                <h2 class="form-signin-heading">Log Ind</h2>
                <p>
                    <?php
                    if (Session::exists('FEEDBACK'))
                    {
                        echo Session::flash('FEEDBACK');
                    }
                    ?>
                </p>
                <label for="inputEmail" class="sr-only">Brugernavn</label>
                <input type="text"  name="username" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Kodeord</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Husk mig
                    </label>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit">Log ind</button>
            </form>
            <br>
            <a href="<?php echo URL; ?>../index.php?page=kundeoprettelse" class="btn btn-lg btn-primary btn-block">Ny bruger</a>
            <br>
            <a href="<?php echo URL; ?>../" >Tilbage til SimpleShop</a>
        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo URL; ?>public/js/ie10-viewport-bug-workaround.js"></script>


    </body></html>