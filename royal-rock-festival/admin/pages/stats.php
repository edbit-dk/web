<?php
// 3. Perform db query
$query = $handler->query('SELECT * FROM `rrf_stats` ORDER BY stats_ID');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>STØTTER</th>
<th>MUSIKERE</th>
<th>KONCERTER</th>
<th>Edit</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['stats_support'] . "</td>";
            echo "<td>" . $result['stats_music'] . "</td>";
   			echo "<td>" . $result['stats_concerts'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=19&ID=" . $result['stats_ID'] . "\">Redigér</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
