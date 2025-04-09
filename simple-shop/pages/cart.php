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

if (isset($_SESSION[$_cart]))
{
    ?>
    <h2>Kurv</h2>
    <table class="table table-striped">
        <thead>

            <tr>
                <th>Antal</th>
                <th>Produkt</th>
                <th>Pris</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($_SESSION[$_cart]))
            {

                $total = 0;
                foreach ($_SESSION[$_cart] as $value)
                {

                    $product_id = $value['ID'];
                    $query      = "SELECT * FROM {$_prefix}_products WHERE ID = $product_id";
                    $result     = $con->query($query);

                    while ($row = $result->fetch_assoc())
                    {
                        $subtotal = $row['price'] * $value['amount'];

                        $total = $total + $subtotal;
                        ?>
                        <tr>
                            <td>
                                <form action="?page=update" method="post">
                                    <input type="number" name="amount" min="1" value="<?php echo $value['amount']; ?>">
                                    <input  type="hidden" name="ID" value="<?php echo $value['ID'] ?>">
                                    <input type="hidden" name="navn" value="<?php echo $value['name']; ?>">
                                    <input type="hidden" name="pris" value="<?php echo $row['price']; ?>">
                                    <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

                                    <input style="margin-top: 10px;" class="btn btn-primary" type="submit" value="Opdatér">
                                </form>

                                <?php
                                echo '<td>' . $value['name'] . '</td>';
                                echo '<td>' . $row['price'] . '</td>';
                                echo '<td>' . $subtotal . '</td>';
                                ?>
                            </td>
                            <td>
                                <form action="?page=delete" method="post">
                                    <input  type="hidden" name="ID" value="<?php echo $value['ID'] ?>">
                                    <input class="btn btn-danger" type="submit" value="Slet">
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                }
                ?>
            </tbody>

        </table>
        <table class="table table-striped">
            <thead>

                <tr>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DKK <?php echo $total; ?></td>
                    <td>Moms udgør 25% (DKK <?php echo ($total * 20) / 100 ?>) </td>
                </tr>
            </tbody>

        </table>
        <?php
    }
    else
    {
        echo 'Indkøbskurv tom.';
    }
    ?>
    <a href="?page=kasse" class="btn btn-success">Gå til kasse</a>
    <?php
}
else
{
    echo 'Indkøbskurv tom.';
}

