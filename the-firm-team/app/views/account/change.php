<section class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form action="<?php echo URL ?>users/password" method="post">

        <label for="Password">Current password</label>
        <input type="text" 
               name="<?php echo USER_PASSWORD ?>" 
               id="Password" 
               value="<?php echo Output::escape($data->user->data()->Password); ?>" />

        <label for="New">New password</label>
        <input type="password" 
               name="<?php echo PASSWORD_NEW ?>" 
               id="New" />

        <label for="Check">New password check</label>
        <input type="password" 
               name="<?php echo PASSWORD_CHECK ?>" 
               id="Check" />

        <input type="hidden" 
               name="<?php echo TOKEN_NAME ?>" 
               value="<?php echo Token::generate(); ?>" />
        <input type="submit" value="Change" />
    </form>
</section>