</div><!-- end: main -->
<div id="panel"> 
    <div class="cart">
        <h2>Kurv</h2>
        <table>

            <?php
            if (isset($_SESSION[$_cart]))
            {
                ?>
                <tr>
                    <th>Produkt</th>
                    <th>Antal</th>		
                    <th>Pris</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION[$_cart] as $value)
                {
                    $total = $total + $value['subtotal'];
                    ?>
                    <tr>
                        <?php
                        echo '<td>' . $value['name'] . '</td>';
                        echo '<td>' . $value['amount'] . '</td>';
                        echo '<td>DKK ' . $value['subtotal'] . '</td>';
                        ?>
                    </tr>
                    <?php
                }
                ?>
                        <tr>
                    <?php
                    if (isset($_SESSION['coupon']['discount']))
                    {
                        ?>
                        <td>DKK <?php echo $total - ($total * $_SESSION['coupon']['discount']); ?></td>
                    <?php
                    }
                    else
                    {
                        ?>
                        <td>DKK <?php echo $total; ?></td>
        <?php } ?>
                    <td>Moms 25% (DKK <?php echo ($total * 20) / 100 ?>) </td>
                </tr>
                <tr>
                    <td><a class="btn btn-success" href="?page=cart">Se kurv</a></td>
                    <td ><a class="btn btn-danger" href="?page=empty">Tøm</a>  </td>
                </tr>
                <?php
            }
            else
            {
                echo 'Indkøbskurv tom.';
            }
            ?>
        </table>
    </div>
</div><!-- end: panel -->
<div class="clear"></div>
</div><!-- end: content -->
<div id="footer">
    Multishoppen © 2015
    <div class="clear">
    </div>
</div><!-- end: footer -->
</div><!-- end: container -->

</body>
</html>