
<section class="container">
    <div class="register">
        <h1>Contact</h1>
        <?php
        if (!empty($data->errors)) {
            foreach ($data->errors as $error) {
                echo $error;
            }
        }
        ?>
        <form method="POST" action="<?php echo URL ?>contact/message" data-parsley-validate>

            <p> Name: <br> <input type="text" 
                                      name="<?php echo USER_NAME ?>" 
                                      id="name"  
                                      placeholder="Name" 
                                      value="<?php
                                  if (!empty($data->input->Name)) {
                                      echo Output::escape($data->input->Name);
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
            
             <p> Message: <br> <input type="text" 
                                      name="Message" 
                                      id="Message"  
                                      placeholder="Message" 
                                      value="<?php
                                  if (!empty($data->input->Name)) {
                                      echo Output::escape($data->input->Name);
                                  }
                                  ?>"/></p>

            <input type="hidden" 
                   name="<?php echo TOKEN_NAME ?>" 
                   value="<?php echo Token::generate(); ?>"/>
            <p class="submit"><input type="submit" value="Send"></p>
        </form>
    </div>
</section>
