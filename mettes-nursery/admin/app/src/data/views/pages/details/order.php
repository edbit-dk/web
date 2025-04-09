<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Stk.</th>
            <th>Produkt navn</th>
            <th>Stk. pris</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->orders as $order) {
            ?>
            <tr>
                <td><?php echo $nr++; ?></td>
                <td><?php echo $order->Quantity; ?></td>
                <td><?php echo $order->Product; ?></td>
                <td><?php echo $order->Price; ?> kr.</td>
                <td><?php echo $order->Subtotal; ?> kr.</td>
            </tr>

        <?php } ?>
    </tbody>
</table>