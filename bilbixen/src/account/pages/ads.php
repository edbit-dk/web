         <?php
         error_reporting(E_ALL);
ini_set("display_errors", 1);
if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $accept = $_POST['sold'];
    $query = $handler->prepare('UPDATE cars SET 

    car_sold = :sold

	WHERE car_id   =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->bindValue(":sold", $accept, PDO::PARAM_STR);
    $query->execute();
}


$query = $handler->query('SELECT * FROM cars ORDER BY car_ID');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>PRIS</th>
<th>SOLGT</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['car_id'] . "</td>";
            echo "<td>" . $result['car_name'] . "</td>";
            echo "<td>" . $result['car_price'] . "</td>";
             if ($result['car_sold'] == 1) {
        ?>
        <td><form method="POST" action="">
                <input type="radio" name="sold" value="1" checked=""/> Ja
                <input type="radio" name="sold" value="0" /> Nej
                <input type="hidden" name="id" value="<?php echo $result['car_id']; ?>"/>
                <input type="submit" name="submit" value="Gem"/>
            </form>
        </td>
        <?php
    } else {
        ?>
        <td><form method="POST" action="">
                <input type="radio" name="sold" value="1" /> Ja
                <input type="radio" name="sold" value="0" checked=""/> Nej
                <input type="hidden" name="id" value="<?php echo $result['car_id']; ?>"/>
                <input type="submit" name="submit" value="Gem"/>
            </form>
        </td>
        <?php
    }
            echo "<td>" . "<a href=\"index.php?page=edit_ad&ID=" . $result['car_id'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=delete_ad&ID=" . $result['car_id'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
