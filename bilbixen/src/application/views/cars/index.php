<!--Content start-->
<div class="line inner-content content-wrapper">
    <div class="unit size1of1 ad-categories">
        <h2>Personbiler</h2>
    </div>

    <div class="ad-wrapper">
        <?php
        foreach ($cats1 as $cat1) {
            $price = (($_SESSION) ? (($cat1->price - ($cat1->price * 0.25)) * 0.9) : $cat1->price);
            ?>
            <div class="unit size1of3">
                <img src="<?php echo URL; ?>public/img/cars/<?php if (isset($cat1->image)) echo $cat1->image; ?>">
                <div class="ad-price ">
                    <h2><?php if (isset($price)) echo number_format($price, 0, ',', '.'); ?> DKK</h2>
                </div>
                <div class="ad-comment ">
                    <div class="ad-box">
                        <h2>  <?php if (isset($cat1->amount_of_comments)) echo $cat1->amount_of_comments; ?></h2>
                    </div>
                </div>
                <div class="ad-info">
                    <h2 style="display: inline;"><?php if (isset($cat1->car)) echo $cat1->car; ?></h2>  
                    <h2 style="color: red; display: inline;"><?php if (isset($cat1->sold) && ($cat1->sold == 1)) echo ' - SOLGT'; ?></h2>
                    <h3>Årgang -<?php if (isset($cat1->year)) echo $cat1->year; ?></h3>
                    <h3>KM - <?php if (isset($cat1->km)) echo number_format($cat1->km, 0, ',', '.'); ?></h3>
                </div>
                <div class="ad-more">
                    <a href="<?php echo URL . 'cars/detail/' . $cat1->id; ?>"><h3>Se alle informationer</h3></a>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

    <div class="unit size1of1 ad-categories">
        <h2>Vrag</h2>
    </div>

    <div class="ad-wrapper">
        <?php
        foreach ($cats2 as $cat2) {
            $price = (($_SESSION) ? (($cat2->price - ($cat2->price * 0.25)) * 0.9) : $cat2->price);
            ?>
            <div class="unit size1of3 ">
                <img src="<?php echo URL; ?>public/img/cars/<?php if (isset($cat2->image)) echo $cat2->image; ?>">
                <div class="ad-price ">
                    <h2><?php if (isset($price)) echo number_format($price, 0, ',', '.'); ?> DKK</h2>
                </div>
                <div class="ad-comment ">
                    <div class="ad-box">
                        <h2>  <?php if (isset($cat2->amount_of_comments)) echo $cat2->amount_of_comments; ?></h2>
                    </div>
                </div>
                <div class="ad-info">

                    <h2 style="display: inline;"><?php if (isset($cat2->car)) echo $cat2->car; ?></h2>  
                    <h2 style="color: red; display: inline;"><?php if (isset($cat2->sold) && ($cat2->sold == 1)) echo ' - SOLGT'; ?></h2>
                    <h3>Årgang -<?php if (isset($cat2->year)) echo $cat2->year; ?></h3>
                    <h3>KM - <?php if (isset($cat2->km)) echo number_format($cat2->km, 0, ',', '.'); ?></h3>
                </div>
                <div class="ad-more">
                    <a href="<?php echo URL . 'cars/detail/' . $cat2->id; ?>"><h3>Se alle informationer</h3></a>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

    <div class="unit size1of1 ad-categories">
        <h2>Lastvogne</h2>
    </div>

    <div class="ad-wrapper">
        <?php
        foreach ($cats3 as $cat3) {
            $price = (($_SESSION) ? (($cat3->price - ($cat3->price * 0.25)) * 0.9) : $cat3->price);
            ?>
            <div class="unit size1of3 ">
                <img src="<?php echo URL; ?>public/img/cars/<?php if (isset($cat3->image)) echo $cat3->image; ?>">
                <div class="ad-price ">
                    <h2><?php if (isset($price)) echo number_format($price, 0, ',', '.'); ?> DKK</h2>
                </div>
                <div class="ad-comment ">
                    <div class="ad-box">
                        <h2><?php if (isset($cat3->amount_of_comments)) echo $cat3->amount_of_comments; ?></h2>
                    </div>
                </div>
                <div class="ad-info">
                    <h2 style="display: inline;"><?php if (isset($cat3->car)) echo $cat3->car; ?></h2>  
                    <h2 style="color: red; display: inline;"><?php if (isset($cat3->sold) && ($cat3->sold == 1)) echo ' - SOLGT'; ?></h2>
                    <h3>Årgang -<?php if (isset($cat3->year)) echo $cat3->year; ?></h3>
                    <h3>KM - <?php if (isset($cat3->km)) echo number_format($cat3->km, 0, ',', '.'); ?></h3>
                </div>
                <div class="ad-more">
                    <a href="<?php echo URL . 'cars/detail/' . $cat3->id; ?>"><h3>Se alle informationer</h3></a>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

</div>
</div>