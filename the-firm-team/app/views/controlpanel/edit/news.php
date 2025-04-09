<div class="container">
    <?php
    if (!empty($data->data)) {
        foreach ($data->data as $news) {
            ?>
            <form action="<?php echo URL ?>news/update" method="post">
                <p> Name: </p><input type="text" name="Name" value="<?php
                echo Output::escape($news->Name);
                ?>">

                <p> Content: </p>  <textarea name="Content"><?php
                    echo Output::escape($news->Content);
                    ?></textarea>

                <p> Sticky: </p> 
                <input type="checkbox" name="sticky" value="<?php echo Output::escape($news->Sticky); ?>" <?php if (Output::escape($news->Sticky) === 1) {
                echo 'checked';
            } ?>> 
                <p class="submit"><input type="submit" value="Update"></p>
            </form>
            <a href="<?php echo URL . 'blog/delete/' . $news->ID; ?>">Delete</a>
            <?php
        }
    }
    ?>
</div>

