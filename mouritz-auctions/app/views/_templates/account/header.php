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
        <div class="page-wrapper">
            <?php
            $Username = USER_USERNAME;
            $Firstname = USER_FIRSTNAME;
            $Lastname = USER_LASTNAME;
            $Email = USER_EMAIL;
            ?>

            <div class="grid grid-pad">
                <div class="col-3-12">
                    <div class="content">
                        <h3 class="heading">Options</h3>
                        <ul class="noLi">
                            <?php if ($user->role("Admin")) { ?>
                                <li><a href="<?php echo URL; ?>controlpanel">Controlpanel</a></li>
                            <?php } ?>
                            <li><a href="<?php echo URL; ?>account/auctions" >My Auctions</a></li>
                            <li><a href="<?php echo URL; ?>account/create/auction" >Create Auction</a></li>
                            <li><a href="<?php echo URL; ?>account/profile">Profile</a></li>
                            <li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                        </ul>
                    </div>
                </div>
<div class="col-9-12">
    <div class="content">