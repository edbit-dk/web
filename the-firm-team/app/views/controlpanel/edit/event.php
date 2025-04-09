<div class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo "<p>$error</p>";
        }
    }

    if (!empty($data->data)) {
        foreach ($data->data as $event) {
            ?>
            <form action="<?php echo URL . 'events/update/' . $event->ID; ?>" method="post">
                <p> Date: </p><input type="text" name="Date" value="<?php
                echo Output::escape($event->Date);
                ?>">

                <p> Name: </p><input type="text" name="Name" value="<?php
                echo Output::escape($event->Name);
                ?>">

                <p> Content: </p>  <textarea name="Content"><?php
                    echo Output::escape($event->Content);
                    ?></textarea>

                <p class="submit"><input type="submit" value="Update"></p>
            </form>
            <a href="<?php echo URL . 'events/delete/' . $event->ID; ?>">Delete</a>
            <?php
        }
    }
    ?>
</div>

