<?php
$query = $handler->query('SELECT * FROM `pp_celebs` ORDER BY id');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>NAME</th>
<th>HEIGHT</th>
<th>BIRTH</th>
<th>BIRTH PLACE</th>
<th>IMG</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['id'] . "</td>";
            echo "<td>" . $result['name'] . "</td>";
            echo "<td>" . $result['height'] . "</td>";
            echo "<td>" . $result['birth'] . "</td>";
            echo "<td>" . $result['birth_place'] . "</td>";
            echo "<td>" . $result['file'] . "</td>";
             echo "<td>" . "<a href=\"edit.php?page=edit_celebs&id=" . $result['id'] . "\">Edit</a>" . "</td>";
            echo "<td>" . "<a href=\"delete.php?page=delete_celeb&id=" . $result['id'] . "\">Delete</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";


