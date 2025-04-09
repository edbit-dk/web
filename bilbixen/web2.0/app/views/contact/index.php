<div class="inner-content content-wrapper">
    <div class="line">

        <div class="unit size2of5 ">
            <div class="line">
                <div class="unit big-heading">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo $error;
                        }
                    }
                    ?>
                    <h2>Kontakt</h2>
                </div>
            </div>
            <form method="post" action="<?php echo URL; ?>create/message" data-parsley-validate>
                <p>* Emne:</p> <input class="detail" type="text" name="subject" placeholder="Dit emne" data-parsley-trigger="change" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required><br>
                <p>* Email:</p> <input class="detail" type="email" name="email" placeholder="mail@mail.com" data-parsley-trigger="change" required><br> 
                <p>* Besked:</p><textarea class="detail" rows="4" cols="20" name="message" data-parsley-trigger="change" placeholder="Din besked" data-parsley-minlength="20" data-parsley-maxlength="250"  data-parsley-minlength-message = " Du skal indtaste mindst 20 karaktere i din besked" required></textarea><br>
                <br>
                <input class="detail" type="submit" name="submit" value="Send din besked">
            </form>

        </div>
        <div class="unit size3of5 lastUnit">
            <div class=" big-heading">
                <h2>Adresser</h2>
            </div>
            <p>Hovedkontor:</p><br>
            <p><b>Bilbixen</b></p>
            <p>Munkebjergvej 130,</p>
            <p>5230 Odense M</p><br>
            <div id="map-canvas"></div>

            <div class=" big-heading">
                <h2>Åbningstider</h2>
            </div>
            <p>Bilbixen har åben:</p><br>
            <?php
            foreach ($data as $value) {
                ?>
                <p><?php echo $value->day; ?>&nbsp; &nbsp; &nbsp;<?php echo $value->time; ?></p>
                <?php
            }
            ?>

            <div class=" big-heading">
                <h2>Vejviser</h2>
            </div>
            <p>Sådan finder du vej</p>
            <p>Vejledning: Du finder nemt vej til en 
                Bilbixen’s afdeling ved at vælge 
                afdeling, "find min position" eller udfylde postnr./addresse.</p><br>
            <form id="calculate-route" name="calculate-route" action="#" method="post">
                <label for="to">Til:</label>
                <p> Afdeling: <select id="to" name="department" >
                        <?php foreach ($departments as $deb) { ?>
                            <option value="<?php echo $deb->address; ?>"><?php echo $deb->name; ?></option>         
                        <?php } ?>
                    </select>
                </p>
                <br>
                <label for="from">Fra:</label>
                <p>Postnr.:  <input type="text" name="postFromClient" id="postnr" placeholder="udfyld..."/></p>
                <p>Adresse/By: <input type="text" id="from" name="road" placeholder="udfyld..." size="50"/></p>
                <a id="from-link" href="#">Find min position</a><br/>
                <style> 
                    #process { 
                        width: 40px; 
                        height: 40px; 
                    } 

                    .process { 
                        background: #fff url("<?php echo URL; ?>public/img/loading.gif"); background-repeat: no-repeat;  
                    } 
                </style> 
                <div id="process"></div> 
                <input type="submit" class="btn-success" id="submit" value="Find rute" /><br><br>
                <input type="reset" class="btn-danger" />
            </form>
            <div id="map"></div>
            <p id="error"></p>
        </div>
    </div>
</div>

</div>






