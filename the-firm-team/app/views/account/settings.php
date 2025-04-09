<section class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form action="<?php echo URL ?>users/profile" method="POST">

        <label for="Firstname">Firstname</label>
        <input type="text" 
               name="<?php echo USER_FIRSTNAME ?>" 
               id="Firstname" 
               value="<?php echo Output::escape($data->user->data()->Firstname); ?>" />
        
        <label for="Lastname">Lastname</label>
        <input type="text" 
               name="<?php echo USER_LASTNAME ?>" 
               id="Lastname" 
               value="<?php echo Output::escape($data->user->data()->Lastname); ?>" />
        
        <label for="Email">Email</label>
        <input type="email" 
               name="<?php echo USER_EMAIL ?>" 
               id="Email" 
               value="<?php echo Output::escape($data->user->data()->Email); ?>" />

        <input type="hidden" 
               name="<?php echo TOKEN_NAME ?>" 
               value="<?php echo Token::generate(); ?>" />
        <input type="submit" value="Update" />
    </form>
</section>