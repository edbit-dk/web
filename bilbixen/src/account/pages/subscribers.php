         <?php
         error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// 3. Perform db query
$query = $handler->query('SELECT * FROM `rrf_subscribers` ORDER BY subscribe_ID');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>NAVN</th>
<th>EMAIL</th>
<th>Delete</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['subscribe_ID'] . "</td>";
            echo "<td>" . $result['subscribe_name'] . "</td>";
            echo "<td>" . $result['subscribe_email'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=8&table=rrf_subscribers&col=subscribe_ID&ID=" . $result['subscribe_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
