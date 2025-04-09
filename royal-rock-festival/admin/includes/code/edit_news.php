<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM `rrf_news` WHERE news_ID   =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_title = $result['news_title'];
    $set_date = $result['news_date'];
    $set_teaser = $result['news_teaser'];
    $set_content = $result['news_content'];
    $set_day = $result['news_day'];
}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $teaser = $_POST['teaser'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE `rrf_news` SET 

    `news_title` = :title,
    `news_teaser` = :teaser,
    `news_content` = :content,
    `news_date` = :date,
    `news_day` = :day

	WHERE news_ID   =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":content", $content, PDO::PARAM_STR);
    $query->bindValue(":date", $date, PDO::PARAM_STR);
    $query->bindValue(":day", $date, PDO::PARAM_STR);
    $query->bindValue(":teaser", $teaser, PDO::PARAM_STR);
    $query->execute();

    $succes = "Nyhed opdateret!";
    echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=5\" />";

    $query = $handler->prepare('SELECT * FROM `rrf_news` WHERE news_ID   =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->execute();
    while ($result = $query->fetch()) {

        $set_title = $result['news_title'];
        $set_date = $result['news_date'];
        $set_teaser = $result['news_teaser'];
        $set_content = $result['news_content'];
        $set_day = $result['news_day'];
    }
}
?>

<form method="post" action="">
    <p style="color: red;"><?php echo $error; ?></p>
    <p style="color: green;"><?php echo $succes; ?></p>
    <p>Titel:</p> <textarea rows="4" cols="50" name="title"><?php echo $set_title ?></textarea><br><br>
    <p>Teaser:</p> <textarea rows="4" cols="50" name="teaser"><?php echo $set_teaser ?></textarea><br><br>
    <p>Indhold:</p><textarea rows="4" cols="50" name="content"><?php echo $set_content ?></textarea><br><br>
    <p>Dato:</p><input type="text" name="date" value="<?php echo $set_date ?>"><br><br>    
    <p>Dag:</p><input type="text" name="date" value="<?php echo $set_day ?>"><br><br>     
    <input type="text" name="hidden" style="display: none"><br>
    <input type="submit" name="submit" value="Submit">
</form>