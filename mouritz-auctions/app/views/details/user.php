<div class="container">
    <h3 class="heading">User Details</h3>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->user)) {
            foreach ($data->user as $user) {
                echo "<tr>";
                echo "<td>$user->username</td>";
                echo "<td>" . $user->firstname . " " . $user->lastname . "</td>";
                echo "<td>$user->email</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <h3 class="heading">User Auctions</h3>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr. </th>
            <th>Auction</th>
            <th>Status</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->auctions)) {
            foreach ($data->auctions as $auction) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td><a href='" . URL . 'details/auction/' . $auction->Auctions_id . "'>$auction->title</td>";
                if ($auction->status == 0) {

                    echo "<td class=\"status\"><h3 class=\"not-bought\">AUCTION OPEN</h3></td>";
                }
                if ($auction->status == 1) {

                    echo "<td class=\"status\"><h3 class=\"bought\">AUCTION CLOSED</h3></td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>