<div class="container">
    <form method="post" action="<?php echo URL ?>employees/search" style="float: left;">
        <p> Firstname: <input name="Firstname" type="search"> 
            Lastname: <input name="Lastname" type="search">
            <input type="submit" value="Søg"> </p>
    </form>
    <ul style="float: right; padding-left: 10px;">
        <li><a href = "<?php echo URL; ?>employees/10">10</a></li>
        <li><a href = "<?php echo URL; ?>employees/25">25</a></li>
        <li><a href = "<?php echo URL; ?>employees/50">50</a></li>
        <li><a href="<?php echo URL; ?>employees/999">All</a></li>
    </ul>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Company</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->users)) {
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