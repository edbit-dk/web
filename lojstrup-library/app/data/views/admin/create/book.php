<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Ny bog</h2>
    <?php $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        foreach ($multidata->categories as $value)
        {
            $data[] = Form::options($value->ID, $value->Name);
        }
        echo Form::start(URL . 'book/create', 'post', true),
        "<br>Skal vises på forsiden:<br>",
        Form::input('checkbox', 'Front', '1', null),
        Form::input('hidden', 'Front', '0', null),
        "<br>Titel:<br>",
        Form::input('text', 'Titel', null, 'required'),
        "<br>Forfatter:<br>",
        Form::input('text', 'Forfatter', null, 'required'),
        "<br>ISBN nr.:<br>",
        Form::input('text', 'ISBN', null, 'required'),
        "<br>Udgivelse:<br>",
        Form::input('date', 'Udgivelse', null, 'required'),
        "<br>Udgiver:<br>",
        Form::input('text', 'Udgiver', null, 'required'),
        "<br>Antal sider:<br>",
        Form::input('number', 'Sider', null, 'required'),
        "<br>Kategori:<br>",
        Form::select('Kategori', $data),
        "<br>Beksrivelse:<br>",
        Form::textarea('Tekst', 'required id="editor"'),
        "<br>Kort beksrivelse:<br>",
        Form::textarea('Short', 'required id="editor"'),
        "<br>Billede:<br>",
        Form::input('file', 'file[]', null, 'required multiple'),
        "<br><br>",
        Form::submit('submit', 'Opret'),
        Form::end();
        ?>
    </div>
</div>