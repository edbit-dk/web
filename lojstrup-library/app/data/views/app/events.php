<div class="content">
    <?php
    if (isset($multidata->events))
    {
        foreach ($multidata->events as $event)
        {
            ?>
            <div class="box clearfix">
                <div class="text">
                    <h2 class="title"><?php echo $event->Title; ?></h2>
                    <p>
                        <?php echo $event->Short; ?>
                    </p>

                    <p class="read-more"><a href="<?php echo URL; ?>arrangement/id/<?php echo $event->ID; ?>">:: læs mere ::</a></p>
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