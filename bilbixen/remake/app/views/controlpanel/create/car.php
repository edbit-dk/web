<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Ny Annonce</h2>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form method="post" action="<?php echo URL; ?>create/car" enctype="multipart/form-data" data-parsley-validate>
        <p>Navn:</p> <input  type="text" name="name" data-parsley-minlength="6" data-parsley-trigger="change" required><br><br>
        <p>Kategori:</p>
            <?php
            if (!empty($data->categories)) {
                foreach ($data->categories as $category) {
                    echo "<input type='checkbox' name='category' value='" . $category->cat_id . "'> " . $category->cat_name . "<br>";
                }
            }
            ?>
<br>
        <p>Pris:</p> <input  type="number" name="price" data-parsley-minlength="1" data-parsley-trigger="change" required><br><br>
        <p>Årgang:</p> <input  type="number" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="year" required><br><br>
        <p>KM:</p> <input  type="number" name="km" data-parsley-minlength="1" data-parsley-trigger="change" required><br><br>
        <p>Billede:</p> <input  type="file" name="file" required><br>
        <input type="text" name="hidden" style="display: none"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>