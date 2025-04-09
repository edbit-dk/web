<?php
if (!empty($data->feedback)) {
    foreach ($data->feedback as $feedback) {
        echo $feedback;
    }
}
?>
<p>Welcome <a href="<?php echo URL; ?>account/profile"><?php echo Input::encode($data->user->data()->$Username); ?></a>!</p>
<p>From here you can se all relevant information about your bids, purchases, auctions and more.</p>

<br>
<h3 class="heading">Auctions</h3>
<table>
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Title</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        if (!empty($data->auctions)) {
            foreach ($data->auctions as $auction) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td><a href='" . URL . 'details/auction/' . $auction->Auctions_id . "'>$auction->title</td>";
                echo "<td><a href='" . URL . 'auctions/search?category=' . $auction->Categories_id . "'>$auction->name</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br>
<h3 class="heading">Bids</h3>
<table class="table table-striped" border='1'>

    <tr>
        <th>Nr.</th>
        <th>Auction ID</th>
        <th>Bids</th>
    </tr>

    <?php
    $nr = 1;
    if (!empty($data->bids)) {
        foreach ($data->bids as $bid) {
            echo "<tr>";
            echo "<td>" . $nr++ . "</td>";
            echo "<td><a href='" . URL . 'details/auction/' . $bid->auction_id . "'>$bid->auction_id</td>";
            echo "<td>$bid->amount</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<br>
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
                echo "<td><a href='" . URL . 'account/purchases' . "'>$purchase->auction_id</td>";
                echo "<td>$purchase->amount</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<br>
<h3 class="heading">Comments</h3>
<table>
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Auction ID</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        if (!empty($data->comments)) {
            foreach ($data->comments as $comment) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td><a href='" . URL . 'details/auction/' . $comment->auction_id . "'>$comment->auction_id</td>";
                echo "<td>$comment->date</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>


