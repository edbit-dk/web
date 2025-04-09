<section class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <h3>Username: <?php echo Output::escape($data->user->data()->Username); ?></h3>
    <p>Full name: <?php echo Output::escape($data->user->data()->Firstname); ?>  <?php echo Output::escape($data->user->data()->Lastname); ?></p>
    <p>Email: <?php echo Output::escape($data->user->data()->Email); ?> </p>
    <a href="<?php echo URL; ?>account/settings" >Update</a>
    <a href="<?php echo URL; ?>account/change" >Change password</a>
</section>