
<div class="container">

    <form method="post" action="<?php echo URL; ?>auth/create" class="form-signin">
        <h2 class="form-signin-heading">Register</h2>
        <?php $this->renderFeedback(); ?>
        <label for="inputEmail" class="sr-only">Brugernavn</label>
        <input type="text" name="Username" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Adgangskode</label>
        <input type="password" name="Adgangskode" id="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Husk mig
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log ind</button><br>
        <a href="<?php echo URL; ?>">Tilbage til hjemmeside</a>
        <a href="<?php echo URL; ?>auth/login">Log ind</a>
    </form>

</div> <!-- /container -->
