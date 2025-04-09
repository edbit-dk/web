<div class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo "<p>$error</p>";
        }
    }
    ?>
    <h2>News</h2>
    <?php
    if (!empty($data->news)) {
        foreach ($data->news as $news) {
            echo "<p>" . date("d/m/Y H:i:s", strtotime($news->Date)) . "</p>";
            echo "<p>$news->Content</p>";
        }
    }
    ?>
    <h5>Comments</h5>
    <?php
    if (!empty($data->news)) {
        foreach ($data->comments as $data) {
            echo "<p>" . date("d/m/Y H:i:s", strtotime($data->Date)) . "</p>";
            echo "<p class='feedback'>$data->Content</p>";
        }
    }
    ?>
    <form action="<?php echo URL ?>comments/create" method="post">

        <p> Comment: </p>  <textarea name="Comment"></textarea>

        <input type="hidden" 
               name="User" 
               value="<?php echo $user->data()->ID ?>"/>

        <input type="hidden" 
               name="News" 
               value="<?php echo Output::escape($news->ID) ?>"/>

        <p class="submit"><input type="submit" value="Submit"></p>
    </form>
</div>