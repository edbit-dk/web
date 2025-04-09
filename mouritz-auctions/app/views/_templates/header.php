<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            <?php
            $url = rtrim($_GET['url'], '/');
            echo $url;
            ?>
            | Mouritz Auktioner
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/simplegrid.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/font-awesome.css" rel="stylesheet">
    </head>
    <body>
        <!-- header -->


<div class="page-wrapper center">
    <div class="logo-wrapper">
        <img src="<?php echo URL; ?>/img/logo.png" alt="Logo">
    </div>

</div>


        <div class="nav-wrapper">
            <div class="grid grid-pad">
                <div class="col-1-1">
                    <div class="content">
                        <nav id="mainNav" class="mainNav">
                            <ul class="nav">
                                <?php
                                $user = $this->loadModel('UserModel');
                                if (!$user->isLoggedIn()) {
                                    ?>
                                    <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>auctions">Auctions</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>login">Login</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>register">Register</a></li>
                                <?php } ?>
                                <?php
                                $user = $this->loadModel('UserModel');
                                if ($user->isLoggedIn()) {
                                    ?>
                                    <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>auctions">Auctions</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>account/profile">Account</a></li>
                                    <li class="navItem"><a href="<?php echo URL; ?>account/logout">Log out</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

