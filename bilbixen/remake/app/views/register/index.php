
<div class="container" style="width: 300px; text-align: center;">

    <form style=""class="form-signin" role="form" method="post" action="<?php echo URL; ?>register/check" data-parsley-validate>
        <p style="color: red;">

            <?php
            if (!empty($data->errors)) {
                foreach ($data->errors as $error) {
                    echo $error;
                }
            }
            ?>
        </p>
        <input type="text" name="username"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
        <input type="password" name="password"  class="form-control" placeholder="Adgangskode" required="">
        <input class=" btn-lg btn-primary btn-block" type="submit" name="submit" value="Opret"><br>
         <a href="<?php echo URL; ?>login">Login</a><br>
        <a href="<?php echo URL; ?>home">Back</a><br>
    </form>
</div> <!-- /container -->
