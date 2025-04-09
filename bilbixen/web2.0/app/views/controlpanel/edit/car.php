<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Opdatér Annonce</h2>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }

    if (!empty($data->cars)) {
        foreach ($data->cars as $car) {
            
        }
    }
    ?>
    <form method="post" action="<?php echo URL; ?>update/car" enctype="multipart/form-data" data-parsley-validate>
        <p>Navn:</p> <input  type="text" name="name" data-parsley-minlength="6" data-parsley-trigger="change" value="<?php echo Output::escape($car->name); ?>" required><br><br>
        <p>Kategori:</p><input type='checkbox' name='current_category' value='<?php echo Output::escape($car->cat_id); ?>' checked><?php echo Output::escape($car->category); ?><br>
        <br>
        <p>Pris:</p> <input  type="number" name="price" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo Output::escape($car->price); ?>" required><br><br>
        <p>Årgang:</p> <input  type="number" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="year" value="<?php echo Output::escape($car->year); ?>" required><br><br>
        <p>KM:</p> <input  type="number" name="km" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo Output::escape($car->km); ?>" required><br><br>
        <p>Billede:</p> <input  type="file" name="file"><br>
        <img width="300" src="<?php echo URL_UPLOADS . Output::escape($car->image); ?>"><br>      
        <input type="text" name="ID" value="<?php echo Output::escape($car->ID); ?>" style="display: none"><br>
        <input class="btn btn-success" type="submit" name="submit" value="Opdatér Annonce">
    </form>
</div>