<!DOCTYPE html>
<html lang="da">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?php
            $url = rtrim($_GET['url'], '/');
            echo $url;
            ?>
            | DWP - Bilbixen
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Maven+Pro:700,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600' rel='stylesheet' type='text/css'>
        <!-- css -->
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/libs/reset.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/libs/grids/oocss.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/layout.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/fonts.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/text.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/responsive.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
      
    </head>
    <body>
        <div class="page-wrapper">

            <!-- Nav Top -->
            <header>
                <div class="line nav-wrapper">
                    <nav>
                        <div class="inner-nav">
                            <div class="unit size1of5 logo">
                                <h1><a href="<?php echo URL; ?>home/">bilbi<span>x</span>en</a></h1>
                            </div>
                            <div class="unit size1of5 menu">

                            </div>
                            <div class="unit size5of5 lastUnit">
                                <ul class="menu">
                                    <li><a href="<?php echo URL; ?>home">FORSIDE</a></li>
                                    <li><a href="<?php echo URL; ?>car">Find bil</a></li>  
                                    <li><a href="<?php echo URL; ?>news">Nyheder</a></li> 
                                    <li><a href="<?php echo URL; ?>about">Om Os</a></li>
                                    <li><a href="<?php echo URL; ?>contact">Kontakt os</a></li>
                                    <?php
                                    $user = $this->loadModel('UserModel');
                                    if ($user->isLoggedIn() && $user->role('Admin')) {
                                        echo "<li><a href='" . URL . "controlpanel'>Kontrolpanel</a></li>"
                                        . "<li><a href='" . URL . "logout'>Logout</a></li>";
                                    } elseif ($user->isLoggedIn()) {
                                        ?>
                                        <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li><a href="<?php echo URL; ?>login">Forhandler-login</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

            </header>
            <div class="content-wrapper">
                <!--Top start-->
                <div class="content-top">
                    <div class="inner-content-top">
                        <div class="line inner-content banner">
                            <div class="unit size1of1 heading">
                                <h2>GØR SOM 10.000 ANDRE</h2>
                                <h3>SÆLG DIN BIL PÅ BILBIXEN</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Top end-->


