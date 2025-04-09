<div class="col-md-3">
    <h4>Indkøbskurv</h4>
    <div class="bucket-titles">
        <h4>Produkt</h4>
        <p class="last">Pris</p>
    </div>
    <form class="bucket" action="<?php echo URL ; ?>butikken/kassen" method="post">
        <?php
        if ( Session::exists( 'products' ) )
        {
            foreach ( Session::get( 'products' ) as $product )
            {
                ?>
                <input type="text" size="1" value="<?php echo $product[ 'amount' ] ?>"  readonly/>
                <input type="text"  size="7" value="<?php echo $product[ 'name' ] ?>" readonly/>
                <input type="text"   size="4" value="<?php echo $product[ 'price' ] ?> kr"  readonly/>
                <?php
            }
        }
        else
        {
            echo 'Din indkøbskurv er tom' ;
        }
        ?>
        <div class="bucket-submit">
            <input  type="submit" value="Til kassen">
        </div>
        <a href="<?php echo URL ; ?>delete/cart">Tøm kurv</a>
    </form>

    <?php if ( !$user->isLoggedIn() )
    {
        ?>
        <h4>Kunde login</h4>
        <form class="login" action="<?php echo URL ; ?>login" method="post">
            <label  for="username">Brugernavn</label>
            <input title="Brugernavn" id="username" type="text" name="username" placeholder="Brugernavn" required/>
            <br><br>
            <label  for="password">Adgangskode</label>
            <input title="Adgangskode" id="password" type="password" name="password" placeholder="Adgangskode" required/>
            <br><br>
            <label  for="remember">Husk mig</label>
            <input title="Husk mig" id="remember" type="checkbox" name='remember'>
            <br><br>
            <input title="Login" type="submit" value="Login">
            <br><br>
            <p><a title="Opret kunde" href="<?php echo URL ; ?>opret-kunde">Opret kunde</a></p>
        </form>
    <?php
    }
    elseif ( $user->isLoggedIn() && $user->role( 'Admin' ) )
    {
        ?>
        <h4>Admin</h4>
        <p><a class="btn btn-primary" href="<?php echo URL ; ?>admin">Admin</a></p>
        <p><a class="btn btn-primary" href="<?php echo URL ; ?>konto">Konto</a></p>
        <p><a class="btn btn-danger" href="<?php echo URL ; ?>logout">Log ud</a></p>
<?php
}
elseif ( $user->isLoggedIn() && !$user->role( 'Admin' ) )
{
    ?>
        <h4>Kunde log ud</h4>
        <p><a class="btn btn-primary" href="<?php echo URL ; ?>konto">Konto</a></p>
        <p><a class="btn btn-danger" href="<?php echo URL ; ?>logout">Log ud</a></p>
<?php } ?>
</div>

