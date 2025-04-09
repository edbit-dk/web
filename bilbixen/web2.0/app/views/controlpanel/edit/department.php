<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Opdatér Afdeling</h2>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }

    if (!empty($data->deb)) {
        foreach ($data->deb as $deb) {
            
        }
    }
    ?>
    <form method="post" action="<?php echo URL; ?>update/department" data-parsley-validate>
        <p>Navn:</p> <input  type="text" name="name" data-parsley-minlength="6" data-parsley-trigger="change" value="<?php echo Output::escape($deb->name); ?>" required><br><br>

        <p>Adresse:</p> <input size="30"  type="text" name="address" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo $deb->address; ?>" required><br><br>
        <p>Breddegrad:</p> <input  type="text" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="lat" value="<?php echo Output::escape($deb->latitude); ?>" required><br><br>
        <p>Længdegrad:</p> <input  type="text" name="lon" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo Output::escape($deb->longitude); ?>" required><br><br>
        <input type="hidden" name="ID" value="<?php echo $deb->id; ?>" />
        <input class="btn btn-success" type="submit" name="submit" value="Opdatér">
    </form>
</div>