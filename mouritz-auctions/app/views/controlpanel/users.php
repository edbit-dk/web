<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Users</h2>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Delete</th>
        </tr>

        <?php
        if (!empty($data->users)) {
            foreach ($data->users as $user) {
                echo "<tr>";
                echo "<td>$user->username</td>";
                echo "<td>$user->firstname</td>";
                echo "<td>$user->lastname</td>";
                echo '<td><form action="' . URL . 'delete/user" method="post" onsubmit="return confirm(&#39;Are you sure?&#39;)"><input type="hidden" name="id" value="' . $user->Users_id . '"><input type="submit" value="Delete"></form></td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>