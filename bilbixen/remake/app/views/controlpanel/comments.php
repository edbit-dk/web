<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h2 class="sub-header">Kommentare</h2>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <table class="table table-striped" border='1'>

        <th>Nr.</th>
        <th>Annonce</th>
        <th>Dato</th>
        <th>Fra</th>
        <th>Email</th>
        <th>Status</th>
        <th>Læs</th>
        <th>Slet</th>


        <?php
        $nr = 1;
        if (!empty($data->comments)) {
            foreach ($data->comments as $comment) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                 ?>
                <td><a href="<?php echo URL; ?>car/detail/<?php echo $comment->car_id; ?>">Annonce <?php echo $comment->car_id; ?></a></td>
                <?php
                echo "<td>" . date('d-m-Y H:i:s', strtotime($comment->com_date)) . "</td>";
                echo "<td>$comment->com_name</td>";
                echo "<td>$comment->com_email</td>";
                if ($comment->com_approved == 1) {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/comment' method="post">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="ID" value="<?php echo $comment->ID; ?>">
                            <input class='btn btn-success' name="submit" type="submit" value="Godkendt">
                        </form>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/comment' method="post">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="ID" value="<?php echo $comment->ID; ?>">
                            <input class='btn btn-warning' name="submit" type="submit" value="Ikke Godkendt">
                        </form>
                    </td>
                    <?php
                }
                echo "<td><a class='btn btn-primary' href='" . URL . "controlpanel/comment/" . $comment->ID . "'>Læs</td>";
                echo "<td><a class='btn btn-danger' href='" . URL . "delete/comment/" . $comment->ID . "'>Slet</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>