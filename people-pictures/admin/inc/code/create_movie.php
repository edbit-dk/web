<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT link FROM pp_movies WHERE link = ? LIMIT 1");
    $check->execute(array($_POST['link']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Movie already added!';

    } else{

      // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO pp_movies ( 

    title,
    link)
	
	VALUES (
	:title,
	:link

	)");
	$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
 	$query->bindValue(":link", $_POST['link'], PDO::PARAM_STR);
	$query->execute();

    $succes = "Movie Added!";
	} 
}
?>
        <form method="post" action="" data-parsley-validate>
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Celeb:</p> <input  type="text" name="title" required><br>
            <p>Movie Link:</p> <input  type="text" name="link" required><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
               </form>
