
<div class="menu-wrapper">

    <nav>

        <h2 class="text-align">Menu</h2>

        <ul>

            <li><a href="<?php echo URL; ?>forside">Forsiden</a></li>
            <li><a href="<?php echo URL; ?>bog">Nye Bøger</a>
                <ul>
                    <?php
                    foreach ($multidata->categories as $cat)
                    {
                        ?>
                        <li><a href="<?php echo URL; ?>kategori/<?php echo $cat->ID ?>"><?php echo $cat->Name; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <li><a href="<?php echo URL; ?>arrangement">Arrangementer</a></li>
            <li><a href="<?php echo URL; ?>reglementer">Reglementer</a></li>
            <li><a href="<?php echo URL; ?>kontakt">Kontakt</a></li>

        </ul>

    </nav>

    <span class="text-align">


        <h2>Åbningstider</h2>
        <?php
        foreach ($multidata->info as $i)
        {
            echo $i->Open;
        }
        ?>

        <h2>Om Os</h2>

    </span>

    <?php
    foreach ($multidata->info as $i)
    {
        echo $i->About;
    }
    ?>
</div>