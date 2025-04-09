<div class="container">
<?php echo   $timestamp = date('d-m-Y_H-i-s'); ?>

    <form action="<?php echo URL ?>files/upload" method="POST" enctype="multipart/form-data">
        File: <input type="file" name="file"><br>
        <input type="submit" name="upload" value="Upload">
    </form>
</div>