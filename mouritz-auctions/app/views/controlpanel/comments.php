 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Comments</h2>
    <table class="table table-striped" border='1'>

        <tr>
            <th>AUCTION</th>
            <th>DATE</th>
            <th>COMMENT</th>
            <th>Delete</th>
        </tr>

        <?php
        if (!empty($data->comments)) {
            foreach ($data->comments as $data) {
                echo "<tr>";
                echo "<td><a href='". URL . "details/auction/" . $data->auction_id ."'>$data->auction_id</a></td>";
                echo "<td>$data->date</td>";
                echo "<td>" . Input::decode($data->comment) . "</td>";
                echo '<td><form action="' . URL . 'delete/comment" method="post" onsubmit="return confirm(&#39;Are you sure?&#39;)"><input type="hidden" name="id" value="' . $data->Comments_id . '"><input type="submit" value="Delete"></form></td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>