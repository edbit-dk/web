<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Brugere</h2>
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
                $data->Front
            ));
        }
        echo Table::end();
        ?>
    </div>
</div>