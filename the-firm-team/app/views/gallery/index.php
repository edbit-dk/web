<div class="content">

    <div class="row ">
        <div class="span-12 ">
            <h3>Gallery</h3>
        </div>
    </div>

    <div class="row pictures-gallery">
        <div class="span-8">
            <?php
            if (!empty($data->uploads)) {
                foreach ($data->uploads as $upload) {
                    echo '<p>By ' . $upload->Company . '</p>';
                    echo '<p>Date ' . date("d/m/Y", strtotime($upload->Album_Date)) . '</p>';
                    echo '<h3>' . $upload->Album . '</h3>';
 echo '<a href="' . URL . 'gallery/album/' . $upload->Album_ID . '"><img width="600" src="' . ASSETS . 'uploads/' . $upload->File . '"></a>';
                }
            }
            ?>
<!--            <img src="<?php //echo URL;      ?>public/uploads/img01.png" />-->
        </div>
        <div class="span-4">
            <div class="padding">
                <div class="row">
                    <?php
                    if (!empty($data->albums)) {
                        foreach ($data->albums as $album) {
                            ?>
                    <div style="padding-top: 21px;" class="span-6">
                                <?php
                                echo '<p>By ' . $album->Company . '</p>';
                                echo '<p>Date ' . date("d/m/Y", strtotime($album->Date)) . '</p>';
                                echo '<h5>' . $album->Name . '</h5>';
                                echo '<a href="' . URL . 'gallery/album/' . $album->ID . '"><img width="115" height="80" src="' . ASSETS . 'uploads/' . $album->File . '"></a>';
                                ?></div>
                            <?php
                        }
                    }
                    ?>
                   
                </div>
                  <a href="<?php echo URL ?>gallery/pictures"><p class="read-more">more pictures &nbsp<span class="more-link"> > </span></p></a>

                <!--                <div class="row">
                                    <div class="span-6">
                                        test
                                        <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                
                                    </div>
                                    <div class="span-6">
                                        test
                                        <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                                        <a href="#"><p class="read-more">more videos &nbsp<span class="more-link"> > </span></p></a>
                                    </div>
                                </div>-->

            </div>
        </div>
    </div>

    <!--    <div class="row vidoes-gallery">
            <h6 class="title">Vidoes</h6>
            <div class="span-8">
                <iframe width="560" height="315" src="//www.youtube.com/embed/f1GDJF2mUmQ" frameborder="0" allowfullscreen></iframe>
                <div class="span-12 ">
                    <h4>YOUR COMMENTS</h4>
                </div>
                <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-width="550" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div class="span-4">
                <div class="padding">
                    <div class="row">
                        <div class="span-6">
                            test
                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                        </div>
                        <div class="span-6">
                            test
                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                            <a href="#"><p class="read-more">more pictures &nbsp<span class="more-link"> > </span></p></a>
                        </div>
                    </div>
    
    
                    <div class="row">
                        <div class="span-6">
                            test
                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
    
                        </div>
                        <div class="span-6">
                            test
                            <img src="<?php //echo URL;      ?>public/uploads/img02.png">
                            <a href="#"><p class="read-more">more videos &nbsp<span class="more-link"> > </span></p></a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>-->
</div>

