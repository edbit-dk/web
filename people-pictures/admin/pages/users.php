<?php
$query = $handler->query('SELECT * FROM `pp_users` ORDER BY id');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>BRUGERNAVN</th>
<th>ADGANGSKODE</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['id'] . "</td>";
            echo "<td>" . $result['user'] . "</td>";
            echo "<td>" . $result['pass'] . "</td>";
             echo "<td>" . "<a href=\"edit.php?page=edit_users&id=" . $result['id'] . "\">Edit</a>" . "</td>";
            echo "<td>" . "<a href=\"delete.php?page=delete_user&id=" . $result['id'] . "\">Delete</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        

