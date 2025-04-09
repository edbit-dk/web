<a  class="btn btn-success" href="<?php echo URL; ?>opret/produkt">Nyt produkt</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Produkt navn</th>
            <th>Lagerbeholdning</th>
            <th>Pris</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $nr = 1;
        foreach ($data->products as $product) {
            ?>
            <tr>
                <td><?php echo $nr++ ?></td>
                <?php if ($product->Stock <= $product->Min) { ?>
                    <td class="out-of-stock"><?php echo $product->Name; ?> (udsolgt)<br>
                        <p>Mangler <?php echo ( $product->Max - $product->Stock); ?> produkter før max lager.</p>
                        <p>Mangler <?php echo ( $product->Min - $product->Stock); ?> produkter før min lager.</p>
                    </td>
                <?php } else { ?>
                    <td><?php echo $product->Name; ?> </td>
                <?php } ?>
                <td><?php echo $product->Stock; ?> stk.</td>
                <td><?php echo $product->Price; ?> kr</td>
                <td><a  class="btn btn-primary" href="<?php echo URL; ?>rediger/produkt/<?php echo $product->ID; ?>">Rediger</a></td>
                <td>
                    <form action="<?php echo URL; ?>delete/product" method="post" onsubmit="return confirm(&#39; Er du sikker?&#39;)" >
                        <input type="hidden" name="ID" value="<?php echo $product->ID; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>

