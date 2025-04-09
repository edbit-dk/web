
<div class="container">

    <form method="post" action="<?php echo URL ; ?>auth/verify" class="form-signin">
        <h2 class="form-signin-heading"><?php
            i18n::output( 'VIEW_SUB_HEADER' , 'auth' )
            ?></h2>
        <?php echo $this->renderFeedback() ; ?>
        <label for="inputEmail" class="control-label"><?php
            i18n::output( 'VIEW_USERNAME' , 'auth' )
            ?></label>
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="<?php
        i18n::output( 'VIEW_USERNAME' , 'users' )
        ?>" required="" autofocus="">
        <label for="inputPassword" class="control-label"><?php
            i18n::output( 'VIEW_PASSWORD' , 'auth' )
            ?></label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php
        i18n::output( 'VIEW_PASSWORD' , 'auth' )
        ?>" required="">
        <div class="checkbox">
            <label>
                <input type="checkbox" class="control-label" name="remember-me"> <?php
                i18n::output( 'REM_ME' , 'auth' )
                ?>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?php
            i18n::output( 'VIEW_LOGIN' , 'auth' )
            ?></button><br>
        <a href="<?php echo URL . '../' ; ?>">Tilbage til hjemmeside</a>
    </form>

</div> <!-- /container -->
