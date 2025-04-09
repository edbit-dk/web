<div class="container">
    <ul style="float: right;">
         <li><a href = "<?php echo URL; ?>controlpanel/users/10">10</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/users/25">25</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/users/50">50</a></li>
        <li><a href="<?php echo URL; ?>controlpanel/users/999">All</a></li>
    </ul>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Company</th>
            <th>Department</th>
            <th>EDIT</th>
        </tr>

        <?php
                        $nr = 1;
        if (!empty($data->users)) {
            foreach ($data->users as $user) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$user->ID</td>";
                echo "<td>$user->Firstname</td>";
                echo "<td>$user->Lastname</td>";
                echo "<td>$user->Company</td>";
                echo "<td>$user->Department</td>";
                echo '<td><a href="' . URL . 'controlpanel/edit/user/' . $user->ID . '">Edit</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
        <a href="<?php echo URL; ?>controlpanel/create/user">Create User</a>
</div>