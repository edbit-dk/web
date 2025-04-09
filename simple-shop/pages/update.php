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
if ($_POST['amount'] > 0)
{


    $product_id = $_POST['ID'];
    $query      = "SELECT * FROM {$_prefix}_products WHERE ID = {$product_id}";

    $result = $con->query($query);

    while ($row = $result->fetch_assoc())
    {
        if ($_POST['amount'] > $row['stock'])
        {
            ?>
            <p>Antal er højere end antal vare på lager. Vælg venligst et mindre antal og prøv igen.</p>
            <input class="btn btn-primary" action="action" type="button" value="Prøv igen" onclick="history.go(-1);" />
            <?php

            exit;
        }

        if (isset($_POST['ID']))
        {
            $_SESSION[$_cart][$_POST['ID']] = $_SESSION[$_cart][$_POST['ID']] = array(
                'ID'       => $_POST['ID'],
                'name'     => $row['name'],
                'amount'   => $_POST['amount'],
                'price'    => $row['price'],
                'subtotal' => $row['price'] * $_POST['amount']
            );

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
else
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}