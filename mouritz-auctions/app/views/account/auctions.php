
<div class="grid grid-pad">
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>

    <?php foreach ($data->auctions as $auction): ?>


        <div class="col-1-2">
            <div class="content auction-wrapper">
                <div class="auction-header">
                    <h3 class="heading"><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><?php echo Input::truncate($auction->title, 80, 80); ?></a></h3>
                    <p class="slabo noMargin-bottom">Ends: <?php echo $auction->end_date; ?> </p>
                    <p>Category: <a href="<?php echo URL . 'auctions/search?category=' . $auction->Categories_id; ?>"><?php echo $auction->name; ?></a></p>
                    <a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><img src="<?php
                        if (empty($auction->url)) {
                            echo URL_UPLOADS . 'no-image.jpg';
                        } else {
                            echo URL_UPLOADS . $auction->url;
                        }
                        ?>" alt="<?php echo $auction->title; ?>"/></a>
                    <p>By: <a href="<?php echo URL . 'details/user/' . $auction->Users_id; ?>"><?php echo $auction->username; ?></a></p>                 
                    <p>Ends in: </p>
                    <div class="countdown" data-countdown="<?php echo $auction->end_date ?>"></div>
                </div>

                <div class="auction-content">
                    <p> <?php echo Input::decode(Input::truncate($auction->description, 20, 20)); ?> ... </p> 
                    <br>
                    <p><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>">Details</a></p>
                    <p><a href="<?php echo URL . "account/update/auction/" . $auction->Auctions_id; ?>">Update</a></p>
                    <form action="<?php echo URL . "delete/auction/" . $auction->Auctions_id ?>" method="post" onsubmit="return confirm(&#39; Are you sure you want to delete this image? &#39;)">
                        <input type="hidden" name="id" value="<?php echo $auction->Auctions_id; ?>">
                        <input type="submit" name="submit" value="Delete">
                    </form>
                </div>


            </div>
        </div>

    <?php endforeach; ?>
</div>



