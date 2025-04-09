    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>
        <h2 class="heading">Profile</h2>
        <form action="<?php echo URL ?>update/profile" method="POST" data-parsley-validate>

            <p>Firstname:</p>
            <input type="text" 
                   name="firstname" 
                   id="Firstname"
                   required
                   value="<?php echo $data->user->data()->$Firstname; ?>" />
            <p>Lastname: </p>
            <input type="text" 
                   name="lastname" 
                   id="Lastname"
                   required
                   value="<?php echo $data->user->data()->$Lastname; ?>" />
              <p>Email: </p>
            <input type="text" 
                   name="email" 
                   id="Email"
                   required
                   value="<?php echo $data->user->data()->$Email; ?>" />
              <br><br>
            <input class="btn btn-success" type="submit" value="Update" />
        </form>
        <br><br><br><br>
        <h2 class="heading">Password</h2>
        <form action="<?php echo URL ?>update/password" method="post" data-parsley-validate>
            <p>Current Password: </p>
            <input type="password" 
                   name="current"
                   required
                   id="password" />
            <p>New Password: </p>
            <input type="password" 
                   name="new"
                   required
                   id="password" />
            <p>New Password Check: </p>
            <input type="password" 
                   name="check"
                   required
                   id="check" />
            <br><br>
            <input type="submit" value="Update" />
        </form>

