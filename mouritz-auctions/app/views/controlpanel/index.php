<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
    <h1 class="page-header">Controlpanel</h1> 

    <h3>Velkommen</h3> 
        <?php 
        $Username = USER_USERNAME;
    if (!empty($data->errors)) { 
        foreach ($data->errors as $error) { 
            echo $error; 
        } 
    } 
    ?> 
    <p>You are logged in as: <?php echo Input::decode($data->user->data()->$Username); ?></p> 
</div>