<?php
/*error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);*/

session_start(); 
function validate_user(){
if(!isset($_SESSION['admin'])){
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
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>
                <?php
            if ($page == null) {
                echo "Kontrolpanel - Royal Rock Festival";
            } elseif ($page == 2) {
                echo "Beskeder";
            } elseif ($page == 5) {
                echo "Nyheder";
            } elseif ($page == 9) {
                echo "Events";
			} elseif ($page == 13) {
                echo "Brugere";
            } else {
                echo "Kontrolpanel - Royal Rock Festival";
            }
            ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/libs/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/backend.css" rel="stylesheet">

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
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="500x200" src="../img/logo.png">
              <h4>Beskeder</h4>
              <span class="text-muted">
              	<?php 
           $result = $handler->query('select count(*) from rrf_messages')->fetchColumn(); 
			echo $result;
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img class="img-responsive" alt="200x200" src="../img/sidebar.png">
              <h4>Nyheder</h4>
              <span class="text-muted">
              	              	<?php 
          $result = $handler->query('select count(*) from rrf_news')->fetchColumn(); 
			echo $result;
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="200x200" src="../img/about.png">
              <h4>Events</h4>
              <span class="text-muted">
              	              	<?php 
          $result = $handler->query('select count(*) from rrf_events')->fetchColumn(); 
			echo $result;
              ?>
              </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img  class="img-responsive" alt="200x200" src="../img/talents.png">
              <h4>Brugere</h4>
              <span class="text-muted">
              	              	<?php 
           $result = $handler->query('select count(*) from rrf_users')->fetchColumn(); 
			echo $result;
              ?>
              </span>
            </div>
          </div>

          <h2 class="sub-header">
          	            <?php
            if ($page == null) {
                echo "Velkomen";
            } elseif ($page == 2) {
                echo "Beskeder";
            } elseif ($page == 5) {
                echo "Nyheder";
			} elseif ($page == 7) {
                echo "Nyheder";
            }  elseif ($page == 9) {
                echo "Events";
            }  elseif ($page == 10) {
                echo "Ny Event";
            } elseif ($page == 5) {
                echo "Nyheder";
			} elseif ($page == 6) {
                echo "Ny Nyhed";
            } elseif ($page == 12) {
                echo "Ny Bruger";
            } elseif ($page == 13) {
                echo "Brugere";
            } elseif ($page == 16) {
                echo "Instillinger";
            } elseif ($page == 17) {
                echo "Support";
            } 
            ?>
          	</h2>
          <div class="table-responsive">
            	<!--Content start-->
             <?php
             // HOME
            if ($page == "1") { 
                include_once( "pages/home.php"); 
            }
            
            //MESSAGES
            elseif ($page == "2") { // MESSAGES
                include_once"pages/messages.php"; 
            } elseif ($page == "3") { // Read Messages
                include_once"includes/code/view_message.php"; 
            } 
            
            //NEWS
            elseif ($page == "5") {  // NEWS
                include_once ("pages/news.php");
            } elseif ($page == "6") { // CREATE NEWS
                include_once ("includes/code/create_news.php");
            } elseif ($page == "7") { // EDIT NEWS
                include_once ("includes/code/edit_news.php");
            } elseif ($page == "8") { // DELETE 
                include_once"includes/code/delete.php";
            } 
            
         //EVENTS
          elseif ($page == "9") { // CREATE EVENT
                include_once ("pages/events.php");   
            } elseif ($page == "10") { // CREATE EVENT
                include_once ("includes/code/create_events.php");
            } elseif ($page == "11") { // EDIT EVENT
                include_once ("includes/code/edit_event.php");
            } 
                
           //USERS     
            elseif ($page == "13") { // USERS 1
                include_once ("pages/users.php");
            } elseif ($page == "10") { // USERS 2
                include_once"includes/paragraph/edit_user.php";
            } elseif ($page == "11") { // USERS 3
                include_once"includes/paragraph/delete_user.php";
            } elseif ($page == "12") { // CREATE USER
                include_once"includes/code/create_user.php";
            } elseif ($page == "15") {
                include_once"pages/stats.php";
            } elseif ($page == "14") {
                include_once"includes/paragraph/edit_image.php";
            } elseif ($page == "15") {
                include_once"includes/paragraph/delete_image.php";
            } elseif  ($page == "16"){
                include_once ("pages/settings.php");
            } elseif  ($page == "17"){
            include_once ("pages/support.php");
            } elseif  ($page == "18"){
                include_once ("pages/dashboard.php");
           } elseif  ($page == "19"){
                include_once ("includes/code/edit_stats.php");
           } elseif  ($page == "20"){
                include_once ("pages/subscribers.php");
           } elseif  ($page == "21"){
                include_once ("includes/code/edit_users.php");
            } else {
                include_once ("pages/home.php");
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
    <script src="../js/libs/jquery.min.js"></script>
    <script src="../js/libs/bootstrap.min.js"></script>
    <script src="../js/libs/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/libs/ie10-viewport-bug-workaround.js"></script>
	<script src="../js/valid.js"></script>
	<script src="../js/da.js"></script>
<?php
// CLOSE DATABASE
require_once("../config/pdo/dbclose.php");
?>  
