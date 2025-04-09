<?php

// Get PAGE ID FROM URL VALUE AND SAVE IN VARIABLE
$table = $_GET['table'];
$col = $_GET['col'];
$confirm = $_POST['confirm'];

if ($col == "user_ID") {
    $user = "Bruger ";
} elseif ($col == "news_ID") {
    $news = "Nyhed ";
} elseif ($col == "event_ID") {
    $event = "Event ";
} elseif ($col == "message_ID") {
    $event = "Besked ";
} elseif ($col == "subscribe_ID") {
    $subscriber = "Tilmeldte nr. ";
}


if (isset($confirm)) {
    $query = $handler->prepare('DELETE FROM ' . $table . ' WHERE ' . $col . ' =  :ID');
    $query->bindParam(':ID', $ID, PDO::PARAM_STR);
    $query->execute();



    echo "<strong>" . $user . $event . $news . $subscriber . $ID . " er blevet slettet!</strong>";
    	  echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=16\" />";
} else {
    echo "<p>Ønsker du at slette \"" . $user . $event . $subscriber . $news . $ID . "\"?</p>";

    echo "<form action=\"\" method=\"post\">
            <input type=\"submit\" name=\"confirm\" value=\"Slet\">
        	</form>";
}