<?php
// UPDATE DATABASE WITH FROM FIELD VALUES
if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $accept = $_POST['accept'];
    $query = $handler->prepare('UPDATE comments SET 

    com_approved = :approved

	WHERE com_id   =  :ID');
    $query->bindValue(':ID', $ID, PDO::PARAM_STR);
    $query->bindValue(":approved", $accept, PDO::PARAM_STR);
    $query->execute();
}

$query = $handler->query('SELECT * FROM comments ORDER BY com_id');

echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>DATO</th>
<th>FRA</th>
<th>ANNONCE</th>
<th>EMAIL</th>
<th>GODKENDT</th>
<th>Læs</th>
<th>Slet</th>
</tr>";

while ($result = $query->fetch()) {
    echo "<tr>";
    echo "<td>" . $result['com_id'] . "</td>";
    echo "<td>" . $result['com_date'] . "</td>";
    echo "<td>" . $result['com_name'] . "</td>";
    echo "<td>" . $result['car_id'] . "</td>";
    echo "<td>" . $result['com_email'] . "</td>";
    if ($result['com_approved'] == 1) {
        ?>
        <td><form method="POST" action="">
                <input type="radio" name="accept" value="1" checked=""/> Ja
                <input type="radio" name="accept" value="0" /> Nej
                <input type="hidden" name="id" value="<?php echo $result['com_id']; ?>"/>
                <input type="submit" name="submit" value="Godkend"/>
            </form>
        </td>
        <?php
    } else {
        ?>
        <td><form method="POST" action="">
                <input type="radio" name="accept" value="1" /> Ja
                <input type="radio" name="accept" value="0" checked=""/> Nej
                <input type="hidden" name="id" value="<?php echo $result['com_id']; ?>"/>
                <input type="submit" name="submit" value="Godkend"/>
            </form>
        </td>
        <?php
    }


    echo "<td>" . "<a href=\"index.php?page=view_comment&ID=" . $result['com_id'] . "\">Læs</a>" . "</td>";
    echo "<td>" . "<a href=\"index.php?page=delete_com&ID=" . $result['com_id'] . "\">Slet</a>" . "</td>";
    echo "</tr>";
}
echo "</table>";


