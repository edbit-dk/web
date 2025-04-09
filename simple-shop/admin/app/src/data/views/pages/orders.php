<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Ordrer Nr.</th>
            <th>Dato</th>
            <th>Status</th>
            <th>Betaling</th>
            <th>Rabat</th>
            <th>Kunde</th>
            <th>Detaljer</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->orders as $order)
        {
            ?>
            <tr>
                <td><?php echo $nr++; ?></td>
                <td>#<?php echo $order->order_id; ?></td>
                <td><?php echo date("d/m/y h:i", $order->date); ?></td>
                <td>
                    <form action="<?php echo URL; ?>update/status" method="post">
                        <select  name="option" >
                            <?php
                            foreach ($data->status as $status)
                            {
                                if ($status->ID === $order->status_id)
                                {
                                    ?>
                                    <option value="<?php echo $status->ID; ?>" selected><?php echo $status->name; ?></option>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <option value="<?php echo $status->ID; ?>"><?php echo $status->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <input type="hidden" name="ID" value="<?php echo $order->order_id; ?>" />
                        <input class="btn btn-success" type="submit" value="Opdater"/>
                    </form>
                </td>
                <td><?php echo $order->payment; ?></td>
                <td><?php echo $order->coupon; ?></td>
                <td><a href="<?php echo URL; ?>kunder/detaljer/<?php echo $order->user_id; ?>"><?php echo $order->firstname; ?> <?php echo $order->lastname; ?></a></td>
                <td><a href="<?php echo URL; ?>ordrer/detaljer/<?php echo $order->order_id; ?>">Detaljer</a></td>
                <td>
                    <form action="<?php echo URL; ?>delete/order" method="post"  onsubmit="return confirm(Er du sikker?)">
                        <input type="hidden" name="ID" value="<?php echo $order->order_id; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet ordrer"/>
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>