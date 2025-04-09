<hr id="hkv" class="featurette-divider">
<div class="container">
    <div  class=" row featurette product-description container" >
        <div class=" col-md-12  ">
            <h2 class="wow featurette-heading fadeInDown" data-wow-delay="1s" >Hvad kan vi</h2>
            <p class="wow lead fadeInLeft" data-wow-delay="2s" >
                På GaveFabrikken arbejder vi med gaver i bred forstand.
            </p>
            <p class="wow lead fadeInRight" data-wow-delay="3s" >
                Vi udvikler bl.a. vores egene produkter i samarbejde med danske
                designere, men laver også gaver med kendte mærke-varer, valgfrit
                gavekoncept på nettet, den traditionsrige julekurv med delikatesser,
                vin og søde sager, oplevelsesgaver, f.eks. et weekendophold eller
                en donation til et velgørende formål (non profit).
            </p>
            <p class="wow lead fadeInLeft" data-wow-delay="4s" >
                Vi udvikler også gaver ud fra fokusområder, der er aktuelle i jeres
                virksomhed. Gaven kan eksempelvis tage udgangspunkt i jeres værdier
                og holdninger, f.eks. til klimaspørgsmålet.<br>
                Den kan sætte fokus på et nyt produkt I har lanceret, eller den kan
                understøtte et ønske om at styrke kommunikation og samarbejde i 
                virksomheden, osv.
            </p>
            <p class="wow lead fadeInRight" data-wow-delay="5s" >
                Det vigtigste for os er, at vi finder den bedste løsning til jer,
                uanset om det er noget vi selv kan levere, eller det er noget, der
                kan findes andre steder.<br>
            </p>
        </div>
    </div>

    <div class="row wow  thumbnails slideInUp" data-wow-duration="5s">
        <?php
        foreach (glob('img/products/*.*') as $filename) {
            $array[] = $filename;
        }

        $nr = count($array) - 1;
        shuffle($array);

        for ($i = 0; $i <= $nr; $i++) {
            ?>
            <div class="products-wrapper col-lg-2 "  >
                <img id="products" class="wow container-fluid   img-responsive img-circle "   alt="logo" src="<?php echo $array[$i]; ?>">
            </div>
            <?php
        }
        ?>
    </div>
</div>
