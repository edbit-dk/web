<div id="krummer">
    Du er her: <a href="index.php">Forside</a> > <a href="?page=kategorier">Katalog</a> > <em>Kategori</em>
</div>
<?php
$cat_id = $_GET['category'];
$query = "
	SELECT
		*
	FROM
		{$_prefix}_product_images AS PB
	INNER JOIN
		{$_prefix}_products AS P ON PB.product_id = P.ID
	WHERE
		PB.position < 2
	AND
		P.category_id = {$cat_id}
	ORDER BY P.name";

$result = $con->query($query);

while ($row = $result->fetch_assoc())
{
    $product_link = '?page=product_details&category=' . $row['category_id'] . '&product=' . $row['ID'] . '"';
    ?>

    <div class="produkt">
        <a href="<?php echo $product_link; ?>">
            <img src="assets/images/Thumbs/<?php echo $row['src']; ?>" alt="<?php echo $row['name']; ?>" />
        </a>
        <h2>
            <?php
            if ($row['stock'] <= $row['min'])
            {
                echo 'Udsolgt.';
            }
            ?>
            <a href="<?php echo $product_link ?>"><?php echo $row['name']; ?></a>
        </h2>
        <p>
            <a href="<?php echo $product_link; ?>">
    <?php echo $row['excerpt']; ?>
            </a>
        </p>
        <p>
            <a href="<?php echo $product_link; ?>">
                Pris DKK <strong><?php echo $row['price']; ?></strong>
            </a>
        </p>
        <br>
        <?php if ($row['stock'] >= $row['min'])
        {
            ?>
            <form action="?page=update" method="post">
                <p  style="margin-top: 10px;"> <b>Vælg antal</b><br><input type="number" name="amount" min="1" max="<?php echo $row['stock'];  ?>" value="1"></p>
                <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                <input style="margin-top: 20px;" class="btn btn-success" type="submit" value="Tilføj til kurv">
            </form>
    <?php } ?>
        <div class="clear">
        </div>

    </div><!-- end: produkt -->
    <?php
} // end: while ( $row = $result->fetch_assoc() )
?>