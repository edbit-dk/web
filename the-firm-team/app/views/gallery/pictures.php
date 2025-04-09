<div class="content">

    <div class="row ">
        <div class="span-12 ">
            <h3>Pictures</h3>

            <?php
            if (!empty($data->uploads)) {
                foreach ($data->uploads as $upload) {
                    ?>
                    <div style="padding-bottom: 20px" class="span-6 ">
                        <?php
                        echo '<p>By ' . $upload->Company . '</p>';
                        echo '<p>Date ' . date("d/m/Y", strtotime($upload->Date)) . '</p>';
                        echo '<p>Album: ' . $upload->Album . '</p>';
                        echo '<a href="' . ASSETS . 'uploads/' . $upload->File . '"><img width="450" height="250" src="' . ASSETS . 'uploads/' . $upload->File . '"></a>';
                        ?> </div><?php
                }
            }
            ?>
        </div>
    </div>
</div>




