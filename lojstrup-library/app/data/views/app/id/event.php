<div class="content">
    <?php
    if (isset($multidata->event))
    {
        foreach ($multidata->event as $event)
        {
            ?>
            <div class="box clearfix">
                <div class="text">
                    <h2 class="title"><?php echo $event->Title; ?></h2>
                    <p>
                        <?php echo $event->Text; ?>
                    </p>

                </div>
                <div class="image">
                    <img src="<?php echo URL; ?>public/uploads/<?php echo $event->Img; ?>" alt="<?php echo $event->Title; ?>">

                </div>
            </div>
            <?php
        }
    }
    ?>




</div>