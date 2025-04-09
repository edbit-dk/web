<div class="content">
    <?php
    if (isset($multidata->info))
    {
        foreach ($multidata->info as $info)
        {
            ?>
            <div class="box clearfix">
                <div class="text">
                    <h2 class="title">Reglementer</h2>

                    <?php echo $info->Terms; ?>


                </div>

            </div>
            <?php
        }
    }
    ?>


</div>
