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

        <tr>
            <th>Nr.</th>
            <th>Dato</th>
            <th>Kommentar</th>
            <th>Status</th>
            <th>Slet</th>
            <th>Tilbage</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->comment)) {
            foreach ($data->comment as $data) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>" . date('d-m-Y H:i:s', strtotime($data->com_date)) . "</td>";
                echo "<td>$data->com_text</td>";
                        if ($data->com_approved == 1) {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/comment' method="post">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="ID" value="<?php echo $data->ID; ?>">
                            <input class='btn btn-success' name="submit" type="submit" value="Godkendt">
                        </form>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/comment' method="post">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="ID" value="<?php echo $data->ID; ?>">
                            <input class='btn btn-warning' name="submit" type="submit" value="Ikke Godkendt">
                        </form>
                    </td>
                    <?php
                }
                echo "<td><a class='btn btn-danger' href='" . URL . "delete/comment/" . $data->ID . "'>Slet</td>";
                  echo "<td><a class='btn btn-primary' href='" . URL . "controlpanel/comments'>Tilbage</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>