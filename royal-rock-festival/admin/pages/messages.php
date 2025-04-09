<?php
//Perform db query
$query = $handler->query('SELECT * FROM `rrf_messages` ORDER BY message_ID');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>EMAIL</th>
<th>MOBIL</th>
<th>DATO</th>
<th>Læs</th>
<th>Slet</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['message_ID'] . "</td>";
            echo "<td>" . $result['message_title'] . "</td>";
            echo "<td>" . $result['message_email'] . "</td>";
    		echo "<td>" . $result['message_phone'] . "</td>";
            echo "<td>" . $result['message_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=3&ID=" . $result['message_ID'] . "\">Læs</a>" . "</td>";
            	echo "<td>" . "<a href=\"index.php?page=8&table=rrf_messages&col=message_ID&ID=" . $result['message_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
