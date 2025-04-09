<?php
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE); 

session_start();

function validate_user() {
    if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
        header("Location: ../login.php");
    }
}

validate_user();

// GET PAGE ID
$page = $_GET['page'];
$ID = $_GET['ID'];

// CONNECT DATABASE
require_once("../config/pdo/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="da"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>
      Kontrolpanel | Bilbixen
        </title>

        <!-- Bootstrap core CSS -->
        <link href="../public/css/libs/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/backend.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style id="holderjs-style" type="text/css"></style></head>

    <body>
        <?php include_once ("includes/nav_top.php"); ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once ("includes/nav_side.php"); ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Kontrolpanel</h1>

                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-4 placeholder">
                            <img  class="img-responsive" alt="500x200" src="../public/img/layout/1391804290_bf9cbcc629_z.jpg">
                            <h4>Personbiler</h4>
                            <span class="text-muted">
                                <?php
                                $result = $handler->query('select count(car_id) from car_categories where cat_id = 1')->fetchColumn();
                                echo $result;
                                ?>
                            </span>
                        </div>
                        <div class="col-xs-6 col-sm-4 placeholder">
                            <img class="img-responsive" alt="200x200" src="../public/img/layout/371426730_c9db1a67cd_z.jpg">
                            <h4>Vrag</h4>
                            <span class="text-muted">
                                <?php
                                $result = $handler->query('select count(car_id) from car_categories where cat_id = 2')->fetchColumn();
                                echo $result;
                                ?>
                            </span>
                        </div>
                        <div class="col-xs-6 col-sm-4 placeholder">
                            <img  class="img-responsive" alt="200x200" src="../public/img/layout//3816999070_275084bbb1_z.jpg">
                            <h4>Lastvogne</h4>
                            <span class="text-muted">
                                <?php
                                $result = $handler->query('select count(car_id) from car_categories where cat_id = 3')->fetchColumn();
                                echo $result;
                                ?>
                            </span>
                        </div>
                    </div>

                    <h2 class="sub-header">
                        <?php
                        if ($page == null) {
                            echo "Velkomen";
                        } elseif ($page == 'comments') {
                            echo "Kommentare";
                        } elseif ($page == 'ads') {
                            echo "Annoncer";
                        } elseif ($page == 'edit_ad') {
                            echo "Redigér Annonce";
                        }elseif ($page == 'new_user') {
                            echo "Ny Bruger";
                        } elseif ($page == 'users') {
                            echo "Brugere";
                        }
                        ?>
                    </h2>
                    <div class="table-responsive">
                        <!--Content start-->
                        <?php
                        if (file_exists("pages/$page.php")) {//om der eksistere filnavn include
                            include "pages/$page.php";
                        } elseif (file_exists("includes/code/$page.php")) {//om der eksistere filnavn include
                            include "includes/code/$page.php";
                        } else {
                            include "pages/home.php";
                        }
                 
                        ?>
                        <!--Content end-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../public/js/libs/jquery.min.js"></script>
        <script src="../public/js/libs/bootstrap.min.js"></script>
        <script src="../public/js/libs/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../public/js/libs/ie10-viewport-bug-workaround.js"></script>
        <script src="../public/js/valid.js"></script>
        <script src="../public/js/da.js"></script>
<?php
// CLOSE DATABASE
require_once("../config/pdo/dbclose.php");
?>  
