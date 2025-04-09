<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Kontrolpanel</h1>

    <h3>Velkommen</h3>
        <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <p>Du er logget ind som: <?php echo Output::escape($data->user->data()->Username); ?></p>
</div>