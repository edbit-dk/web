<div class="container">
    <h2>News comments</h2>
    <table class="table table-striped" border='1'>

        <tr>
            <th>DATE</th>
            <th>CONTENT</th>
            <th>Delete</th>
        </tr>

        <?php
        if (!empty($data->comments)) {
            foreach ($data->comments as $data) {
                echo "<tr>";
                echo "<td>$data->Date</td>";
                echo "<td>$data->Content</td>";
                echo '<td><a href="' . URL . 'comments/delete/' . $data->ID . '">Delete</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>