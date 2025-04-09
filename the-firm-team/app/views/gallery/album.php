<div class="content">

    <div class="row ">
        <div class="span-12 ">
            <h3>Album  <?php
                if (!empty($data->uploads)) {
                    $i = 1;
                    foreach ($data->uploads as $upload) {
                        echo $upload->Album;
                        if ($i == 1)
                            break;
                    }
                }
                ?></h3>

            <?php
            if (!empty($data->uploads)) {
                foreach ($data->uploads as $upload) {
                    ?>

                    <div style="padding-bottom: 20px" class="span-6 ">
                        <?php
                        echo '<p>By ' . $upload->Company . '</p>';
                        echo '<p>Date ' . date("d/m/Y", strtotime($upload->Date)) . '</p>';
                        echo '<a href="' . ASSETS . 'uploads/' . $upload->File . '"><img width="450" height="250" src="' . ASSETS . 'uploads/' . $upload->File . '"></a>';
                        ?> </div><?php
                }
            }
            ?>
        </div>
    </div>
</div>




