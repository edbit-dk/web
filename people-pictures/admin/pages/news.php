         <?php
// 3. Perform db query
$query = $handler->query('SELECT * FROM `pp_news` ORDER BY id');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITLE</th>
<th>CELEB</th>
<th>DATE</th>
<th>Edit</th>
<th>Delete</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['id'] . "</td>";
            echo "<td>" . $result['title'] . "</td>";
            echo "<td>" . $result['celeb'] . "</td>";
            echo "<td>" . $result['date'] . "</td>";
            echo "<td>" . "<a href=\"edit.php?page=edit_news&id=" . $result['id'] . "\">Edit</a>" . "</td>";
            echo "<td>" . "<a href=\"delete.php?page=delete_news&id=" . $result['id'] . "\">Delete</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
