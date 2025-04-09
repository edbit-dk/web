<table class="table table-striped">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Navn</th>
            <th>Email</th>
            <th>Emne</th>
            <th>Besked</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nr = 1;
        foreach ($data->messages as $message) {
            ?>
            <tr>
                <td><?php echo $nr++ ?></td>
                <td><?php echo $message->Name ?></td>
                <td><?php echo $message->Email ?></td>
                <td><?php echo $message->Subject ?></td>
                <td><?php echo $message->Content ?></td>
                <td>
                    <form action="<?php echo URL; ?>delete/message" method="post" onsubmit="return confirm(&#39; Er du sikker? &#39;)" >
                        <input type="hidden" name="ID" value="<?php echo $message->ID; ?>" />
                        <input class="btn btn-danger" type="submit" value="Slet">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>