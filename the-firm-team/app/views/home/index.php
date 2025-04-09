<div class="content">
    <?php
    if (!empty($data->news)) {
        foreach ($data->news as $news) {
            $news->ID;
            $news->Name;
            $news->Content;
        }
    }
    ?>
    <div class="row">
        <div class=" news-slider">
            <ul class="slides">
                <?php foreach ($data->news as $news) { ?>
                    <li>
                        <div class="slide-box">
                            <h2><?php echo $news->Name; ?></h2>
                            <a href="<?php echo URL; ?>blog/read/<?php echo $news->ID; ?>">Read more</a>
                        </div>
                        <img src="<?php echo URL; ?>public/uploads/img01.png" />
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="row slide-banner-box">
        <div class="span-2 ">
            <h5>Nyheder ></h5>
        </div>
        <div class="span-10">
            <div class="slide-banner">
                <ul class="slides">
                    <?php foreach ($data->news as $news) { ?>
                        <li>
                            <h3><?php echo $news->Name; ?></h3>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>



    <div class="row">
        <div style="float: right;" class="span-4 sidebar-right">
            <div class="padding">
                <div class="module">
                    <h6 class="title">Følg os på facebook</h6>
                    <div class="inner-padding">
                        <div class="fb-follow" data-href="https://www.facebook.com/zuck" data-width="50" 
                             data-height="300" data-colorscheme="light" data-layout="standard" data-show-faces="true">
                        </div>
                    </div>
                </div>
                <div class="module">
                    <h6 class="title">Latest picture galleries</h6>

                    <?php
                    if (!empty($data->albums)) {
                        foreach ($data->albums as $album) {
                            ?>
                            <div style="padding-top: 21px;" class="span-6">
                                <?php
                                echo '<p>By ' . $album->Company . '</p>';
                                echo '<p>Date ' . date("d/m/Y", strtotime($album->Date)) . '</p>';
                                echo '<h5>' . $album->Name . '</h5>';
                                echo '<a href="' . URL . 'gallery/album/' . $album->ID . '"><img width="115" height="80" src="' . ASSETS . 'uploads/' . $album->File . '"></a>';
                                ?></div>
                            <?php
                        }
                    }
                    ?>
                    <div class="span-12">
                    <a href="<?php echo URL ?>gallery/pictures"><p class="read-more">More pictures &nbsp<span class="more-link"> > </span></p></a>
                    </div>
                    </div>
                <!--                <div class="module">
                                    <h6 class="title">Latest videos</h6>
                                    <div class="row">
                                        <div class="span-6">
                                            test
                                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                
                                        </div>
                                        <div class="span-6">
                                            test
                                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                                            <a href="#"><p class="read-more">more videos &nbsp<span class="more-link"> > </span></p></a>
                                        </div>
                                    </div>
                                </div>-->
            </div>
        </div>

        <?php foreach ($data->news as $news) { ?>
            <div class="span-8">
                <div class="row ">
                    <div class="span-12">
                        <h6 class="title">News &nbsp<span>| <?php echo date("d/m/Y H:i:s", strtotime($news->Date)); ?></span></h6>
                        <h3><?php echo $news->Name; ?></h3>
                    </div>
                </div>
                <div class="row news-feed">
                    <div class="span-5">
                        <a href="news"><img src="<?php echo URL; ?>public/uploads/img02.png"></a>
                    </div>
                    <div class="span-7">
                        <p><?php echo $news->Content; ?></p>
                        <a href="<?php echo URL ?>blog/read/<?php echo $news->ID; ?>"><p class="read-more">Read more &nbsp<span class="more-link"> > </span></p></a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

