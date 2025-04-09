<?php

// Get PAGE ID FROM URL VALUE AND SAVE IN VARIABLE
$ID = $_GET['ID'];
$confirm = $_POST['confirm'];


if (isset($confirm)) {

    $query = $handler->prepare('DELETE FROM users'
            . ' WHERE users.user_id =  :ID');
    $query->bindParam(':ID', $ID, PDO::PARAM_STR);
    $query->execute();


    echo "<strong>Bruger nr. " . $ID . " er blevet slettet!</strong>";
    echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=users\" />";
} else {

    echo "<p>Ønsker du at slette bruger nr. " . $ID . "\"?</p>";

    echo "<form action=\"\" method=\"post\">
            <input type=\"submit\" name=\"confirm\" value=\"Slet\">
        	</form>";
}

