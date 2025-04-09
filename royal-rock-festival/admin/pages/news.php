         <?php
// 3. Perform db query
$query = $handler->query('SELECT * FROM `rrf_news` ORDER BY news_ID');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>DATO</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['news_ID'] . "</td>";
            echo "<td>" . $result['news_title'] . "</td>";
            echo "<td>" . $result['news_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=7&ID=" . $result['news_ID'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=8&table=rrf_news&col=news_ID&ID=" . $result['news_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
