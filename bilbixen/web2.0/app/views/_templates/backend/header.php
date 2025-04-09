<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>            
            <?php
            $url = rtrim($_GET['url'], '/');
            echo $url;
            ?>
            | DWP - Bilbixen
        </title>

        <!-- Bootstrap core CSS -->
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="./controlpanel_files/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo URL; ?>home">DWP - Bilbixen</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Søg...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="<?php echo URL; ?>controlpanel">Oversigt</a></li>
                    </ul>

                    <ul class="nav nav-sidebar"> 
                        <li><a href="<?php echo URL; ?>controlpanel/ads">Annoncer</a></li>
                        <li><a href="<?php echo URL; ?>controlpanel/comments">Kommentare</a></li>
                        <li><a href="<?php echo URL; ?>controlpanel/messages">Beskeder</a></li>
                        <li><a href="<?php echo URL; ?>controlpanel/departments">Afdelinger</a></li>
                    </ul>
                </div>