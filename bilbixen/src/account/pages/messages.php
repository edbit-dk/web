<?php

//Perform db query
$query = $handler->query('SELECT * FROM comments ORDER BY com_ID');

echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>DATO</th>
<th>FRA</th>
<th>GODKENDT</th>
<th>Læs</th>
<th>Slet</th>
</tr>";

while ($result = $query->fetch()) {
    echo "<tr>";
    echo "<td>" . $result['message_id'] . "</td>";
    echo "<td>" . $result['message_subject'] . "</td>";
    echo "<td>" . $result['message_email'] . "</td>";
    echo "<td>" . "<a href=\"index.php?page=view_message&ID=" . $result['message_id'] . "\">Læs</a>" . "</td>";
    echo "<td>" . "<a href=\"index.php?page=delete&table=comments&col=com_id&ID=" . $result['com_id'] . "\">Slet</a>" . "</td>";
    echo "</tr>";
}
echo "</table>";
