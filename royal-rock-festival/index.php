<?php
//Start session
session_start();

// GET PAGE ID
$page = $_GET['page'];
$ID = $_GET['ID'];

// CONNECT DATABASE
require_once("config/pdo/dbconfig.php");



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
            if ($page == 1) {
                echo "Forside";
            } elseif ($page == 2) {
                echo "Nyheder";
            } elseif ($page == 3) {
                echo "Events";
            } elseif ($page == 4) {
                echo "Royal Rock";
            } elseif ($page == 5) {
                echo "Kontakt";
            } else {
                echo "Forside";
            }
            ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/libsreset.css">
        <link rel="stylesheet" type="text/css" href="css/libs/grids/oocss.css">
        <link rel="stylesheet" type="text/css" href="css/frontend.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
    </head>
    <body>
        <div class="pagewrapper">

            <!-- Nav Top -->
            <header>
                <div class="line nav-wrapper">
                    <nav>
                        <div class="inner-nav">
                            <div class="unit size1of5">
                                <a href="index.php"><img class="logo"  src="img/logo.png"></a>
                            </div>
                            <div class="unit size5of5 lastUnit">
                                <?php
                                include_once ('includes/nav.php');
                                ?>
                            </div>
                        </div>
                    </nav>
                </div>
                <?php
                if ($page == null) {
                    include_once ('includes/front_banner.php');
                } elseif ($page == 1) {
                    include_once ('includes/front_banner.php');
                } elseif ($page == 3) {
                    include_once ('includes/events_banner.php');
                } elseif ($page == 4) {
                    include_once ('includes/about_banner.php');
                }
                ?>

            </header>
            <div class="content-wrapper">

                <!--Content start-->
                <?php
                if ($page == 1) {
                    include_once ("pages/home.php");
                } elseif ($page == 2) {
                    include_once ("pages/news.php");
                } elseif ($page == 3) {
                    include_once ("pages/events.php");
                } elseif ($page == 4) {
                    include_once ("pages/about.php");
                } elseif ($page == 5) {
                    include_once ("pages/contact.php");
                } else {
                    include_once ("pages/home.php");
                }
                ?>
                <!--Content end-->
            </div>
            <?php include_once ("includes/footer.php"); ?>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/valid.js"></script>
        <script src="js/da.js"></script>
    </body>
</html>
<?php
// CLOSE DATABASE
require_once("config/pdo/dbclose.php");
?>


