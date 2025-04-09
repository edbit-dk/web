<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT `news_title` FROM `rrf_news` WHERE `news_title` = ? LIMIT 1");
    $check->execute(array($_POST['news_title']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Nyhed allerede oprettet';

    } else{

      // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO `rrf_news`( 

    `news_title`,
    `news_teaser`,
    `news_content`,
    `news_date`,
	`news_day`)
	
	VALUES (
	:title,
    :teaser,
	:content,
	:date,
	:day

	)");
	$query->bindValue(":title", $_POST['news_title'], PDO::PARAM_STR);
 	$query->bindValue(":content", $_POST['news_content'], PDO::PARAM_STR);
 	$query->bindValue(":date", $_POST['news_date'], PDO::PARAM_STR);
 	$query->bindValue(":day", $_POST['news_day'], PDO::PARAM_STR);
    $query->bindValue(":teaser", $_POST['news_teaser'], PDO::PARAM_STR);
	$query->execute();

    $succes = "Nyhed oprettet!";
           echo "<meta http-equiv=\"refresh\" content=\"2; url=http://tsch75.wi3.sde.dk/projekter/04uge-praktiskweb/royalrockfestival/admin/index.php?page=5\" />";
	} 
}
?>
        <form method="post" action="" data-parsley-validate>
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Titel:</p> <input  type="text" name="news_title" required><br>
            <p>Teaser:</p><textarea rows="4" placeholder="Skriv indhold her" cols="50" name="news_teaser" required></textarea><br>
            <p>Indhold:</p><textarea rows="4" placeholder="Skriv indhold her" cols="50" name="news_content" required></textarea><br>
			<p>Dato:</p> <input  type="text" name="news_date" required><br>
			<p>Dag:</p> <input  type="text" name="news_day" required><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Opret">
               </form>
