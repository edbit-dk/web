<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Kommentarer</h2>
        <?php echo $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        echo Table::start("class='table table-striped'");
        echo Table::head(array(
            'Dato',
            'Navn',
            'Text',
            'Status',
            'Bog',
            'Handlinger'
        ));
        foreach ($multidata->data as $data)
        {
            echo Table::data(array(
                date("d/m/y h:i", $data->Date),
                $data->Name,
                $data->Text,
                $data->Active,
                $data->Book_ID,
                "<a class='btn btn-success' href='" . URL . 'admin/update/comments/' . $data->ID . "'>Rediger</a>",
                "<form action='" . URL . 'comment/remove/' . $data->ID . "' method='post' onsubmit=\"return confirm('Er du sikker?')\"><input type='submit' value='Slet' class='btn btn-danger'></form>"
            ));
        }
        echo Table::end();
        ?>
    </div>
</div>