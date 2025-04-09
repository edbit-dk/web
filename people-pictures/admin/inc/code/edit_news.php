<?php
// SELECT EXISTING VALUES AND INSERT IN FROM FIELDS
$query = $handler->prepare('SELECT * FROM pp_news WHERE id  =  :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {

    $set_title = $result['title'];
    $set_content = $result['content'];
    $set_celeb = $result['celeb'];
}

if (isset($_POST['submit'])) {

    // ASIGN VALUES FROM FORM TO VARIBALES
    $title = $_POST['title'];
    $content = $_POST['content'];
    $celeb = $_POST['celeb'];


    // UPDATE DATABASE WITH FROM FIELD VALUES
    $query = $handler->prepare('UPDATE pp_news SET 

    title = :title,
    content = :content,
    celeb = :celeb

	WHERE id  =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":content", $content, PDO::PARAM_STR);
    $query->bindValue(":celeb", $celeb, PDO::PARAM_STR);
    $query->execute();

    $succes = "News Updated!";

    $query = $handler->prepare('SELECT * FROM pp_news WHERE id   =  :id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
    while ($result = $query->fetch()) {

        $set_title = $result['title'];
        $set_content = $result['content'];
        $set_celeb = $result['celeb'];
		 }
	}

?>

<form method="post" action="">
    <p style="color: red;"><?php echo $error; ?></p>
    <p style="color: green;"><?php echo $succes; ?></p>
    <p>Title:</p> <textarea rows="4" cols="50" name="title"><?php echo $set_title ?></textarea><br><br>
    <p>Content:</p><textarea rows="4" cols="50" name="content"><?php echo $set_content ?></textarea><br><br>
    <p>Celeb:</p><textarea rows="4" cols="50" name="celeb"><?php echo $set_celeb ?></textarea><br><br>
    <input type="text" name="hidden" style="display: none"><br>
    <input type="submit" name="submit" value="Submit">
</form>