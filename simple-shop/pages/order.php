<?php
/*
 * Copyright (C) 2015 thom855j
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (isset($_POST) && isset($_SESSION[$_user]))
{
    $coupon = 'Ingen';
    if (isset($_SESSION[$_coupon]))
    {
        $coupon = $_SESSION[$_coupon]['name'];
    }
    $date     = time();
    $customer = $_SESSION[$_user];
    $payment  = $_POST['payment'];

    $query = "INSERT INTO {$_prefix}_orders (date, payment, coupon, user_id)
VALUES ('$date', '$payment', '$coupon', $customer)";
    $con->query($query);

    $last_id = $con->insert_id;

    if (isset($_SESSION[$_coupon]))
    {
        foreach ($_SESSION[$_cart] as $value)
        {
            $amount   = $value['amount'];
            $name     = $value['name'];
            $subtotal = $value['subtotal'] - ($value['subtotal'] * $_SESSION[$_coupon]['discount']);
            $price    = $value['price'] - ($value['price'] * $_SESSION[$_coupon]['discount']);
            $query    = "
INSERT INTO {$_prefix}_order_details (quantity, product, price, subtotal, order_id) 
VALUES ($amount, $name, $price, $subtotal,  $last_id)";
            //$con->query($query);
            mysqli_query($con, $query) or die(mysqli_error($con));
        }
    }
    else
    {
        foreach ($_SESSION[$_cart] as $value)
        {
            $amount   = $value['amount'];
            $name     = $value['name'];
            $subtotal = $value['subtotal'];
            $price    = $value['price'];
            $query    = "
INSERT INTO {$_prefix}_order_details (quantity, product, price, subtotal, order_id) 
VALUES ($amount, $name, $price, $subtotal,  $last_id)";
            //$con->query($query);
            mysqli_query($con, $query) or die(mysqli_error($con));
        }
    }
    foreach ($_SESSION[$_cart] as $value)
    {

        $amount = $value['amount'];
        $ID     = $value['ID'];

        $query = "UPDATE {$_prefix}_products SET stock = (stock - $amount) WHERE ID = $ID";
        //$con->query($query);
        mysqli_query($con, $query) or die(mysqli_error($con));
    }

    unset($_SESSION[$_cart]);
    unset($_SESSION[$_coupon]);
    ?>
    <h2>Ordrer bestilt!</h2>
    <a class="btn btn-primary" href="?page=catalog">Tilbage til katalog</a>
    <?php
}
else
{
    echo 'Du skal logge ind først eller oprette en konto for at kunne bestille.';
    ?>
    <a class="btn btn-primary" href="?page=new-customer">Ny kunde</a>
    <a class="btn btn-primary" href="?page=account">Log ind</a>
    <?php
}
