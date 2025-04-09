<table class="table table-striped">

    <tbody>
    <form method="post" action="<?php echo URL; ?>create/coupon">
            <tr>
            <label for="name">Navn</label><br>
            <td><input type="text" name="name" ></td>
            <input type="hidden" name="ID"  value="<?php echo $coupon->ID; ?>" />
            </tr>

            <tr>
                <td>
                    <label for="start">Start dato</label><br>
                    <input type="date" name="start">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="end">Slut dato</label><br>
                    <input type="date" name="end">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="code">Kode</label><br>
                    <input type="text" name="code" >
                </td>
            </tr>

            <tr>
                <td>
                    <label for="discount">Rabat</label><br>
                    <input type="text" name="discount" >
                </td>
            </tr>

            <tr>
                <td>
                    <input class="btn btn-success" type="submit" value="Opret" />
                </td>
            </tr>

    </form>
</tbody>
</table>
