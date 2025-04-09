<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Auctions</h2>
    <table class="table table-striped" border='1'>

        <tr>
            <th>AUCTION</th>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>TITLE</th>
            <th>IMAGE</th>
            <th>Delete</th>
        </tr>

        <?php
        if (!empty($data->auctions)) {
            foreach ($data->auctions as $auction) {
                echo "<tr>";
                echo "<td><a href='" . URL . "details/auction/" . $auction->Auctions_id . "'>$auction->Auctions_id</a></td>";
                echo "<td>$auction->start_date</td>";
                echo "<td>$auction->end_date</td>";
                echo "<td>" . Input::decode($auction->title) . "</td>";
                echo "<td><img width='150' src='" . URL_UPLOADS . $auction->url . "'/></td>";
                echo '<td><form action="'. URL .'delete/auction" method="post" onsubmit="return confirm(&#39;Are you sure?&#39;)"><input type="hidden" name="id" value="'. $auction->Auctions_id .'"><input type="submit" value="Delete"></form></td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>