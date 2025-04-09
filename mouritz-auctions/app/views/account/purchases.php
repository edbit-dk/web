
<div class="grid grid-pad">
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>

    <div class="col-1-2">
        <h3 class="heading">Purchases</h3>


        <table>
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Auction ID</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nr = 1;
                if (!empty($data->purchases)) {
                    foreach ($data->purchases as $purchase) {
                        echo "<tr>";
                        echo "<td>" . $nr++ . "</td>";
                        echo "<td><a href='" . URL . 'details/auction/' . $purchase->auction_id . "'>$purchase->auction_id</td>";
                        echo "<td>$purchase->amount</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</div>



