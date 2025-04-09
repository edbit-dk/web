</div>
<!-- /#page-wrapper -->

<div class=" content-wrapper footer base-typo-background">
    <div class="row content">
        <div class="col-md-2 base-color">
            <p class="font-weight-bold">Happy House</p>
            <p>
                <?php echo Adresse; ?>
                <br>
                <?php echo Postnummer; ?>  <?php echo By; ?>
                <br>
                <?php echo Land; ?>
                <br>
                CVR: <?php echo CVR; ?>
            </p>
        </div>
        <div class="col-md-2  base-color">
            <p class="font-weight-bold">Kontaktoplysninger</p>
            <p>
                <?php echo Telefonnummer; ?>
                <br>
                <?php echo Email; ?>
            </p>
        </div>

        <div class="col-md-3 base-color">
            <p class="font-weight-bold">Åbningstider</p>
            <p>
                <?php echo Åbningstider_hverdage; ?>
                <br>
                <?php echo Åbningstider_weekend; ?>
                <br>
                <?php echo Åbningstider_helligdage; ?>
            </p>
        </div>

        <div class="col-md-2 base-color">
            <p class="font-weight-bold">Navigation</p>
            <ul class="base-color">
                <?php

                foreach (unserialize(FOOTER_MENU) as $menu)
                {
                    ?>
                <li><a class="base-color" href="<?php echo $this->project_url . $menu->Name; ?>"><?php echo $menu->Label; ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <div class="col-md-3 text-center">
            <br><br>
            <a href="<?php echo $this->project_url; ?>ejendomme" class="more-btn base-contrast-background"><b>SE EJENDOMME</b></a>
            <br><br>
            <a href="<?php echo $this->project_url; ?>kontakt" class="btn-contact">Kontakt os og lad os hjælpe</a>
        </div>
    </div>
</div>

</div>
<!-- /#container -->


<!-- jQuery -->
<script src="<?php echo $this->project_url; ?>public/assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->project_url; ?>public/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- plugins -->


</body>
</html>
