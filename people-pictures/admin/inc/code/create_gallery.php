<?php
if (isset($_POST['submit'])) {
    $check = $handler->prepare("SELECT file FROM pp_gallery WHERE file = ? LIMIT 1");
    $check->execute(array($_FILES["file"]["name"]));

    if ( $check->rowCount() > 0 ) {
        $error = 'Image already uploaded';

    } else{

      // INSERT PAGE FROM FORM
	$query = $handler->prepare("INSERT INTO pp_gallery ( 

    title,
    file)
	
	VALUES (
	:title,
	:file

	)");
	$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
 	$query->bindValue(":file", $_FILES["file"]["name"], PDO::PARAM_STR);
	$query->execute();
        
$storage = "../../assets/img/gallery/";
require("upload.php");
    $succes = "Image added to gallery!";
	} 
}
?>
        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
              <p style="color: red;"><?php echo $error, $uploaderror; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Celeb:</p> <input  type="text" name="title" required><br>
            <p>Image:</p><input type="file" name="file" id="file"><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
