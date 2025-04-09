<?php
header('Content-Type: application/xml; charset=utf-8');

$db_driver = "mysql";
$db_host = "127.0.0.1";
$db_name = "wsdk_DWP-Bilbixen";
$username = "wsdk_admin";
$passwd = "websupport.dk";

try {

    $handler = new PDO("$db_driver:host=$db_host;dbname=$db_name;charset=utf8", $username, $passwd);
    $handler->exec("set names utf8");
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    $errormessage = $error->getMessage();
    echo $errormessage;
}

$query = $handler->query('SELECT * FROM openinghours ORDER BY id');

echo "<?xml version='1.0' encoding='UTF-8'?>";
?>
<bilbixen>
    <?php
    while ($result = $query->fetchObject()) {
        ?>
        <week>
            <day><?php echo $result->day; ?></day>
            <time><?php echo $result->time; ?></time>
        </week>
        <?php
    }
    ?>
</bilbixen>