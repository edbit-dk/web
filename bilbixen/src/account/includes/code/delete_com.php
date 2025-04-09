<?php

// Get PAGE ID FROM URL VALUE AND SAVE IN VARIABLE
$ID = $_GET['ID'];
$confirm = $_POST['confirm'];


if (isset($confirm)) {

    $query = $handler->prepare('DELETE FROM comments'
            . ' WHERE comments.com_id =  :ID');
    $query->bindParam(':ID', $ID, PDO::PARAM_STR);
    $query->execute();


    echo "<strong>Kommentar nr. " . $ID . " er blevet slettet!</strong>";
    echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=comments\" />";
} else {

    echo "<p>Ønsker du at slette kommentar nr. " . $ID . "\"?</p>";

    echo "<form action=\"\" method=\"post\">
            <input type=\"submit\" name=\"confirm\" value=\"Slet\">
        	</form>";
}

