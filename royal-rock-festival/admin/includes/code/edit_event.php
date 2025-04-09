<?php
// Get PAGE ID FROM URL VALUE AND SAVE IN VARIABLE
$ID = $_GET['ID'];
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM `rrf_events` WHERE event_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_title = $result['event_title'];
$set_date = $result['event_day'];
$set_content = $result['event_content']; 
$set_start = $result['event_start']; 

}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $title = $_POST['event_title'];
    $content = $_POST['event_content'];
    $date = $_POST['event_day'];
    $start = $_POST['event_start'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
	$query = $handler->prepare('UPDATE `rrf_events` SET 

    `event_title` = :title,
    `event_content` = :content,
    `event_day` = :date,
    `event_start` = :start

	WHERE event_ID   =  :ID');
	$query->bindValue(':ID', $ID, PDO::PARAM_STR);
	$query->bindValue(":title", $title, PDO::PARAM_STR);
 	$query->bindValue(":content", $content, PDO::PARAM_STR);
 	$query->bindValue(":date", $date, PDO::PARAM_STR);
 	$query->bindValue(":start", $start, PDO::PARAM_STR);
	$query->execute();
    
     $succes = "Event opdateret!";
       echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=9\" />";
    
    $query = $handler->prepare('SELECT * FROM `rrf_events` WHERE event_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_title = $result['event_title'];
$set_date = $result['event_day'];
$set_content = $result['event_content']; 
$set_start = $result['event_start']; 
} 

}
?>

        <form method="post" action="">
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Titel:</p> <textarea rows="4" cols="50" name="event_title"><?php echo $set_title ?></textarea><br><br>
            <p>Indhold:</p><textarea rows="4" cols="50" name="event_content"><?php echo $set_content ?></textarea><br><br>
            <p>Dato:</p><input type="text" name="event_day" value="<?php echo $set_date ?>"><br><br>    
             <p>Start:</p><input type="text" name="event_start" value="<?php echo $set_start ?>"><br><br>  
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Gem">
        </form>