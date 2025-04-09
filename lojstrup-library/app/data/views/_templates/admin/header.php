<!DOCTYPE html>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo URL; ?>public/assets/default/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/assets/default/css/feedback.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo URL; ?>public/assets/admin/css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL; ?>">Løjstrup Bibliotek</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>admin/create/book/categories">Tilføj Bog</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/events">Events</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/comments">Kommentarer</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/info">Info</a></li>
                        <li><a href="<?php echo URL; ?>auth/logout">Log ud</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input class="form-control" placeholder="Search..." type="text">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="<?php echo URL; ?>admin">Oversigt</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/books">Bøger</a></li>
                        <li><a href="<?php echo URL; ?>admin/create/book/categories">Tilføj Bog</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/events">Events</a></li>
                        <li><a href="<?php echo URL; ?>admin/create/event">Tilføj event</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/comments">Kommentarer</a></li>
                        <li><a href="<?php echo URL; ?>admin/view/info">Info</a></li>
                        <li><a href="<?php echo URL; ?>auth/logout">Log ud</a></li>
                    </ul>
                </div>