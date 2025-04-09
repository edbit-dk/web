<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Ordrer Nr.</th>
            <th>Dato</th>
            <th>Total</th>
            <th>Status</th>
            <th>Kunde</th>
            <th>Detaljer</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->orders as $order) {
            ?>
            <tr>
                <td><?php echo $nr++; ?></td>
                <td>#<?php echo $order->Order_ID; ?></td>
                <td><?php echo date("d/m/y h:i", $order->Date); ?></td>
                <td><?php echo $order->Total; ?> kr.</td>
                <td>
                    <form action="<?php echo URL; ?>update/status" method="post">
                        <select  name="option" >
                            <?php
                            foreach ($data->options as $option) {
                                if ($option->ID === $order->Status_ID) {
                                    ?>
                                    <option value="<?php echo $option->ID; ?>" selected><?php echo $option->Name; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $option->ID; ?>"><?php echo $option->Name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <input type="hidden" name="ID" value="<?php echo $order->Order_ID; ?>" />
                        <input class="btn btn-success" type="submit" value="Opdater"/>
                    </form>
                </td>
                <td><a href="<?php echo URL; ?>kunder/detaljer/<?php echo $order->User_ID; ?>"><?php echo $order->Firstname; ?> <?php echo $order->Lastname; ?></a></td>
                <td><a href="<?php echo URL; ?>ordrer/detaljer/<?php echo $order->Order_ID; ?>">Detaljer</a></td>
                <td>
                    <form action="<?php echo URL; ?>delete/order" method="post"  onsubmit="return confirm(&#39; Er du sikker?&#39;)">
                        <input type="hidden" name="ID" value="<?php echo $order->Order_ID; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet ordrer"/>
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>