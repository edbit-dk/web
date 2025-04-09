<h2>Konto</h2>
<?php
if (login_auth('user'))
{


    $ID = $_SESSION[$_user];



    $query  = "SELECT * FROM {$_prefix}_users WHERE ID = $ID";
//$con->query($query);
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $row = $result->fetch_object();
    ?>



    <form action="?page=update-customer" method="post">
        <p>Brugernavn:<br> <input type="text"  disabled name="username" value="<?php echo $row->username; ?>"></p>
        <p> Fornavn: <br><input type="text" name="firstname"  value="<?php echo $row->firstname; ?>"></p>
        <p> Efternavn: <br><input type="text" name="lastname"  value="<?php echo $row->lastname; ?>"> </p>
        <p> Email: <br><input type="email" name="email"   value="<?php echo $row->email; ?>"> </p>
        <p> Leveringsadresse: <br><input type="text" name="shipping_address" value="<?php echo $row->shipping_address; ?>"> </p>
        <p> Betalingsadresse: <br><input type="text" name="billing_address"   value="<?php echo $row->billing_address; ?>"> </p>
        <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
        <br>    <br>
        <input class="btn btn-block btn-primary" type="submit" value="Opdatér">
        <br>    <br>
    </form>

    <a class="btn btn-block btn-danger" href="?page=logout">Log ud</a>
    <?php
}
else
{
    ?>
    <form method="post" action="?page=login">
        <input type="text" name="username" required placeholder="Brugernavn">
        <input type="password" name="password" required placeholder="Adgangskode">
        <input class="btn btn-success" type="submit" value="Log ind">
    </form>
    <br>
    <a class="btn btn-primary" href="?page=new-customer">Ny kunde?</a>
     <a class="btn btn-primary" href="admin">Admin?</a>
    <?php
}

