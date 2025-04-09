
<div id="krummer">Du er her:&nbsp;<a href="index.php">Forside</a>&nbsp;&middot;&nbsp;<a href="?page=kategorier">Katalog</a>&nbsp;&middot;&nbsp;<a href="?page=produkter&kategori=<?= $_GET['kategori'] ?>">Kategori</a>&nbsp;&middot;&nbsp;<em>Detalje</em></div>
<div id="produkt">
    <div id="detalje">
        <?php
        $query = '
	SELECT
		Name, beskrivelse_kort, beskrivelse, Price, Stock, Min
	FROM
		Products
	WHERE
		id = ' . $_GET['produkt'];

        $result = $con->query($query);

        while ($row    = $result->fetch_assoc())
        {
            ?>
            <h2><?php echo $row['Name']; ?></h2>
            <p><?php echo $row['beskrivelse_kort']; ?></p>
            <h4>Beskrivelse</h4>
            <p><?php echo $row['beskrivelse']; ?></p>
            <br>
            <p>Pris DKK <b><?php echo $row['Price']; ?></b></p>
            <br>
                <?php if ($row['Stock'] >= $row['Min'])
        {
            ?>
            <form action="?page=update" method="post">
                <p> <b>Vælg antal</b><br> <input type="number" name="amount" min="1" value="1"></p>
                <br>
                <input type="hidden" name="ID" value="<?php echo $_GET['produkt']; ?>">
                <input class="btn btn-success" type="submit" value="Tilføj til kurv">
                <br>   <br>
            </form>
            <?php
             }
        } // end: while ( $row = $result->fetch_assoc() )
        ?>

        <div class="clear"></div>
    </div><!-- end: detalje -->
    <div id="images">
        <?php
        $query = '
	SELECT
		sti, position, id
	FROM
		simpleshop_produkt_billeder
	WHERE
		fk_produkter_id = ' . $_GET['produkt'];

        $result = $con->query($query);
        while ($row    = $result->fetch_assoc())
        {
            ?>
            <img src="assets/images/<?php echo $row['sti'] ?>" alt="" />
            <span class="small">Klik på billedet for at se et større.</span>
            <?php
        } // while ( $row = $result->fetch_assoc())
        ?>

        <div class="clear"></div>
    </div><!-- end: images -->
</div><!-- end: produkt -->
