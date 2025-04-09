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
            <th>NAME</th>
            <th>DATE</th>
            <th>USERS</th>
            <th>EDIT</th>
        </tr>

        <?php
        if (!empty($data->events)) {
            foreach ($data->events as $event) {
                echo "<tr>";
                echo "<td>$event->Name</td>";
                echo "<td>$event->Date</td>";
                 echo '<td><a href="' . URL . 'controlpanel/signups/' . $event->ID . '">Signups</td>';
                echo '<td><a href="' . URL . 'controlpanel/edit/event/' . $event->ID . '">Edit</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="<?php echo URL; ?>controlpanel/create/event">Create Event</a>
</div>