         <?php
// 3. Perform db query
$query = $handler->query('SELECT * FROM `pp_movies` ORDER BY id');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>CELEB</th>
<th>MOVIE</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['id'] . "</td>";
            echo "<td>" . $result['title'] . "</td>";
            echo "<td>" . $result['link'] . "</td>";
            echo "<td>" . "<a href=\"edit.php?page=edit_movies&id=" . $result['id'] . "\">Edit</a>" . "</td>";
            echo "<td>" . "<a href=\"delete.php?page=delete_movie&id=" . $result['id'] . "\">Delete</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
