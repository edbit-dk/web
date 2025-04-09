<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h2 class="sub-header">Afdelinger</h2>
     <p><a class="btn btn-primary" href="<?php echo URL; ?>controlpanel/create/department">Ny Afdeling</a></p>
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
            <th>Name</th>
            <th>Address</th>
            <th>Rediger</th>
            <th>Slet</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->departments)) {
            foreach ($data->departments as $dep) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$dep->name</td>";
                echo "<td>$dep->address</td>";
                 echo "<td><a class='btn btn-primary' href='" . URL . "controlpanel/editdepartment/" . $dep->id . "'>Opdatér</td>";
                echo "<td><a class='btn btn-danger' href='" . URL . "delete/department/" . $dep->id . "'>Slet</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>