<table class="table table-striped">

    <tbody>
    <form method="post" action="<?php echo URL; ?>update/coupon">
        <?php
        foreach ($data->coupon as $coupon)
        {
            ?>
            <tr>
            <label for="name">Navn</label><br>
            <td><input type="text" name="name" value="<?php echo $coupon->Name ?>"></td>
            <input type="hidden" name="ID"  value="<?php echo $coupon->ID; ?>" />
            </tr>

            <tr>
                <td>
                    <label for="start">Start dato</label><br>
                    <input type="date" name="start">
                    <input type="text" disabled="true" value="<?php echo date("d/m/y h:i", $coupon->Start); ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="end">Slut dato</label><br>
                    <input type="date" name="end">
                    <input type="text" disabled="true" value="<?php echo date("d/m/y h:i", $coupon->End); ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="code">Kode</label><br>
                    <input type="text" name="code" value="<?php echo $coupon->Code ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="discount">Rabat</label><br>
                    <input type="text" name="discount" value="<?php echo $coupon->Discount ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="btn btn-success" type="submit" value="Opdater" />
                </td>
            </tr>

        <?php } ?>
    </form>
</tbody>
</table>
