<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            <?php
            $url = $_GET['url'];
            echo $url;
            ?>
            | The Firm Team
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow|Didact+Gothic' rel='stylesheet' type='text/css'>
        <!-- css -->
        <link href="<?php echo URL; ?>public/css/plugins/flexslider/flexslider.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>public/css/styles.php" rel="stylesheet" />
    </head>
    <body>
        <!-- fb follow-->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&appId=817967004922721&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="row page-wrapper">
            <div class="span-11">
                <!--  fb comments-->
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&appId=817967004922721&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <!-- header -->
                <div class="header">

                    <div class="logo">
                        <h1>THE FIRM TEAM</h1>
                    </div>
                    <nav class="navigation row">
                        <ul class="span-10">
                            <!-- same like "home" or "home/index" -->
                            <li><a href="<?php echo URL; ?>home">HOME</a></li>
                            <li><a href="<?php echo URL; ?>blog">NEWS</a></li>
                            <li><a href="<?php echo URL; ?>events">EVENTS</a></li>
                            <li><a href="<?php echo URL; ?>gallery">GALLERY</a></li>
                            <li><a href="<?php echo URL; ?>employees">EMPLOYEES</a></li>
                            <li><a href="<?php echo URL; ?>contact">CONTACT</a></li>
                            <?php
                            $user = $this->loadModel('User');
                            if ($user->isLoggedIn()) {
                                ?>
                                <ul class="span-10">
                                    <li><a href="<?php echo URL; ?>account">Account</a></li>
                                    <li><a href="<?php echo URL; ?>account/profile">Profile</a></li>
                                    <li><a href="<?php echo URL; ?>account/uploads">Uploads</a></li>
                                    <li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                                    <li><a href="<?php echo URL; ?>users/logout">Logout</a></li>
                                </ul>
                            <?php } else { ?>
                            </ul>
                            <ul class="span-2">
                                <li><a href = "<?php echo URL; ?>account/register">REGISTER</a></li>
                                <li><a href="<?php echo URL; ?>account/login">LOGIN</a></li>
                            </ul>
                        <?php } ?>
                    </nav>
                    <!-- Info -->
                </div>

