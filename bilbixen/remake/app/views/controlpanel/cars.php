<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h2 class="sub-header">Annoncer</h2>
    <p><a href="<?php echo URL; ?>car">Alle Annoncer</a></p>
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
            <th>Navn</th>
            <th>Pris</th>
            <th>Status</th>
            <th>Opdater</th>
            <th>Slet</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->cars)) {
            foreach ($data->cars as $car) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                ?>
                <td><a href="<?php echo URL; ?>car/detail/<?php echo $car->ID; ?>"><?php echo $car->car_name ?></a></td>
                <?php
                echo "<td>" . number_format($car->car_price, 0, ',', '.') . " kr</td>";
                if ($car->car_sold == 1) {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/carstatus' method="post">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="ID" value="<?php echo $car->ID; ?>">
                            <input class='btn btn-primary' name="submit" type="submit" value="Solgt">
                        </form>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <form action='<?php echo URL; ?>update/carstatus' method="post">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="ID" value="<?php echo $car->ID; ?>">
                            <input class='btn btn-warning' name="submit" type="submit" value="Ikke Solgt">
                        </form>
                    </td>
                    <?php
                }
                echo "<td><a class='btn btn-success' href='" . URL . "controlpanel/edit/" . $car->ID . "'>Opdatér</td>";
                echo "<td><a class='btn btn-danger' href='" . URL . "delete/ad/" . $car->ID . "'>Slet</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>