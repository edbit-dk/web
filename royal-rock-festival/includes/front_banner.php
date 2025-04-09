<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT `subscribe_email` FROM `rrf_subscribers` WHERE `subscribe_email` = ? LIMIT 1");
    $check->execute(array($_POST['subscribe_email']));

    if ($check->rowCount() > 0) {
        $error = 'Tilmedling allerede registeret!';
    } else {

        // INSERT PAGE FROM FORM
        $query = $handler->prepare("INSERT INTO `rrf_subscribers`( 

    `subscribe_name`,
    `subscribe_email`)

	VALUES (
	:name,
	:email
	)");
        $query->bindValue(':name', $_POST['subscribe_name'], PDO::PARAM_STR);
        $query->bindValue(':email', $_POST['subscribe_email'], PDO::PARAM_STR);
        $query->execute();

        $succes = "Tilmelding registreret!";
    }
}
?>

<form class="sign-up" action="" method="post" data-parsley-validate>
    <p class="report" style="color: green;"><?php echo $succes; ?></p>
    <p class="error" style="color: red;"><?php echo $error; ?></p>
    <!-- this field is just required, it would be validated on form submit -->
    <input class="text-input" data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" type="text" name="subscribe_name" placeholder="Indtast dit navn her!" required />

    <!-- this required field must be an email, and validation will be run on
    field change -->
    <input class="text-input" type="email" name="subscribe_email" data-parsley-trigger="change" placeholder="Indtast din email adresse her!" required />

    <input class="btn" name="submit" value="Tilmeld dig her!" type="submit" />
</form>

<div class="banner">
    <h2><span>Royal Rock Festival</span><br>Til alle os støtter Rockens Talenenter...</h2>
</div>

<?php
$query = $handler->query('SELECT * FROM `rrf_stats` ORDER BY stats_ID');


while ($result = $query->fetch()) {

    echo "<div class=\"stats\">
    <h3>" . $result['stats_support'] . "<span> Støtter Rocken</span>" . $result['stats_music'] . "<span> Musikere</span>" . $result['stats_concerts'] . "<span> Koncerter</span></h3>
</div>";
}
?>


<img  src="img/banner.png">

