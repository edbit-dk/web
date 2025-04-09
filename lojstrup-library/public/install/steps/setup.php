<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Welcome to Setup</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

                <form  style="text-align: center;" class="form-signin" action="<?php echo URL; ?>index.php?step=options" method="post">
                    <h2 class="form-signin-heading">First Setup</h2>
                    <p>Options</p>
                    <?php
                    if (Session::exists('FEEDBACK_ERROR')) {
                        echo Session::flash('FEEDBACK_ERROR');
                    }
                    ?>
                    <input type="text" class="form-control" name="type" placeholder="driver (ex. mysql)" value="<?php echo Session::flash('type'); ?>">
                    <input type="text" class="form-control" name="host" placeholder="host (ex. localhost)" value="<?php echo Session::flash('host'); ?>">
                    <input type="text" class="form-control" name="database" placeholder="database" value="<?php echo Session::flash('database'); ?>">
                    <input type="text" class="form-control" name="user" placeholder="user" value="<?php echo Session::flash('user'); ?>">
                    <input type="text" class="form-control" name="pass" placeholder="pass" value="<?php echo Session::flash('pass'); ?>">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
                </form>


        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>


    </body></html>