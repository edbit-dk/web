<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM pp_gallery WHERE id  =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_title = $result['title'];
    $set_file = $result['file'];
}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $title = $_POST['title'];
    
    if(empty($_FILES["file"]["name"])) {
    	$file = $_POST["storage"];
    } else {
    	$file = $_FILES["file"]["name"];
    	require("upload.php");
    }


    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE pp_gallery SET 

    title = :title,
    file = :file

	WHERE id  =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":file", $file, PDO::PARAM_STR);
    $query->execute();

    $succes = "Gallery Updated!";

$query = $handler->prepare('SELECT * FROM pp_gallery WHERE id  =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_title = $result['title'];
    $set_file = $result['file'];
	}
}
?>

        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
              <p style="color: red;"><?php echo $error, $uploaderror; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
            <p>Title:</p> <input  type="text" name="title" value="<?php echo $set_title ?>" required><br>
            <p>Image:</p><input type="text" id="file" name="storage" value="<?php echo $set_file ?>"><br>
            <p>Upload Image:</p><input type="file" name="file" id="file"><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
        </form>