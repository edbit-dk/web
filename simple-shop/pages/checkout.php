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
if (isset($_SESSION[$_user]))
{
    ?>
    <h1>Kasse</h1>
    <br>
    <h2>Rabat</h2>
    <?php
    if (!isset($_SESSION[$_coupon]))
    {
        ?>
        <p>Har du en rabat kupon, så udfyld den her og opdater.</p>
        <form method="post" action="?page=kupon">
            <input type="text" name="coupon" >
            <input type="submit" value="Opdater kasse">
        </form>
        <?php
    }
    else
    {
        ?>
        <h3><?php echo   $_SESSION[$_coupon]['name']; ?></h3>
        <form action="?page=kupon" method="post">
            <input class="btn btn-danger" type="submit" value="Slet">
        </form>
    <?php } ?>
    <in
        <br>  <br>
    <h2>Kurv</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Antal</th>
                <th>Pris</th>
                <th>Subtotal</th>
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
                    $query      = "SELECT Price FROM Products WHERE id = $product_id";

                    $result = $con->query($query);

                    while ($row = $result->fetch_assoc())
                    {
                        $subtotal = $row['Price'] * $value['amount'];
                        ?>
                        <tr>
                            <?php
                            echo '<td>' . $value['name'] . '</td>';
                            echo '<td>' . $value['amount'] . '</td>';
                            echo '<td>' . $row['Price'] . '</td>';
                            echo '<td>' . $subtotal . '</td>';
                            $total    = $total + $subtotal;
                            ?>
                        </tr>
                        <?php
                    }
                }
                ?>
        </table>
        <table class="table table-striped">
            <thead>

                <tr>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (isset($_SESSION[$_coupon]['discount']))
                    {
                        ?>
                        <td>DKK <?php echo $total - ($total * $_SESSION[$_coupon]['discount']); ?></td>

                        <td>Rabat (DKK <?php echo $total * $_SESSION[$_coupon]['discount'] ?>) </td>
                    <?php
                    }
                    else
                    {
                        ?>
                        <td>DKK <?php echo $total; ?></td>
        <?php } ?>
                    <td>Moms 25% (DKK <?php echo ($total * 20) / 100 ?>) </td>
                </tr>
            </tbody>

        </table>

        <h2>Fakturering og Levering</h2>
        <table class="table table-striped">
            <thead>

                <tr>
                    <th>Fornavn</th>
                    <th>Efternavn</th>
                    <th>Leveringsadresse</th>
                    <th>Betalingsadresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION[$_user];

                $query  = "
SELECT Firstname, Lastname, Shipping_Address, Billing_Address FROM Users WHERE ID = {$user_id}";
                $result = $con->query($query);
                while ($row    = $result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['Firstname']; ?></td>
                        <td><?php echo $row['Lastname']; ?></td>
                        <td><?php echo $row['Shipping_Address']; ?></td>
                        <td><?php echo $row['Billing_Address']; ?></td>
                    </tr>
            <?php
        }
        ?>
            </tbody>

        </table>

        <h2>Betaling</h2>
        <form action="?page=bestil" method="post">
            <select name="payment">
                <option value="kontant">Kontant ved afhentning</option>
                <option value="efterkrav">Efterkrav</option>
            </select>
            <br>     <br>
            <input class="btn btn-success" type="submit" value="Bestil" >
        </form>
        <?php
    }
    else
    {
        echo 'Indkøbskurv tom.';
    }
    ?>
    </tbody>

    <?php
}
else
{
    echo 'Du skal logge ind først for at fortsætte.'
    ?>
    <a href="?page=konto" class="btn btn-primary">Gå til log ind</a>
    <?php
}