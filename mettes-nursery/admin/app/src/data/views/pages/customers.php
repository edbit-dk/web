<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>ID</th>
            <th>Navn</th>
            <th>Brugernavn</th>
            <th>Email</th>
            <th>Adresse</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->customers as $customer) {
            ?>
            <tr>
                <td><?php echo $nr++ ?></td>
                <td><?php echo $customer->ID ?></td>
                <td><?php echo $customer->Firstname ?><br><?php echo $customer->Lastname ?></td>
                <td><?php echo $customer->Username ?></td>
                <td><?php echo $customer->Email ?></td>
                <td><?php echo $customer->Address ?></td>
                <td>
                    <form action="<?php echo URL; ?>delete/customer" method="post" onsubmit="return confirm(&#39;Er du sikker?&#39;)" >
                        <input type="hidden" name="ID" value="<?php echo $customer->ID; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>