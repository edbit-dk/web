<?php

//Perform db query
$query = $handler->query('SELECT * FROM comments ORDER BY com_id');

echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>BESKED</th>
<th>SLET</th>
</tr>";



$query = $handler->prepare('SELECT * FROM comments WHERE com_id  =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {
    echo "<td>" . $result['com_text'] . "</td>";
      echo "<td>" . "<a href=\"index.php?page=delete&table=comments&col=com_id&ID=" . $result['com_id'] . "\">Slet</a>" . "</td>";
}