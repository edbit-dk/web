<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Bøger</h2>
    <?php echo $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        echo Table::start("class='table table-striped'");
        echo Table::head(array(
            'Titel',
            'Forfatter',
            'ISBN nr.',
            'Forlag',
            'Antal sider',
            'Udgivet',
            'Handlinger'
        ));
        foreach ($multidata->data as $data)
        {
            echo Table::data(array(
                $data->Title,
                $data->Author,
                $data->ISBN,
                $data->Publisher,
                $data->Pages,
                date("d/m/y h:i", $data->Date),
                "<a class='btn btn-success' href='" . URL . 'admin/update/books/' . $data->ID . "/categories'>Rediger</a>",
                "<form action='" . URL . 'book/remove/' . $data->ID . "' method='post' onsubmit=\"return confirm('Er du sikker?')\"><input type='submit' value='Slet' class='btn btn-danger'></form>"
            ));
        }
        echo Table::end();
        ?>
    </div>
</div>