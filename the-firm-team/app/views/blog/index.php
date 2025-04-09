<div class="container">
    <table class="table table-striped" border='1'>

        <tr>
            <th>DATE</th>
            <th>NAME</th>
            <th>READ</th>
        </tr>

        <?php
        if (!empty($data->news)) {
            foreach ($data->news as $news) {
                echo "<tr>";
                echo "<td>$news->Date</td>";
                echo "<td>$news->Name</td>";
                 echo '<td><a href="' . URL . 'blog/read/' . $news->ID . '">Read more</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>