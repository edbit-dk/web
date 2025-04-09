<div class="container">
    <div class="auction-nav">

        <div class="grid grid-pad">
            <div class="col-1-1">
                <div style="text-align: center;" class="content">
                    <h3 style="text-align: center;" class="heading">Categories</h3>
                    <form action="<?php echo URL; ?>auctions/search" method="GET" class="search-form">
                        <select name="category" class="cats-selector">
                            <option value=""></option>
                            <?php
                            if (!empty($data->categories)) {
                                foreach ($data->categories as $category) {
                                    ?>

                                    <option value="<?php echo $category->Categories_id; ?>"><?php echo $category->name; ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <button type="submit" class="search-icon"><i class="fa fa-search fa-fw"></i></button>
                    </form>

                </div>
            </div>




        </div>
    </div>

    <div class="grid grid-pad">
        <?php
        if (!empty($data->feedback)) {
            foreach ($data->feedback as $feedback) {
                echo $feedback;
            }
        }
        ?>

        <?php foreach ($data->auctions as $auction): ?>

            <div class="col-1-3">
                <div class="content auction-wrapper">
                    <div class="auction-header">
                        <h3 class="heading"><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><?php echo Input::truncate($auction->title, 80, 80); ?></a></h3>

                        <p class="slabo noMargin-bottom">Ends in: <?php echo $auction->end_date ?> </p>
                        <p>Category: <a href="<?php echo URL . 'auctions/search?category=' . $auction->Categories_id; ?>"><?php echo $auction->name; ?></a></p>
                        <img src="<?php
                        if (empty($auction->url)) {
                            echo URL_UPLOADS . 'no-image.jpg';
                        } else {
                            echo URL_UPLOADS . $auction->url;
                        }
                        ?>" alt="<?php echo $auction->title; ?>"/>
                        <br>
                        <p>By: <a href="<?php echo URL . 'details/user/' . $auction->Users_id; ?>"><?php echo $auction->username; ?></a></p>
                    </div>

                    <div class="auction-content">
                        <?php echo Input::decode(Input::truncate($auction->description, 80, 80)); ?>
                        <br><br>
                        <p><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>">Read More...</a></p>


                    </div>


                </div>
            </div>

        <?php endforeach; ?>
    </div>

</div>
