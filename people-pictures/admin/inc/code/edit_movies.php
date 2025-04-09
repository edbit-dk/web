<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM pp_movies WHERE id  =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_title = $result['title'];
    $set_link = $result['link'];
}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $title = $_POST['title'];
    $link = $_POST['link'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE pp_movies SET 

    title = :title,
    link = :link

	WHERE id  =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":link", $link, PDO::PARAM_STR);
    $query->execute();

    $succes = "Movies Updated!";

    $query = $handler->prepare('SELECT * FROM pp_movies WHERE id   =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
    while ($result = $query->fetch()) {

        $set_title = $result['title'];
        $set_link = $result['link'];
    }
}
?>

<form method="post" action="">
    <p style="color: red;"><?php echo $error; ?></p>
    <p style="color: green;"><?php echo $succes; ?></p>
    <p>Title:</p><input  type="text" name="title" value="<?php echo $set_title ?>"><br><br>
    <p>Movie Link:</p><input  type="text" name="link" value="<?php echo $set_link ?>"><br><br>
    <input type="text" name="hidden" style="display: none"><br>
    <input type="submit" name="submit" value="Submit">
</form>