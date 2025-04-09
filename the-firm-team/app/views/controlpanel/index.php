<div class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <p>Hello admin <a href="<?php echo URL; ?>account/profile"><?php echo Output::escape($data->user->data()->Username); ?></a>!</p>

    <ul>
        <li><a href = "<?php echo URL; ?>controlpanel/users">Users</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/news">News</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/comments">Comments</a></li>
        <li><a href="<?php echo URL; ?>controlpanel/events">Events</a></li>
        <li><a href="<?php echo URL; ?>controlpanel/uploads">Uploads</a></li>
    </ul>
</div>