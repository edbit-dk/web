
<!--Content start-->

<div class="line inner-content outer-content">
    <div class="unit size1of1 ad-categories">
        <h2>Detaljer</h2>
    </div>
    <div class="ad-detail-wrapper">
        <?php
        foreach ($cars as $car) {
            $price = (($_SESSION) ? (($car->car_price - ($car->car_price * 0.25)) * 0.9) : $car->car_price);
            ?>
            <div class="unit size3of5 details ">
                <img src="<?php echo URL; ?>public/img/cars/<?php if (isset($car->car_image)) echo $car->car_image; ?>">
            </div>
            <div class="unit size2of5 details ">
                <div class="unit size1of1 detail">
                    <h2><?php if (isset($car->car_name)) echo $car->car_name; ?></h2>
                    <p style="color: red;"><?php if (isset($car->car_sold) && ($car->car_sold == 1)) echo 'SOLGT'; ?></p>
                </div>
                <div class="unit size1of1 detail">
                    <h3>Årgang - <?php if (isset($car->car_year)) echo $car->car_year; ?></h3>
                </div>
                <div class="unit size1of1 detail">
                    <h3>KM - <?php if (isset($car->car_km)) echo number_format($car->car_km, 0, ',', '.'); ?></h3>
                </div>
                <div class="unit size1of1 detail detail-price"> 
                    <h3><?php if (isset($price)) echo number_format($price, 0, ',', '.'); ?> DKK</h3>

                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
<!--Content start-->
<div class="content">
    <div class="inner-content">
        <div class="unit size1of2 comments">
            <h2>Kommentare</h2> 
        </div> 
    </div>
</div>
<div class="inner-content">
    <div class=" unit size1of2 comment-box-wrapper">
        <?php foreach ($coms as $com) { ?>
            <div class="details comment-box">
                <h2><?php if (isset($com->com_name)) echo $com->com_name; ?></h2>
                <p><?php
                    if (isset($com->com_date))
                        date_default_timezone_set('Europe/Copenhagen');
                    $output = strtotime($com->com_date);
                    $date = date("d/m/y", $output);
                    echo $date;
                    ?></p>
                <p><?php if (isset($com->com_text)) echo $com->com_text; ?></p>
            </div>
        <?php } ?>
    </div>

    <div class="unit size1of2 detail-comment lastUnit">
        <?php
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        ?>
        <form action="<?php echo URL; ?>cars/addcomment/<?php echo $url[2]; ?>" method="POST" data-parsley-validate>
            <input class="unit size1of1 detail" type="text"  name="name" placeholder="Navn" data-parsley-trigger="change" data-parsley-minlength="6" required/>
            <input class="unit size1of1 detail" type="email" name="email" placeholder="Email" data-parsley-trigger="change" required/>
            <textarea class="unit size1of1 detail"  name="comment" placeholder="Kommentar" data-parsley-trigger="change" data-parsley-minlength="20" data-parsley-maxlength="250"  data-parsley-minlength-message = " Du skal indtaste mindst 20 karaktere i din besked" required></textarea>
            <input class="unit size1of1 detail" type="submit" name="submit_add_comment" value="Send din kommentar" />
        </form>
    </div>
</div>
</div>
<!--Content end-->
