<?php
if (isset($_SESSION['errors']))
    {
    foreach ($_SESSION['errors'] as $value)
        {
        echo $value;
        }
    //var_dump($_SESSION);
    }
?>
<h2>Ny Kunde</h2>
<form action="?page=create-customer" method="post">
    <input type="text" name="firstname" required placeholder="Fornavn" >
    <input type="text" name="lastname" required placeholder="Efternavn" >
    <input type="text" name="email" required placeholder="Email" >
    <input type="text" name="address" required placeholder="Adresse" >
    <input type="text" name="username" required placeholder="Brugernavn" >
    <input type="text" name="password" required placeholder="Adgangskode" >
    <br>    <br>
    <input class="btn btn-success" type="submit" value="Opret">
</form>

<br>
<a class="btn btn-primary" href="?page=account">Log ind</a>