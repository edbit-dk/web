<div class="content">
    <?php
    foreach ($multidata->book as $book)
    {
        ?>
        <div class="box clearfix">
            <div class="text">

                <h2 class = "title"><?php echo $book->Title; ?></h2>
                <p>
                    <?php echo $book->Text; ?>
                </p>
                <p class="read-more"><a href="<?php echo URL; ?>bog/id/<?php echo $book->ID; ?>">:: læs mere ::</a></p>
            </div>
            <div class="image">
                <img src="<?php echo URL; ?>public/uploads/<?php echo $book->Img; ?>" 
                     alt="<?php echo $book->Title; ?>">
            </div>
        </div>
        <?php
    }
    ?>




</div>