<div class="container">
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>FILE</th>
            <th>DATE</th>
            <th>ALBUM</th>
            <th>COMPANY</th>
            <th>EDIT</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->uploads)) {
            foreach ($data->uploads as $upload) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo '<td><a href="' . ASSETS . 'uploads/' . $upload->File . '"><img width="100" src="' . ASSETS . 'uploads/' . $upload->File . '"></a></td>';
                echo "<td>$upload->Date</td>";
                echo "<td>$upload->Album</td>";
                echo "<td>$upload->Company</td>";
                echo '<td><a href="' . URL . 'files/remove/' . $upload->File . '/' . $upload->ID . '">Remove</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>