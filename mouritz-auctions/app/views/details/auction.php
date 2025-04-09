<div class="container">
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }

    if (!empty($data->inputs)) {
        foreach ($data->inputs as $input) {
            
        }
    }

    if (!empty($data->auction)) {
        foreach ($data->auction as $auction) {
            
        }
    }
    if (!empty($data->bids)) {
        foreach ($data->bids as $bid) {
            
        }
    }
    if ($auction->end_date <= LOCAL_TIMESTAMP && $auction->status == 0) {
        ?>
        <form action="<?php echo URL; ?>update/ended" method="post" id="status">
            <input name="amount" type="hidden" value="<?php echo $auction->amount; ?>">
            <input name="user" type="hidden" value="<?php echo $auction->user_id; ?>">
            <input name="ID" type="hidden" value="<?php echo $auction->Auctions_id; ?>">
            <input  type="submit" style="display: none;">
        </form>

        <script type="text/javascript">
            document.getElementById('status').submit(); // SUBMIT FORM
        </script>
        <?php
    }
    foreach ($data->auction as $auction):
        ?>


        <div class="col-1-1">
            <div class="content auction-wrapper">
                <div class="auction-header">
                    <h3 class="heading"><a
                            href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><?php echo Input::truncate($auction->title, 80, 80); ?></a>
                    </h3>
                    <p>Category: <a href="<?php echo URL . 'auctions/search?category=' . $auction->Categories_id; ?>"><?php echo $auction->name; ?></a></p>
                    <img src="<?php
                    if (empty($auction->url)) {
                        echo URL_UPLOADS . 'no-image.jpg';
                    } else {
                        echo URL_UPLOADS . $auction->url;
                    }
                    ?>" alt="<?php echo $auction->title; ?>"/>

                    <p>By: <a href="<?php echo URL . 'details/user/' . $auction->Users_id; ?>"><?php echo $auction->username; ?></a></p>

                    <?php
                    if ($auction->status == 0) {
                        ?>
                        <p>Ends in: </p>
                        <div class="countdown" data-countdown="<?php echo $auction->end_date ?>"></div>
                        <br>
                        <?php
                    }
                    if ($auction->status == 0) {

                        echo "<div class=\"status\"><h3 class=\"not-bought\">AUCTION OPEN</h3></div>";
                    }
                    if ($auction->status == 1) {

                        echo "<div class=\"status\"><h3 class=\"bought\">AUCTION CLOSED</h3></div>";
                    }
                    ?>
                </div>

                <div class="auction-content">
    <?php echo Input::decode($auction->description); ?>
                    <br><br>

                </div>


            </div>
        </div>

<?php endforeach; ?>

    <br>

    <h3 class="heading">Gallery</h3>
    <div id="thumbnails" class="yoxview">
        <?php
        if (!empty($data->images)) {
            foreach ($data->images as $image) {
                ?>

                <a href="<?php echo URL_UPLOADS . $image->url ?>">
                    <img width="150" src="<?php echo URL_UPLOADS . $image->url ?>" alt="<?php echo $auction->title; ?>" title="<?php echo $auction->title; ?>"/>
                </a>

                <?php
            }
        }
        ?>
    </div>
    <?php
    if ($user->isLoggedIn()) {
        ?>
        <br>
        <br>

        <!--Buy now form-->
    <?php if ($auction->status == 0) { ?>
            <form action="<?php echo URL; ?>update/status" method="post">
                <h3 class="heading">Buy now!</h3>
                <input type="text" name="amount" value="<?php echo $auction->buy_price; ?>" readonly/>
                <input type="hidden" name="user" value="<?php echo $user->data()->Users_id; ?>"/>
                <input type="hidden" name="ID" value="<?php echo $auction->Auctions_id; ?>"/>
                <input type="submit" name="submit" value="Buy"/>
            </form>

            <!--Bid form-->
            <form method="post" action="<?php echo URL; ?>create/bid">
                <h3 class="heading">Make Bid: </h3>
                <input type="text" name="bid" value="<?php
                if (empty($auction->amount)) {
                    echo $auction->start_price;
                } else {
                    echo $auction->amount;
                }
                ?>" required/>
                <input type="hidden" name="buy_price" value="<?php echo $auction->buy_price; ?>"/>
                <input type="hidden" name="start_price" value="<?php echo $auction->start_price; ?>"/>
                <input type="hidden" name="max_bid" value="<?php echo $auction->amount; ?>"/>
                <input type="hidden" name="user" value="<?php echo $user->data()->Users_id; ?>"/>
                <input type="hidden" name="ID" value="<?php echo $auction->Auctions_id; ?>"/>
                <input type="submit" name="submit" value="Bid"/>
                <br>
                <h3 class="heading">Bids: </h3>
                <table class="table table-striped bids-table" border='1'>

                    <tr>
                        <th>Nr.</th>
                        <th>Bids</th>
                        <th>Bidder</th>
                    </tr>

                    <?php
                    $nr = 1;
                    $x = 1;
                    if (!empty($data->bids)) {
                        foreach ($data->bids as $bid) {
                            echo "<tr>";
                            echo "<td>" . $nr++ . "</td>";
                            echo "<td>$bid->amount</td>";
                            echo "<td><a href='" . URL . 'details/user/' . $auction->user_id . "'>$bid->username</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </form>
            <?php
        }
        ?>

        <br>

        <!--Make comments form-->
        <form method="post" action="<?php echo URL; ?>create/comment" data-parsley-validate>
            <a name="commentbox"></a>
            <h3 class="heading">Comment: </h3>
            <p>(min 20 - max 500 words)</p>
            <textarea id="editor"
                      name="comment"
                      placeholder="Description"
                      required>
                          <?php
                          echo $input['comment'];
                          if (!empty($_POST['quote'])) {
                              echo "<b>" . $_POST['user'] . " wrote:</b>";
                              echo $_POST['quote'];
                              echo "------------------------------------<br><br><br>";
                          }
                          ?>
            </textarea>
            <input type="submit" name="submit" value="Submit">
            <input type="hidden" name="user" value="<?php echo $user->data()->Users_id; ?>"/>
            <input type="hidden" name="ID" value="<?php echo $auction->Auctions_id; ?>"/><br>
        </form>
        <?php
    }
    ?>

    <br>

    <!--Comments-->
    <h3 class="heading">Comments</h3>

    <div class="grid grid-pad">
        <table>
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Date</th>
                    <th>By</th>
                    <th>Comment</th>
                    <th>Qoute</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($data->comments as $comment):
                    ?>

                    <tr>
                        <td><?php echo $x++; ?></td>
                        <td><p><?php echo $comment->date; ?></p></td>
                        <td><p><?php echo $comment->username; ?></p></td>
                        <td><?php echo Input::decode($comment->comment); ?></td>
                        <td>
                            <form method="post" action="#commentbox">
                                <input type="hidden" 
                                       name="quote" 
                                       value="<?php echo $comment->comment; ?>">
                                <input type="hidden" 
                                       name="user" 
                                       value="<?php echo $comment->username; ?>">
                                <input type="submit" value="Quote">
                            </form>
                        </td>
                    </tr>


                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>