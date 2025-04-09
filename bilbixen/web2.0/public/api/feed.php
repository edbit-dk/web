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

$query = $handler->query('SELECT * FROM news ORDER BY id');

echo "<?xml version='1.0' encoding='UTF-8'?>";
?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <?php
    while ($result = $query->fetchObject()) {
        ?>
        <entry>
            <title><?php echo $result->title; ?></title>
            <description><?php echo $result->content; ?></description>
            <published><?php echo $result->date; ?></published>
            <author>
                <name><?php echo $result->author; ?></name>
            </author>
        </entry>
        <?php
    }
    ?>
</feed>