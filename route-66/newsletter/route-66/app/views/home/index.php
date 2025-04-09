
<main>
    <div  class="content container">
        <table   class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s"> 

            <h2 id="winners" class="winners">Winners</h2>
            <tr> 
                <th>Date</th> 
                <th>Name</th> 
                <th>Email</th> 
                <th>Question</th> 
                <th>Price</th> 
            </tr> 

            <tbody>
                <?php
                if (!empty($data->winners)) {
                    foreach ($data->winners as $winner) {
                        ?>
                        <tr>
                            <td><?php echo $winner->Date; ?></td>
                            <td><?php echo $winner->Name; ?></td>
                            <td><?php echo $winner->Email; ?></td>
                            <td><?php echo $winner->Question; ?></td>
                            <td><?php echo $winner->Price; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?> 
            </tbody>

        </table> 
        <a  href="#top" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Back to top</a>
    </div>
</main>

<?php
if (!$user->isLoggedIn()) {
    ?>
    <div id="login" class="container login"  data-sr="enter bottom and scale up 20% over 2s">
        <div class="login-wrap">
            <?php
            if (!empty($data->feedback)) {
                foreach ($data->feedback as $feedback) {
                    echo $feedback;
                }
            }
            ?>
            <h2 class="text-capitalize padding"  data-sr="wait 0.5s and enter top and scale up 20% over 2s">Login</h2>

            <form class="form-signin" method="post" action="<?php echo URL; ?>verify/login" data-parsley-validate>
                <input type="text" name="username"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
                <input type="password" name="password"  class="form-control" placeholder="Adgangskode" required="">

                <input class="btn btn-block btn-success" type="submit" name="submit" value="Login"><br>
                <a  href="#register" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Register</a>
            </form>
            <a  href="#top" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Back to top</a>
        </div> <!-- /login-wrap (incl. register/login form) -->

    </div>

    <div id="register" class="container"  data-sr="enter bottom and scale up 20% over 2s">
        <div class="login-wrap">
            <?php
            if (!empty($data->feedback)) {
                foreach ($data->feedback as $feedback) {
                    echo $feedback;
                }
            }
            ?>
            <h2 class="text-capitalize padding"  data-sr="wait 0.5s and enter top and scale up 20% over 2s">Register</h2>

            <form class="form-signin"  method="post" action="<?php echo URL; ?>verify/register" data-parsley-validate>
                <input type="text" name="username"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
                <input type="password" name="password"  class="form-control" placeholder="Adgangskode" required="">

                <input class="btn btn-block btn-success" type="submit" name="submit" value="Login"><br>
                <a  href="#login" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Login</a>
            </form>
            <a  href="#top" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Back to top</a>
        </div> <!-- /login-wrap (incl. register/login form) -->

    </div>

<div id="newsletter" class="container login"  data-sr="enter bottom and scale up 20% over 2s">
    <div class="login-wrap">
        <?php
        if (!empty($data->feedback)) {
            foreach ($data->feedback as $feedback) {
                echo $feedback;
            }
        }
        ?>
        <h2 class="text-capitalize padding"  data-sr="wait 0.5s and enter top and scale up 20% over 2s">Newsletter</h2>
        <form class="form-signin" method="post" action="<?php echo URL; ?>create/subscriber" data-parsley-validate>
            <input type="text" name="Name"  class="form-control" placeholder="Name" required="" autofocus="">
            <input type="email" name="Email"  class="form-control" placeholder="Email" required="">
            <input class="btn btn-block btn-success" type="submit" name="submit" value="Signup"><br>
        </form>

        <form class="form-signin"  method="post" action="<?php echo URL; ?>delete/subscriber" data-parsley-validate>
            <input type="email" name="email"  class="form-control" placeholder="Email" required="">
            <input class="btn btn-block btn-danger" type="submit" name="submit" value="Signoff"><br>
        </form>
        <a  href="#top" data-sr="wait 1s and enter bottom and scale up 20% over 2s">Back to top</a>
    </div>
</div>
    <?php
}
?>
