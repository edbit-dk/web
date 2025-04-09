<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Info</h2>
    <?php echo $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        foreach ($multidata->data as $data)
        {
            echo Form::start(URL . 'info/update', 'post'),
            "<br>Om:<br>",
            Form::textarea('About', $data->About, 'id="editor" required'),
            "<br>Reglement:<br>",
            Form::textarea('Terms', $data->Terms, ' required'),
            "<br>Adresse:<br>",
            Form::textarea('text', 'Adresse', $data->Address, ' required'),
            "<br>Åbningstider:<br>",
            Form::input('text', 'Open', $data->Open, 'required'),
            "<br>Telefon:<br>",
            Form::input('text', 'Telefon', $data->Phone, 'required'),
            "<br>Fax:<br>",
            Form::input('text', 'Fax', $data->Fax, 'required'),
            "<br>Email:<br>",
            Form::input('text', 'Email', $data->Email, 'required'),
            "<br><br>",
            Form::submit('submit', 'Gem'),
            Form::end();
        }
        ?>
    </div>
</div>