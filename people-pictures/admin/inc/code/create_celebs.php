<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT name FROM pp_celebs WHERE name = ? LIMIT 1");
    $check->execute(array($_POST['name']));

    if ( $check->rowCount() > 0 ) {
        $error = 'Celeb already created!';

    } else{

      // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO pp_celebs ( 

    name,
    height,
    birth,
    birth_place,
    file)
	
	VALUES (
	:name,
	:height,
	:birth,
	:birth_place,
	:file

	)");
	$query->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
 	$query->bindValue(":height", $_POST['height'], PDO::PARAM_STR);
 	$query->bindValue(":birth", $_POST['birth'], PDO::PARAM_STR);
 	$query->bindValue(":birth_place", $_POST['birth_place'], PDO::PARAM_STR);
 	$query->bindValue(":file", $_FILES["file"]["name"], PDO::PARAM_STR);
	$query->execute();

	$storage = "../../assets/img/celebs/";
	require("upload.php");
    $succes = "Celeb Created!";
	} 
}
?>
        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
              <p style="color: red;"><?php echo $error; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Name:</p> <input  type="text" name="name" required><br>
            <p>Height:</p> <input  type="text" name="height" required><br>
            <p>Birth:</p> <input  type="date" name="birth" required><br>
            <p>Birth Place:</p> <input  type="text" name="birth_place" required><br>
            <p>Img:</p> <input  type="file" name="file" required><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
               </form>
