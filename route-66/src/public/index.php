<?php

// Main folder setup
// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
//data folder
define('DATA', APP . 'data' . DIRECTORY_SEPARATOR);
//App config folders
define('CONFIG', APP . 'config' . DIRECTORY_SEPARATOR);


//Get required core files to initialize app
require_once APP . 'Setup.php';
require_once APP . 'Bootstrap.php';

if (DEBUG == true) {
    try {

        if (CACHE == true) {
            Cache::start();
        }

        //Start app
        $start = new Router;

        if (CACHE == true) {
            Cache::stop();
        }

        if (CACHE_EMPTY == true) {
            Cache::clear();
        }

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

    if (CACHE == true) {
        Cache::start();
    }

    //Start app
    $start = new Router;

    if (CACHE == true) {
        Cache::stop();
    }

    if (CACHE_EMPTY == true) {
        Cache::clear();
    }
}


