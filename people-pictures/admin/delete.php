<?php
//require_once("../errors.php");

require_once("../assets/inc/session.php");
require_once("../assets/inc/functions.php");
validate_admin();

// GET PAGE ID
$id = $_GET['id'];
$page = $_GET['page'];

// CONNECT DATABASE
require_once("../assets/conf/dbconfig.php");

 

?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>
Admin
    </title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/libs/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/cp.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style id="holderjs-style" type="text/css"></style></head>

  <body>
 <?php include_once("inc/nav_top.php"); ?>
    <div class="container-fluid">
      <div class="row">
      	 <?php include_once("inc/nav_side.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="500x200" src="../assets/img/algore.png">
              <h4>Celebs</h4>
              <span class="text-muted">
              	<?php /*
           $result = $handler->query('select count(*) from rrf_messages')->fetchColumn(); 
			echo $result; */
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img class="img-responsive" alt="200x200" src="../assets/img/50cent.png">
              <h4>News</h4>
              <span class="text-muted">
              	              	<?php /*
          $result = $handler->query('select count(*) from rrf_news')->fetchColumn(); 
			echo $result; */
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="200x200" src="../assets/img/ziggy.png">
              <h4>Gallery</h4>
              <span class="text-muted">
              	              	<?php /*
          $result = $handler->query('select count(*) from rrf_events')->fetchColumn(); 
			echo $result; */
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="200x200" src="../assets/img/lol.png">
              <h4>Movies</h4>
              <span class="text-muted">
              	              	<?php /*
           $result = $handler->query('select count(*) from rrf_users')->fetchColumn(); 
			echo $result; */
              ?>
              </span>
            </div>
          </div>

          <h2 class="sub-header">

          	</h2>
          <div class="table-responsive">
            	<!--Content start-->
             <?php  
            if (file_exists("inc/code/$page.php")) {//om der eksistere filnavn include
                include "inc/code/$page.php";
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
    <script src="../assets/js/libs/jquery.min.js"></script>
    <script src="../assets/js/libs/bootstrap.min.js"></script>
    <script src="../assets/js/libs/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/libs/ie10-viewport-bug-workaround.js"></script>
	<script src="../assets/js/valid.js"></script>
	<script src="../assets/js/da.js"></script>
<?php
// CLOSE DATABASE
require_once("../assets/conf/dbclose.php");

