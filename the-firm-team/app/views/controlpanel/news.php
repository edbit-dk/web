<div class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo "<p>$error</p>";
        }
    }
    ?>
    <table class="table table-striped" border='1'>

        <tr>
            <th>DATE</th>
            <th>NAME</th>
            <th>Edit</th>
        </tr>

        <?php
        if (!empty($data->news)) {
            foreach ($data->news as $news) {
                echo "<tr>";
                echo "<td>$news->Date</td>";
                echo "<td>$news->Name</td>";
                echo '<td><a href="' . URL . 'controlpanel/edit/news/' . $news->ID . '">Edit</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="<?php echo URL; ?>controlpanel/create/news">Create News</a>
</div>