<div id="krummer">Du er her: <a href="index.php">Forside</a>><em>Katalog</em></div>
<?php
$query  = "SELECT * FROM {$_prefix}_categories";
$result = $con->query($query);

while ($row = $result->fetch_assoc())
{
    ?>
    <div class="kategori">
        <h2><a href="index.php?page=products&category=<?php echo $row["ID"]; ?>"><?php echo $row["name"]; ?></a></h2>
        <p><?php echo $row["desc"]; ?></p>
    </div>
    <?php
} // end: while ($row = $result->fetch_assoc())
