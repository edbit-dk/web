<div class="container"> 
    <table class="table table-striped" border='1'>


        <?php
        $nr = 1;
        if (!empty($data->users)) {
            ?>
            <tr>
                <th>Nr.</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Company</th>
            </tr>
            <?php
            foreach ($data->users as $user) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$user->Firstname</td>";
                echo "<td>$user->Lastname</td>";
                echo "<td>$user->Company</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

</div>