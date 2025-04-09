<?php
if (isset($_POST['submit'])) {

    $check = $handler->prepare("SELECT car_name FROM cars WHERE car_name = ? LIMIT 1");
    $check->execute(array($_POST['car_name']));

    if ($check->rowCount() > 0) {
        $error = 'Annonce eksistere allerede!';
    } else {
        $storage = "../public/img/cars/";
        require_once("upload.php");
        
        // INSERT PAGE FROM FORM
        $query = $handler->prepare("INSERT INTO cars( 

    car_name,
    car_price,
    car_year,
    car_km,
    car_image)
	
	VALUES (
	:name,
	:price,
	:year,
	:km,
	:file

	)");
        $query->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $query->bindValue(":price", $_POST['price'], PDO::PARAM_STR);
        $query->bindValue(":year", $_POST['year'], PDO::PARAM_STR);
        $query->bindValue(":km", $_POST['km'], PDO::PARAM_STR);
        $query->bindValue(":file", $file, PDO::PARAM_STR);
        $query->execute();

        //Insert to category
        $car_id = $handler->lastInsertId();

        for ($add = 0; $add < count($_POST['check']); $add++) {
            //INSERT PAGE FROM FORM

            $query = $handler->prepare("INSERT INTO car_categories
        (
   car_id,
   cat_id
        )
	
	VALUES (
        :ID,
        :category

	)");
            $query->bindValue(":ID", "$car_id", PDO::PARAM_STR);
            $query->bindValue(":category", $_POST['check'][$add], PDO::PARAM_STR);
            $query->execute();
        }




        $succes = "Annonce Oprettet!";
        echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php?page=ads\" />";
    }
}
?>
<form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
    <p style="color: red;"><?php echo $error; ?></p>
    <p style="color: green;"><?php echo $succes; ?></p>
    <p>Navn:</p> <input  type="text" name="name" data-parsley-minlength="6" data-parsley-trigger="change" required><br>
    <p>Kategori:</p>
    <?php
    $query = $handler->query('SELECT * FROM categories ORDER BY cat_id');
    while ($result = $query->fetch()) {
        echo "<input type='checkbox' name='check[]' value='" . $result['cat_id'] . "' required> " . $result['cat_name'] . "<br>";
    }
    ?><br>
    <p>Pris:</p> <input  type="number" name="price" data-parsley-minlength="1" data-parsley-trigger="change" required><br>
    <p>Årgang:</p> <input  type="number" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="year" required><br>
    <p>KM:</p> <input  type="number" name="km" data-parsley-minlength="1" data-parsley-trigger="change" required><br>
    <p>Upload Billede:</p> <input  type="file" name="file" required><br>
    <input type="text" name="hidden" style="display: none"><br>
    <input type="submit" name="submit" value="Submit">
</form>
