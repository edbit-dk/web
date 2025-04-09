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

if (isset($_POST['coupon']))
{
    $code   = $con->real_escape_string($_POST['coupon']);
    $query  = "SELECT Name, Code, Discount FROM Coupons WHERE Code = '$code' ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $check  = mysqli_num_rows($result);

    if ($check)
    {
        $row = $result->fetch_object();

        $name     = $row->Name;
        $code     = $row->Code;
        $discount = $row->Discount;

        $_SESSION[$_coupon] = array(
            'discount' => $discount,
            'name'     => $name,
            'code'     => $code
        );

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    else
    {
        ?>
        <p>Kupon kode eksistere ikke!</p>
        <input class="btn btn-primary" action="action" type="button" value="Prøv igen" onclick="history.go(-1);" />
        <?php

    }
}

if (isset($_SESSION[$_coupon]))
{
    unset($_SESSION[$_coupon]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}