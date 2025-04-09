
<div class="inner-content info-wrapper">
    <div class="line ">
        <div class="unit size2of5 info-box info-heading-left">
            <h2>Hvad er bilbixen?</h2>
            <h3>En bedre løsning til bilsalg</h3>
            <p>Én samlet portal til både private og
                virksomheder. Nemt, hurtigt og lige til - du
                opnår altid den højeste pris på markedet.</p>
        </div>
        <div class="unit size3of5 info-heading-right lastUnit">
            <h2>Her får du altid den bedste pris for din bil</h2>
            <h3>Bilbixen - den smarte løsning</h3><br>
            <p>Din bil vises til hele Danmark så snart din
                annonce er oprettet. På den måde får du altid den
                bedste pris for din bil.</p>
        </div>
    </div>
</div>

<!--Content start-->
<div class="content">
    <div class="inner-content-center small-heading">
        <h2>Hvordan virker bilbixen?</h2>
        <img src="<?php echo URL; ?>public/img/icons.png">
    </div>
</div>
<!--Content end-->
<div class="line inner-content">
    <div class="unit size1of1 lastUnit big-heading">
        <h2>Dagens super tilbud</h2>
    </div>
    <div class="line ad-wrapper">    
        <?php
        foreach ($cars as $car) {
            $price = (($_SESSION) ? (($car->price - ($car->price * 0.25)) * 0.9) : $car->price);
            ?>
            <div class="unit size1of3 ">
                <img src="<?php echo URL; ?>uploads/<?php if (isset($car->image)) echo $car->image; ?>">
                <div class="ad-price ">
                    <h2><?php if (isset($price)) echo number_format($price, 0, ',', '.'); ?> DKK</h2>
                </div>
                <div class="ad-comment ">
                    <div class="ad-box">
                        <h2>  <?php if (isset($car->amount_of_comments)) echo $car->amount_of_comments; ?></h2>
                    </div>
                </div>
                <div class="ad-info">
                    <h2 style="display: inline;"><?php if (isset($car->car)) echo $car->car; ?></h2>  
                    <h2 style="color: red; display: inline;"><?php if (isset($car->sold) && ($car->sold == 1)) echo ' - SOLGT'; ?></h2>
                    <h3>Årgang - <?php if (isset($car->year)) echo $car->year; ?></h3>
                    <h3>KM - <?php if (isset($car->km)) echo number_format($car->km, 0, ',', '.'); ?></h3>

                </div>
                <div class="ad-more">
                    <a href="<?php echo URL . 'car/detail/' . $car->ID; ?>"><h3>Se alle informationer</h3></a>
                </div>

                <?php
                if ($user->role('Admin')) {
                    ?>
                    <div class="ad-more">
                        <a href="<?php echo URL . 'controlpanel/edit/' . $car->ID; ?>"><h3>Opdatér oplysninger</h3></a>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }
        ?>


    </div>
    <div class="line ad-wrapper">
        <div class="unit size1of3 no-bottom ">           
            <div class="ad-category">
                <h2>Personbiler</h2>
            </div>
        </div>
        <div class="unit size1of3 no-bottom ">           
            <div class="ad-category">
                <h2>Vrag</h2>
            </div>
        </div>
        <div class="unit size1of3 no-bottom ">           
            <div class="ad-category">
                <h2>Lastvogne</h2>
            </div>
        </div>
    </div>
</div>



</div>
</div>

