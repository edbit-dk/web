<?php

// 3. Perform db query
$query = $handler->query('SELECT * FROM `rrf_events` ORDER BY event_ID');

echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>DAT0</th>
<th>DAG</th>
<th>START</th>
<th>TOP EVENT</th>
<th>TOP TALENTER</th>
<th>TOP BILLEDE</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";
while ($result = $query->fetch()) {
    echo "<tr>";
    echo "<td>" . $result['event_ID'] . "</td>";
    echo "<td>" . $result['event_title'] . "</td>";
    echo "<td>" . $result['event_date'] . "</td>";
    echo "<td>" . $result['event_day'] . "</td>";
    echo "<td>" . $result['event_start'] . "</td>";
    echo "<td>" . $result['event_top'] . "</td>";
    echo "<td>" . $result['event_talents'] . "</td>";
    echo "<td>" . $result['event_top_image'] . "</td>";
    echo "<td>" . "<a href=\"index.php?page=11&ID=" . $result['event_ID'] . "\">Redigér</a>" . "</td>";
    echo "<td>" . "<a href=\"index.php?page=8&table=rrf_events&col=event_ID&ID=" . $result['event_ID'] . "\">Slet</a>" . "</td>";
    echo "</tr>";
}
echo "</table>";

