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

if (isset($_SESSION[$_user]) && isset($_POST['ID']))
{

    if (is_email($_POST['email']))
    {
        $user_id          = $_POST['ID'];
        $billing_address  = $_POST['billing_address'];
        $shipping_address = $_POST['shipping_address'];
        $email            = escape($_POST['email']);
        $firstname        = $_POST['firstname'];
        $lastname         = $_POST['lastname'];


        $query = " UPDATE {$_prefix}_users SET billing_address = '$billing_address', shipping_address = '$shipping_address',  email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE ID = $user_id";
        mysqli_query($con, $query) or die(mysqli_error($con));

        header('Location: ' . '?page=account');
        exit;
    }
    else
    {
        echo 'Fejl i det indtastede. Prøv venligst igen.';
        ?>
        <a class="btn btn-primary" href="?page=account">Prøv igen</a>
        <?php
    }
}