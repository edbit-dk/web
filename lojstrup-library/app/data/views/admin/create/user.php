<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Ny bruger</h2>
    <?php $this->renderFeedback(); ?>
    <div class="table-responsive">
        <?php
        echo Form::start(URL . 'create/user', 'post'),
        "<br>Brugernavn:<br>",
        Form::input('text', 'Brugernavn', null, 'required'),
        "<br>Adgangskode:<br>",
        Form::input('text', 'Adgangskode', null, 'required'),
        "<br>Email:<br>",
        Form::input('text', 'Email', null, 'required'),
        "<br>Fornavn:<br>",
        Form::input('text', 'Firstname', null, 'required'),
        "<br>Efternavn:<br>",
        Form::input('text', 'Lastname', null, 'required'),
        "<br><br>",
        Form::submit('submit', 'Opret'),
        Form::end();
        ?>
    </div>
</div>