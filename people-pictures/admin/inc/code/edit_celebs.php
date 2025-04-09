<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM pp_celebs WHERE id  =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_name = $result['name'];
    $set_height = $result['height'];
    $set_birth = $result['birth'];
    $set_birth_place = $result['birth_place'];
    $set_file = $result['file'];
}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $name = $_POST['name'];
    $height = $_POST['height'];
    $birth = $_POST['birth'];
    $birth_place = $_POST['birth_place'];
    
      if(empty($_FILES["file"]["name"])) {
    	$file = $_POST["storage"];
    } else {
    	$file = $_FILES["file"]["name"];
    	$storage = "../assets/img/";
    	require("upload.php");
    }



    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE pp_celebs SET 

    name = :name,
    height = :height,
    birth = :birth,
    birth_place = :birth_place,
    file = :file

	WHERE id  =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":height", $height, PDO::PARAM_STR);
    $query->bindValue(":birth", $birth, PDO::PARAM_STR);
    $query->bindValue(":birth_place", $birth_place, PDO::PARAM_STR);
    $query->bindValue(":file", $file, PDO::PARAM_STR);
    $query->execute();

    $succes = "Celeb Updated!";

	// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
	$query = $handler->prepare('SELECT * FROM pp_celebs WHERE id  =  :id');
	$query->bindValue(':id', $id, PDO::PARAM_STR);
	$query->execute();
	while ($result = $query->fetch()) {

    $set_name = $result['name'];
    $set_height = $result['height'];
    $set_birth = $result['birth'];
    $set_birth_place = $result['birth_place'];
    $set_file = $result['file'];
	}

}
?>

        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
              <p style="color: red;"><?php echo $error, $uploaderror; ?></p>
              <p style="color: green;"><?php echo $succes; ?></p>
	    	<p>Name:</p><input type="text" name="name" value="<?php echo $set_name ?>"><br><br>
    		<p>Height:</p><input type="text" name="height" value="<?php echo $set_height ?>"><br><br>
    		<p>Birth:</p><input type="date" name="birth" value="<?php echo $set_birth ?>"><br><br>
    		<p>Birth Place:</p><input type="text" name="birth_place" value="<?php echo $set_birth_place ?>"><br><br>
            <p>Image:</p><input type="text" id="file" name="storage" value="<?php echo $set_file ?>"><br>
            <p>Upload Image:</p><input type="file" name="file" id="file"><br>
            <input type="text" name="hidden" style="display: none"><br>
            <input type="submit" name="submit" value="Submit">
        </form>