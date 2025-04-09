<?php
//Perform db query
$query = $handler->query('SELECT * FROM `rrf_users` ORDER BY user_ID');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>BRUGERNAVN</th>
<th>ADGANGSKODE</th>
<th>NAVN</th>
<th>EMAIL</th>
<th>REGISTRERET</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['user_ID'] . "</td>";
            echo "<td>" . $result['user_login'] . "</td>";
            echo "<td>" . $result['user_pass'] . "</td>";
            echo "<td>" . $result['user_name'] . "</td>";
            echo "<td>" . $result['user_email'] . "</td>";
            echo "<td>" . $result['user_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=21&ID=" . $result['user_ID'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=8&table=rrf_users&col=user_ID&ID=" . $result['user_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>