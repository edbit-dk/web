<?php

// Get PAGE ID FROM URL VALUE AND SAVE IN VARIABLE
$ID = $_GET['ID'];
$confirm = $_POST['confirm'];
$storage = "../public/img/cars/";

if (isset($confirm)) {

    $query = $handler->prepare('DELETE FROM car_categories'
            . ' WHERE car_categories.car_id = :ID');
    $query->bindParam(':ID', $ID, PDO::PARAM_STR);
    $query->execute();

    $check = $handler->prepare("SELECT com_id FROM comments WHERE car_id = ? LIMIT 1");
    $check->execute(array($ID));

    if ($check->rowCount() > 0) {
        $query = $handler->prepare('DELETE FROM comments'
                . ' WHERE comments.car_id =  :ID');
        $query->bindParam(':ID', $ID, PDO::PARAM_STR);
        $query->execute();
    }

    $query = $handler->prepare("SELECT car_image FROM cars WHERE car_id = :ID LIMIT 1");
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->execute();
    while ($result = $query->fetch()) {
        $filename = $result['car_image'];
    }
     
    unlink($storage . $filename);

    $query = $handler->prepare('DELETE FROM cars'
            . ' WHERE cars.car_id =  :ID');
    $query->bindParam(':ID', $ID, PDO::PARAM_STR);
    $query->execute();


    echo "<strong>Annonce nr. " . $ID . " er blevet slettet!</strong>";
    echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=home\" />";
} else {

    echo "<p>Ønsker du at slette annonce nr. " . $ID . "\"?</p>";

    echo "<form action=\"\" method=\"post\">
            <input type=\"submit\" name=\"confirm\" value=\"Slet\">
        	</form>";
}

