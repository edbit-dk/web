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
            <th>ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>EDIT</th>
        </tr>

        <?php
        if (!empty($data->users)) {
            foreach ($data->users as $user) {
                echo "<tr>";
                echo "<td>$user->ID</td>";
                echo "<td>$user->Firstname</td>";
                echo "<td>$user->Lastname</td>";
                echo '<td><a href="' . URL . 'users/cancel/' . $user->Event_ID . '">Remove</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="<?php echo URL; ?>controlpanel/create/signup">Add User</a>
</div>