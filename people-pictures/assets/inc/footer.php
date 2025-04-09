<footer>
    <?php
if (isset($_POST['submit'])) {
   	$query = $handler->query("SELECT * FROM pp_gallery WHERE title LIKE '%".$_POST['term']."%'");
	
	while($result = $query->fetchAll(PDO::FETCH_ASSOC)){
  	echo $result['title'];
    }
}
?>	
    <p>Search our database of Galleries:</p>
    <form method="post" action="">
    <input type="text" name="term">
    <input type="submit" value="GO!">
    </form>
    <p>OR</p>
    <a href="gallery.php">View our entire list</a><br>
</footer>

