<?php
// Main folder setup
// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
//App config folders
define('CONFIG', APP . 'config' . DIRECTORY_SEPARATOR);
//App core folders
define('CORE', APP . 'core' . DIRECTORY_SEPARATOR);
//App core folders
define('PUBLIC_FOLDER', ROOT . 'public' . DIRECTORY_SEPARATOR);
//Uploads
define('UPLOADS', PUBLIC_FOLDER . 'uploads' . DIRECTORY_SEPARATOR);

//Get required core files to initialize app
require_once APP . 'Bootstrap.php';

if (DEBUG == true) {
    try {
        //Start app
        $app = new App;

//Catch errors
    } catch (Exception $e) {
        echo '<p><strong>Message:</strong>' . $e->getMessage() . '</p>';
        echo '<p><strong>Code:</strong>' . $e->getCode() . '</p>';
        echo '<p><strong>File:</strong>' . $e->getFile() . '</p>';
        echo '<p><strong>Line:</strong>' . $e->getLine() . '</p>';
        echo '<p><strong>Trace:</strong>';
        print_r($e->getTrace());
        echo '</p>';
        echo '<p><strong>Trace:</strong>' . $e->getTraceAsString() . '</p>';
        echo '<p><strong>Echo:</strong>' . $e . '</p>';
    }
} else {
    //Start app
    $app = new App;
}

// User check
require_once MODELS . 'User.php';
$user = NEW User;

if (Cookie::exists(COOKIE_NAME) && !Session::exists(SESSION_NAME)) {
    $hash = Cookie::get(COOKIE_NAME);
    $hashCheck = DB::getInstance()->get(SESSION_TABLE, array(SESSION_HASH, '=', $hash));

    if ($hashCheck->count()) {
        $user = User($hashCheck->first()->User_ID);
        $user->login();
    }
}

