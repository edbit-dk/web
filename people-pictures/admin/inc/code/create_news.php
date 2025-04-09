<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT title FROM pp_news WHERE title = ? LIMIT 1");
    $check->execute(array($_POST['title']));

    if ( $check->rowCount() > 0 ) {
        $error = 'News already created!';

    } else{

      // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO pp_news ( 

    title,
    content,
    celeb)
	
	VALUES (
	:title,
	:content,
	:celeb

	)");
	$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
 	$query->bindValue(":content", $_POST['content'], PDO::PARAM_STR);
 	$query->bindValue(":celeb", $_POST['celeb'], PDO::PARAM_STR);
	$query->execute();

    $succes = "News Created!";
	} 
}
?>
        <form method="post" action="" data-parsley-validate>
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Title:</p> <input  type="text" name="title" required><br>
            <p>Celeb:</p> <input  type="text" name="celeb" required><br>
            <p>Content:</p><textarea rows="4" placeholder="Skriv indhold her" cols="50" name="content" required></textarea><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
               </form>
