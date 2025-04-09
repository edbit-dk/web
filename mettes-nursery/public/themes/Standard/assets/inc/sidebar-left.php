<div class="col-md-3">
    <h4>Mest populære</h4>
    <ul class="popular">
        <?php foreach ($data->popular as $popular) { ?>
            <li><a href="<?php echo URL . 'info/' . $popular->ID; ?>"><?php echo $popular->Name; ?></a></li>
        <?php } ?>
    </ul>

    <h4>Links</h4>
    <a href="#"><img class="links" src="<?php echo URL; ?>public/themes/Standard/assets/img/link1.png" alt="Praktisk Økologi" /></a>
    <a href="#"><img class="links" src="<?php echo URL; ?>public/themes/Standard/assets/img/link2.png" alt="Natur Badet" /></a>
    <a href="#"><img class="links" src="<?php echo URL; ?>public/themes/Standard/assets/img/link3.png" alt="Plantetorvet" /></a>
</div>