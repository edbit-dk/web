<div class="container">
    <ul style="float: right;">
        <li><a href = "<?php echo URL; ?>controlpanel/create/signup/10">10</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/create/signup/25">25</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/create/signup/50">50</a></li>
        <li><a href="<?php echo URL; ?>controlpanel/create/signup/999">All</a></li>
    </ul>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Company</th>
            <th>Department</th>
            <th>SIGNUP</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->data)) {
            foreach ($data->data as $user) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$user->ID</td>";
                echo "<td>$user->Firstname</td>";
                echo "<td>$user->Lastname</td>";
                echo "<td>$user->Company</td>";
                echo "<td>$user->Department</td>";
                echo '<td><a href="' . URL . 'signups/add/' . $user->ID . '/' . $user->Company . '">Add</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>