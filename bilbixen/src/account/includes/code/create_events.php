<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT `event_title` FROM `rrf_events` WHERE `event_title` = ? LIMIT 1");
    $check->execute(array($_POST['event_title']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Event allerede oprettet';

    } else{

     // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO `rrf_events`( 

    `event_title`,
    `event_content`,
    `event_day`,
	`event_start`,
	`event_top`,
	`event_talents`,
	`event_talents_content`,
	`event_place`,
	`event_talents_image`)
	
	VALUES (
	:title,
	:content,
	:day,
	:start,
	:top,
	:talents,
	:talents_content,
	:place,
	:talents_image

	)");
	$query->bindValue(":title", $_POST['event_title'], PDO::PARAM_STR);
 	$query->bindValue(":content", $_POST['event_content'], PDO::PARAM_STR);
 	$query->bindValue(":day", $_POST['event_day'], PDO::PARAM_STR);
 	$query->bindValue(":start", $_POST['event_start'], PDO::PARAM_STR);
 	$query->bindValue(":top", $_POST['event_top'], PDO::PARAM_STR);
 	$query->bindValue(":talents", $_POST['event_talents'], PDO::PARAM_STR);
 	$query->bindValue(":talents_content", $_POST['event_talents_content'], PDO::PARAM_STR);
 	$query->bindValue(":place", $_POST['event_place'], PDO::PARAM_STR);
 	$query->bindValue(":talents_image", $_POST['event_talents_image'], PDO::PARAM_STR);
	$query->execute();

    $succes = "Event oprettet!";
       echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=9\" />";
	} 
}
?>
        <form method="post" action="" data-parsley-validate>
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Titel:</p> <input  type="text" name="event_title" required><br>
            <p>Indhold:</p><textarea rows="4" placeholder="Skriv indhold her" cols="50" name="event_content" required></textarea><br>
			<p>Dato:</p> <input  type="text" name="event_day" required><br>
			<p>Start:</p> <input  type="text" name="event_start" required><br>
			<p>Top Event:</p> <input  type="text" name="event_top" required><br>
			<p>Sted:</p> <input  type="text" name="event_place" required><br>
			<p>Top Talenter</p> <input  type="text" name="event_talents" required><br>
			<p>Talent Indhold</p><textarea rows="4" placeholder="Skriv indhold her" cols="50" name="event_talents_content" required></textarea><br>
			<p>Top Talent Billede:</p> <input  type="text" name="event_talents_image" required><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Opret">
               </form>

