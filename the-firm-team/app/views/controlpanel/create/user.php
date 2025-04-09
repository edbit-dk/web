
<section class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form method="POST" action="<?php echo URL ?>users/create" data-parsley-validate>

        <p>Company: <select name="Company"> <?php
                if (!empty($data->company)) {
                    foreach ($data->companies as $company) {
                        ?>
                        <option value="<?php
                        echo $company->ID;
                        ?>"><?php echo $company->Name; ?></option>
                            <?php }
                            ?>
                <?php } ?></select></p>

        <p>Department: <select name="Department"> <?php
                if (!empty($data->department)) {
                    foreach ($data->departments as $department) {
                        ?>
                        <option value="<?php
                        echo $department->ID;
                        ?>"><?php echo $department->Name; ?></option>
                            <?php }
                            ?>
                <?php } ?></select></p>

        <p> Username: <br> <input type="text" 
                                  name="<?php echo USER_NAME ?>" 
                                  id="Username"  
                                  placeholder="Username" 
                                  value="<?php
                                  if (!empty($data->input->Username)) {
                                      echo Output::escape($data->input->Username);
                                  }
                                  ?>"/></p>

        <p> Password: <br> <input type="email" 
                                  name="<?php echo USER_PASSWORD ?>" 
                                  id="Email" 
                                  placeholder="Password" 
                                  value="<?php
                                  if (!empty($data->input->Password)) {
                                      echo Output::escape($data->input->Password);
                                  }
                                  ?>"/></p>

        <p> Firstname: <br> <input type="text" 
                                   name="<?php echo USER_FIRSTNAME ?>" 
                                   id="Username"  
                                   placeholder="Username" 
                                   value="<?php
                                   if (!empty($data->input->Firstname)) {
                                       echo Output::escape($data->input->Firstname);
                                   }
                                   ?>"/></p>

        <p> Lastname: <br> <input type="text" 
                                  name="<?php echo USER_LASTNAME ?>" 
                                  id="Username"  
                                  placeholder="Username" 
                                  value="<?php
                                  if (!empty($data->input->Lastname)) {
                                      echo Output::escape($data->input->Lastname);
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
        <p class="submit"><input type="submit" value="Create"></p>
    </form>
</section>
