<div class="line ad-wrapper">

    <div class="unit big-heading lastUnit">
        <h2>Nyheder</h2>

    </div>
    <div class="unit size1of5 "></div>

    <div class="unit size3of5 ">
        <?php
        foreach ($news as $data) {
            ?>
            <h2><?php echo $data->title; ?></h2>
            <small>Oprettet <?php
                $date = strtotime($data->date);
                echo date('d/m/Y', $date);
                ?> af <i><?php echo $data->author; ?></i></small>

            <p><?php echo $data->content; ?></p><br>
            <?php
        }
        ?>
        <a href="<?php echo URL; ?>public/api/feed.php" rel="alternate" type="application/rss+xml" target="_blank">
            <img src="http://www.feedburner.com/fb/images/pub/feed-icon32x32.png" alt="" style="width: 20px; height: 20px;"/>
        </a>

        <a href="<?php echo URL; ?>public/api/feed.php" rel="alternate" type="application/rss+xml" target="_blank">
            Abonnér
        </a>
    </div>

    <div class="unit size1of5 "></div>
</div>

</div>
</div>

