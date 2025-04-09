<div class="content">

    <div class="boxi clearfix">
        <div class="text">

            <h2 class="title">Om Biblioteket</h2>

            <?php
            foreach ($multidata->info as $data)
            {

                echo $data->Address;
            }
            ?>
            <div class="contact-info">

                <p>Telefon: <?php echo $data->Phone; ?></p>
                <p>Fax: <?php echo $data->Fax; ?></p>
                <p>Email: <?php echo $data->Email; ?></p>


            </div>

        </div>
        <div class="image">

            <img src="<?php echo URL; ?>public/assets/app/img/kort.jpg"  class="map">
        </div>
    </div>

    <div class="box clearfix">

        <div class="text">
            <form>

                <input type="text" name="name" placeholder="Navn">
                <br>
                <input type="text" name="address" placeholder="Adresse">
                <br> 
                <input type="text" name="zip" placeholder="Postnr. & By">
                <br>
                <input type="text" name="tel" placeholder="Telefon">
                <br>
                <input type="email" name="email" placeholder="Email">
                <br>
                <textarea placeholder="Besked"></textarea>
                <br>
                <button type="reset" value="Reset">Slet</button>
                <input type="submit" name="submit" value="Send">

            </form>

        </div>

        <div style="margin-left: 20px;">
            <h3>Kontakt</h3>
            <p>Du kan kontakte biblioteket her</p>
            <p>(Alle felter skal udfyldes)</p>
        </div>

    </div>
</div>
