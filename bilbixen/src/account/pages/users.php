<?php
//Perform db query
$query = $handler->query('SELECT * FROM users ORDER BY user_id');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>BRUGERNAVN</th>
<th>ADGANGSKODE</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['user_id'] . "</td>";
            echo "<td>" . $result['user_name'] . "</td>";
            echo "<td>" . $result['user_pass'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=edit_users&ID=" . $result['user_id'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=delete_user&ID=" . $result['user_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>