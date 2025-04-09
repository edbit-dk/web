
<section class="container">
        <h1>Contact</h1>
        <?php
        if (!empty($data->errors)) {
            foreach ($data->errors as $error) {
                echo $error;
            }
        }
        ?>
        <form method="POST" action="<?php echo URL ?>create/message" data-parsley-validate>

            <p> Name: <br> <input type="text" 
                                      name="name" 
                                      id="name"  
                                      placeholder="Name" /></p>

            <p> Email: <br> <input type="text" 
                                   name="email" 
                                   id="Email" 
                                   placeholder="Email" /></p>
            
             <p> Message: <br> <input type="text" 
                                      name="Message" 
                                      id="Message"  
                                      placeholder="Message" /></p>

            <p class="submit"><input type="submit" value="Send"></p>
        </form>
</section>
