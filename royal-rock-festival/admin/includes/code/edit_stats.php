<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM `rrf_stats` WHERE stats_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_support = $result['stats_support'];
$set_music = $result['stats_music'];
$set_concerts = $result['stats_concerts'];


}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $support = $_POST['support'];
    $music = $_POST['music'];
    $concerts = $_POST['concerts'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
	$query = $handler->prepare('UPDATE `rrf_stats` SET 

    `stats_support` = :support,
    `stats_music` = :music,
    `stats_concerts` = :concerts

	');
	$query->bindValue(":support", $support, PDO::PARAM_STR);
 	$query->bindValue(":music", $music, PDO::PARAM_STR);
 	$query->bindValue(":concerts", $concerts, PDO::PARAM_STR);
	$query->execute();
    
      $succes = "Statestik opdateret!";
           echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=15\" />";

$query = $handler->prepare('SELECT * FROM `rrf_stats` WHERE stats_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){

$set_support = $result['stats_support'];
$set_music = $result['stats_music'];
$set_concerts = $result['stats_concerts'];


}
} 

?>

        <form method="post" action="" data-parsley-validate>
             <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Støttere:</p> <textarea rows="4" cols="50" name="support"><?php echo $set_support ?></textarea><br><br>
            <p>Musikere:</p> <textarea rows="4" cols="50" name="music"><?php echo $set_music ?></textarea><br><br>
            <p>Koncerter:</p><textarea rows="4" cols="50" name="concerts"><?php echo $set_concerts ?></textarea><br><br>   
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Opdatér">
        </form>