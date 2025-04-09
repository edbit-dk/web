<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h2 class="sub-header">Beskeder</h2>
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
            <th>Emne</th>
            <th>Email</th>
            <th>Besked</th>
            <th>Slet</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->messages)) {
            foreach ($data->messages as $message) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$message->message_subject</td>";
                echo "<td>$message->message_email</td>";
                echo "<td>$message->message_text</td>";
                echo "<td><a class='btn btn-danger' href='" . URL . "delete/message/" . $message->message_id . "'>Slet</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>