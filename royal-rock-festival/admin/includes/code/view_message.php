<?php
//Perform db query
$query = $handler->query('SELECT * FROM `rrf_messages` ORDER BY message_ID');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>BESKED</th>
<th>SLET</th>
</tr>";



$query = $handler->prepare('SELECT * FROM rrf_messages WHERE message_ID  =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){
            echo "<td>" . $result['message_content'] . "</td>";
 			echo "<td>" . "<a href=\"index.php?page=8&table=rrf_messages&col=message_ID&ID=" . $result['message_ID'] . "\">Slete</a>" . "</td>";
            }