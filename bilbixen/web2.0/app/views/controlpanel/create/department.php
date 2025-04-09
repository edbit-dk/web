<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Ny Afdeling</h2>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form method="post" action="<?php echo URL; ?>create/department" enctype="multipart/form-data" data-parsley-validate>
        <p>Navn:</p> <input  type="text" name="name" data-parsley-minlength="6" data-parsley-trigger="change" required><br><br>
        <p>Adresse:</p> <input  type="text" name="address" data-parsley-minlength="1" data-parsley-trigger="change" required><br><br>
        <p>Breddegrad:</p> <input  type="text" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="lat" required><br><br>
        <p>Længdegrad:</p> <input  type="text" name="lon" data-parsley-minlength="1" data-parsley-trigger="change" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>