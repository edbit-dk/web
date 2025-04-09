
<section class="container">
    <div class="register">
        <h1>Register</h1>
        <?php
        if (!empty($data->errors)) {
            foreach ($data->errors as $error) {
                echo $error;
            }
        }
        ?>
        <form method="POST" action="<?php echo URL ?>users/register" data-parsley-validate>
            <p> Code: <br> <input type="text" 
                                  name="<?php echo USER_CODE ?>" 
                                  id="Code"  
                                  placeholder="Code" 
                                  value="<?php
                                  if (!empty($data->input->Code)) {
                                      echo Output::escape($data->input->Code);
                                  }
                                  ?>"/></p>

            <p> Username: <br> <input type="text" 
                                      name="<?php echo USER_NAME ?>" 
                                      id="Username"  
                                      placeholder="Username" 
                                      value="<?php
                                  if (!empty($data->input->Username)) {
                                      echo Output::escape($data->input->Username);
                                  }
                                  ?>"/></p>

            <p> Email: <br> <input type="email" 
                                   name="<?php echo USER_EMAIL ?>" 
                                   id="Email" 
                                   placeholder="Email" 
                                   value="<?php
                                   if (!empty($data->input->Email)) {
                                       echo Output::escape($data->input->Email);
                                   }
                                  ?>"/></p>

            <input type="hidden" 
                   name="<?php echo TOKEN_NAME ?>" 
                   value="<?php echo Token::generate(); ?>"/>
            <p class="submit"><input type="submit" value="Register"></p>
        </form>
    </div>
    <div class="login-help">
        <p><a href="index.php?page=forgot">Forgot password?</a></p>
        <p><a href="index.php?page=login">Login</a></p>
        <p><a href="index.php">Home</a></p>
    </div>
</section>
