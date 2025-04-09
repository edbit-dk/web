<a  class="btn btn-success" href="<?php echo URL; ?>opret/kupon">Nyt produkt</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Navn</th>
            <th>Start dato</th>
            <th>Slut dato</th>
            <th>Kode</th>
            <th>Rabat</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->coupons as $coupon)
        {
            ?>
            <tr>
                <td><?php echo $nr++ ?></td>
                <td><?php echo $coupon->Name ?></td>
                <td><?php echo date("d/m/y h:i", $coupon->Start); ?></td>
                <td><?php echo date("d/m/y h:i", $coupon->End); ?></td>
                <td><?php echo $coupon->Code ?></td>
                <td><?php echo $coupon->Discount ?></td>
                <td><?php
                    if ($coupon->Active === 0)
                    {
                        echo "Ikke aktiv";
                    }
                    echo "Aktiv";
                    ?></td>
                <td>
                <td><a  class="btn btn-primary" href="<?php echo URL; ?>rediger/kupon/<?php echo $coupon->ID; ?>">Rediger</a></td>
                <td>
                    <form action="<?php echo URL; ?>delete/coupon" method="post" onsubmit="return confirm('Er du sikker?')" >
                        <input type="hidden" name="ID" value="<?php echo $coupon->ID; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>