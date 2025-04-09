<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Rediger event</h2>
    <?php $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        foreach ($multidata->categories as $value)
        {
            $options[] = Form::options($value->ID, $value->Name);
        }
        foreach ($multidata->data as $data)
        {
            echo Form::start(URL . 'event/update', 'post', true),
            "<br>Skal vises på forsiden:<br>",
            Form::input('checkbox', 'Front', '1', null),
            Form::input('hidden', 'Front', '0', null),
            "<br>Titel:<br>",
            Form::input('text', 'Titel', $data->Title, 'required'),
            "<br>Taler:<br>",
            Form::input('text', 'Taler', $data->Speaker),
            "<br>Entre:<br>",
            Form::input('text', 'Entre', $data->Fee, 'required'),
            "<br>Dato:" . date("d/m/y h:i", $data->Date) . "<br>",
            Form::input('hidden', 'Dato', date("d/m/y h:i", $data->Date)),
            Form::input('date', 'Dato', null),
            "<br>Lokation:<br>",
            Form::textarea('Location', 'required id="editor"', $data->Location),
            "<br>Beksrivelse:<br>",
            Form::textarea('Tekst', 'required id="editor"', $data->Text),
            "<br>Kort beksrivelse:<br>",
            Form::textarea('Short', 'required id="editor"', $data->Short),
            "<br>Billede:<br>",
            "<img width='300' src='" . URL . "public/uploads/" . $data->Img . "'>",
            "<br><br>",
            Form::input('hidden', 'img', $data->Img),
            Form::input('file', 'file[]', null),
            "<br><br>",
            Form::input('hidden', 'ID', $data->ID, 'required'),
            Form::submit('submit', 'Gem'),
            Form::end();
        }
        ?>

    </div>
</div>