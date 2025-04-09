<div class="page-wrapper">

    <div class="grid grid-pad">
        <div class="col-1-1">
            <div class="content">
                <h3 style="text-align: center;" class="heading">Newest Auctions</h3>
                <div class="bx-wrapper">
                    <ul id="bxslider">
                        <?php foreach ($data->newest_auctions as $auction): ?>

                            <li>
                                <img src="<?php
                                if (empty($auction->url) && !file_exists(UPLOADS_FOLDER . $auction->url)) {
                                    echo URL_UPLOADS . 'no-image.jpg';
                                } else {
                                    echo URL_UPLOADS . $auction->url;
                                }
                                ?>" alt="<?php echo $auction->title; ?>" />
                                <div class="caption"><span><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><h3 class="heading white"><?php echo Input::truncate($auction->title, 80, 80); ?></h3></a><?php echo $auction->start_date; ?></span></div>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <div id="bxAfter"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="auction-nav">

            <div class="grid grid-pad">
                <div class="col-1-1">
                    <div style="text-align: center;" class="content">
                        <h3 style="text-align: center;" class="heading">Categories</h3>
                        <form action="<?php echo URL; ?>auctions/search" method="GET" class="search-form">
                            <select name="category" class="cats-selector" required>
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
            <h3 style="text-align: center;" class="heading">Last Chance Auctions</h3>
            <?php foreach ($data->auctions as $auction): ?>

                <div class="col-1-3">
                    <div class="content auction-wrapper">
                        <div class="auction-header">
                            <h3 class="heading"><a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><?php echo Input::truncate($auction->title, 80, 80); ?></a></h3>
                            <p class="slabo noMargin-bottom">Ends: <?php echo $auction->end_date; ?></p>
                            <p>Category: <a href="<?php echo URL . 'auctions/search?category=' . $auction->Categories_id; ?>"><?php echo $auction->name; ?></a></p>
                            <a href="<?php echo URL . "details/auction/" . $auction->Auctions_id; ?>"><img src="<?php
                                if (empty($auction->url)) {
                                    echo URL_UPLOADS . 'demo-image.png';
                                } else {
                                    echo URL_UPLOADS . $auction->url;
                                }
                                ?>" alt="<?php echo $auction->original_name; ?>"></a>

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












</div>