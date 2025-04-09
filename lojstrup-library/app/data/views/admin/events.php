<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Events</h2>
    <?php echo $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        echo Table::start("class='table table-striped'");
        echo Table::head(array(
            'Titel',
            'Dato',
            'Foredragsholder',
            'Text',
            'Placering',
            'Pris',
            'Forside'
        ));
        foreach ($multidata->data as $data)
        {
            echo Table::data(array(
                $data->Title,
                date("d/m/y h:i", $data->Date),
                $data->Speaker,
                $data->Text,
                $data->Location,
                $data->Fee,
                $data->Front,
                "<a class='btn btn-success' href='" . URL . 'admin/update/events/' . $data->ID . "'>Rediger</a>",
                "<form action='" . URL . 'event/remove/' . $data->ID . "' method='post' onsubmit=\"return confirm('Er du sikker?')\"><input type='submit' value='Slet' class='btn btn-danger'></form>"
            ));
        }
        echo Table::end();
        ?>
    </div>
</div>