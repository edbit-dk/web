<!--
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$db_driver = "mysql";  
$db_host = "127.0.0.1"; 
$db_name = "tsch75_wi3_sde_dk";
$username = "tsch75.wi3";
$passwd = "023101q0";

try{

$handler = new PDO("$db_driver:host=$db_host;dbname=$db_name;charset=utf8", $username, $passwd); 
$handler->exec("set names utf8");
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
 $errormessage = $error->getMessage();
 echo $errormessage;
}
$value = $_GET['name']


		$query = $handler->prepare('SELECT * FROM rrf_events WHERE event_title LIKE  ?');
	$query->bindParam('?', $value, PDO::PARAM_STR);
	$query->execute();

while ($results = $query->fetch()) {
                echo $results['event_title'] . "<br />\n";
            }

        if (!$query->rowCount() == 0) {
            while ($results = $query->fetch()) {
                echo $results['event_title'] . "<br />\n";
            }

        } else {
            echo 'Nothing found';
        }

    }


	<form class="search-banner" action="" method="get">
  <input class="text-input" type="text" name="name" placeholder="Indtast by navn eller postnummer" required="" />
    <input class="text-input" type="text" name="name" placeholder="Indtast kunstner navn" required="" />
    <input class="btn" type="submit" name="submit" value="Find Koncert" />
    </form>
-->
<style>input.parsley-error, select.parsley-error, textarea.parsley-error {
color: #B94A48;
background-color: #F2DEDE;
border: 1px solid #EED3D7;
}

	input.parsley-success, select.parsley-success, textarea.parsley-success {
color: #468847;
background-color: #DFF0D8;
border: 1px solid #D6E9C6;
}
	
	.parsley-errors-list {
color: #a30f27;
}
</style>
<form id="demo-form" data-parsley-validate>

  <!-- this field is just required, it would be validated on form submit -->
  <label for="fullname">Full Name * :</label>
  <input data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" type="text" name="fullname" required />

  <!-- this required field must be an email, and validation will be run on
  field change -->
  <label for="email">Email * :</label>
  <input type="email" name="email" data-parsley-trigger="change" required />


  <input type="submit" />
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/valid.js"></script>
<script src="js/da.js"></script>