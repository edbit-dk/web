<section class="container">
    <div class="login">
        <h1>Login</h1>
        <?php
        if (!empty($data->errors)) {
            foreach ($data->errors as $error) {
                echo $error;
            }
        }
        ?>
        <form method="post" action="<?php echo URL; ?>users/login">
            <p><input type="text" name="<?php echo USER_NAME; ?>" value="" placeholder="E-mail or Username" autocomplete="off"></p>
            <p><input type="password" name="<?php echo USER_PASSWORD; ?>" value="" placeholder="Password" autocomplete="off"></p>
            <p class="remember_me">
                <label>
                    <input type="checkbox" name="remember" id="remember">
                    Remember my login on this PC.
                </label>
            </p>
            <input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo Token::generate(); ?>" />
            <p class="submit"><input type="submit" name="submit" value="Login"></p>
        </form>
    </div>

    <div class="login-help">
        <p><a href="index.php?page=forgot">Forgot password?</a></p>
        <p><a href="<?php echo URL; ?>account/register">Register</a></p>
        <p><a href="index.php">Home</a></p>
    </div>
</section>


