<div class="container">
    
    <p>Hello <a href="<?php echo URL; ?>account/profile"><?php echo Output::escape($data->user->data()->Username); ?></a>!</p>
        <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>

    <?php if ($user->role('Admin') || $user->role('SuperAdmin')) { ?>
        <p><a href = "<?php echo URL; ?>controlpanel">CONTROLPANEL</a></p>
        <?php
    }
    ?>
</div>