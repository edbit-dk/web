<div class="page-wrapper" >

    <div class="login-wrap">
        <?php
        if (!empty($data->feedback)) {
            foreach ($data->feedback as $feedback) {
                echo $feedback;
            }
        }
        ?>
        <div class="heading">
            <h2>Register</h2>
        </div>

        <form class="form-signin" role="form" method="post" action="<?php echo URL; ?>register/verify" data-parsley-validate>
            <input type="text" name="username"  class="form-control" placeholder="Username" required="" autofocus="">
            <input type="password" name="password"  class="form-control" placeholder="Password" required="">
            <input type="text" name="email"  class="form-control" placeholder="Email" required="">
            <input type="text" name="firstname"  class="form-control" placeholder="Firstname" required="">
            <input type="text" name="lastname"  class="form-control" placeholder="Lastname" required="">
            <input type="text" name="address"  class="form-control" placeholder="Address" required="">
            <input type="text" name="zipcode"  class="form-control" placeholder="Zipcode" required="">
            <input type="text" name="phone"  class="form-control" placeholder="Phone" required="">

            <input class="btn-log" type="submit" name="submit" value="Register"><br>
            <a href="<?php echo URL; ?>login">Login</a><br>
            <a href="<?php echo URL; ?>home">Back</a><br>
        </form>
        <div> <!-- /login-wrap (incl. register/login form) -->
        </div> <!-- /container -->
