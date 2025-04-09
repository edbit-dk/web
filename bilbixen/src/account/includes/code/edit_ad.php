<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM cars WHERE car_id  =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_name = $result['car_name'];
    $set_price = $result['car_price'];
    $set_year = $result['car_year'];
    $set_km = $result['car_km'];
    $set_file = $result['car_image'];
}

// $query = $handler->prepare('SELECT * FROM car_categories WHERE car_id  =  :ID');
// $query->bindValue(':ID', $ID, PDO::PARAM_STR);
// $query->execute();
// while ($result = $query->fetch()) {

//     $set_cat = $result['cat_id'];

// }

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $name = $_POST['car_name'];
    $price = $_POST['car_price'];
    $year = $_POST['car_year'];
    $km = $_POST['car_km'];

    if (empty($_FILES["file"]["name"])) {
        $file = $_POST["car_image"];
    } else {
        $file = $_FILES["file"]["name"];
        $storage = "../public/img/cars/";
        require("upload.php");
    }


    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE cars SET 

    car_name = :name,
    car_price = :price,
    car_year = :year,
   	car_km = :km,
    car_image = :file

	WHERE car_id  =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":price", $price, PDO::PARAM_STR);
    $query->bindValue(":year", $year, PDO::PARAM_STR);
    $query->bindValue(":km", $km, PDO::PARAM_STR);
    $query->bindValue(":file", $file, PDO::PARAM_STR);
    $query->execute();

    //Insert to category
    $car_id = $handler->lastInsertId();

    for ($add = 0; $add < count($_POST['check']); $add++) {
        //INSERT PAGE FROM FORM

        $query = $handler->prepare("UPDATE car_categories SET
        
   car_id = :ID,
   cat_id = :category


	)");
        $query->bindValue(":ID", "$car_id", PDO::PARAM_STR);
        $query->bindValue(":category", $_POST['check'][$add], PDO::PARAM_STR);
        $query->execute();
    }


    $succes = "Annonce Opdateret!";
    echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=ads\" />";

    // SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
    $query = $handler->prepare('SELECT * FROM cars WHERE car_id  =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->execute();
    while ($result = $query->fetch()) {

        $set_name = $result['car_name'];
        $set_price = $result['car_price'];
        $set_year = $result['car_year'];
        $set_km = $result['car_km'];
        $set_file = $result['car_image'];
    }
}
?>

<form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
    <p style="color: red;"><?php echo $error, $uploaderror; ?></p>
    <p style="color: green;"><?php echo $succes; ?></p>
    <p>Name:</p><input type="text" name="car_name" value="<?php echo $set_name ?>"><br>
    <p>Kategori:</p>
    <?php
    $query = $handler->query('SELECT * FROM categories ORDER BY cat_id');
    while ($result = $query->fetch()) {
        echo "<input type='checkbox' name='check[]' value='" . $result['cat_id'] . "'> " . $result['cat_name'] . "<br>";
    }
    ?><br>
    <p>Pris:</p><input type="text" name="car_price" value="<?php echo $set_price ?>"><br>
    <p>Årgang:</p><input type="number" name="car_year" value="<?php echo $set_year ?>"><br>
    <p>KM:</p><input type="text" name="car_km" value="<?php echo $set_km ?>"><br>
    <p>Upload Billede:</p><input type="file" id="file" name="file" ><br>
    <input name="car_image" type="hidden" value="<?php echo $set_file ?>">
    <img src="../public/img/cars/<?php echo $set_file ?>" alt="image">
    <input type="text" name="hidden" style="display: none"><br>
    <input type="submit" name="submit" value="Submit">
</form>