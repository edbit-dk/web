<div class="container">
      <div class="row ">
        <div class="span-12 ">
            <h3>Events</h3>
        </div>
    </div>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <ul style="float: right;">
        <li><a href = "<?php echo URL; ?>events/10">10</a></li>
        <li><a href = "<?php echo URL; ?>events/25">25</a></li>
        <li><a href = "<?php echo URL; ?>events/50">50</a></li>
        <li><a href="<?php echo URL; ?>events/999">All</a></li>
    </ul>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>EVENT</th>
            <th>DATE</th>
            <th>SIGNUP</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->events)) {
            foreach ($data->events as $event) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$event->Name</td>";
                echo "<td>$event->Date</td>";
                echo '<td><a href="' . URL . 'users/signup/' . $event->ID . '">Signup</a></td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="<?php echo URL; ?>events/signups">Signups</a>
</div>