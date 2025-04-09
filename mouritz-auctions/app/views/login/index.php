
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
        <h2>Login</h2>
    </div>
        <pre>
            Admin                Demo
            username: admin      username: demo
            password: admin      password: demouser
        </pre>
    <form class="form-signin" role="form" method="post" action="<?php echo URL; ?>login/verify" data-parsley-validate>
        <input type="text" name="username"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
        <input type="password" name="password"  class="form-control" placeholder="Adgangskode" required="">
        <label class="checkbox">
            <input type="checkbox" name='remember' id="remember"> Remember login
        </label>
        <input class="btn-log" type="submit" name="submit" value="Login"><br>
        <a href="<?php echo URL; ?>register">Register</a><br>
        <a href="<?php echo URL; ?>home">Back</a><br>
    </form>
    <div> <!-- /login-wrap (incl. register/login form) -->
</div> <!-- /container -->
