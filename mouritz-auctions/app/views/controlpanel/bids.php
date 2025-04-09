<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Bids</h2>
    <table class="table table-striped" border='1'>

        <tr>
            <th>Auction</th>
            <th>User</th>
            <th>Bid</th>
            <th>Delete</th>
        </tr>

        <?php
        if (!empty($data->bids)) {
            foreach ($data->bids as $bid) {
                echo "<tr>";
                echo "<td>$bid->auction_id</td>";
                echo "<td>$bid->user_id</td>";
                echo "<td>$bid->amount</td>";
                echo '<td><form action="' . URL . 'delete/bid" method="post" onsubmit="return confirm(&#39;Are you sure?&#39;)"><input type="hidden" name="id" value="' . $bid->Bids_id . '"><input type="submit" value="Delete"></form></td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>