<!DOCTYPE html>
<html lang="da">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Løjstrup bibliotek</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/default/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/default/css/feedback.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/contact.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/details.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/header.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/sidebar-left.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/content.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/assets/app/css/footer.css">

    </head>

    <body>
        <div class="container"> 
            <header class="header">
                <img class="logo" src="<?php echo URL; ?>public/assets/app/img/logo.png" alt="">
                <img class="bg" src="<?php echo URL; ?>public/assets/app/img/bg.png" alt="">

            </header>
            <?php echo $this->renderFeedback(); ?>