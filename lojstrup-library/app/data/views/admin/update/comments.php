<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Rediger kommentar</h2>
    <?php $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
         foreach ($multidata->data as $data)
        {
        echo Form::start(URL . 'comment/update', 'post'),
        "<br>Navn:<br>",
        Form::input('text', 'Navn', $data->Name, 'disabled'),
        "<br>Kommentar:<br>",
        Form::textarea('text', 'Tekst', $data->Text, 'required'),
        "<br>Status:<br>",
        Form::input('text', 'Active', $data->Active, 'required'),
        Form::input('hidden', 'ID', $data->ID),
        "<br><br>",
        Form::submit('submit', 'Gem'),
        Form::end();
        }
        ?>
    </div>
</div>