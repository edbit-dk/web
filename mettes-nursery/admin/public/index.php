<?php

// Main folder setup
// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('PUBLIC_ROOT', str_replace("/admin", "", ROOT));
define('APP', ROOT . 'app/');
//src files
define('SRC', APP . 'src/');
//data folder
define('DATA', SRC . 'data/');
//class libs
define('LIBS', DATA . 'libs/');
//App config folders
define('CONFIG', DATA . 'config/');

if (!file_exists('../../public/Setup.php')) {
    header("Location: ../index.php");
    exit;
} else {
    require_once('../../public/Setup.php');
}

require_once(SRC . 'Bootstrap.php');


switch (DEBUG) {
    case 1:
        try {

            //Start app
            $app = new Router;

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
        break;

    case 0:

        if (CACHE === 1) {
            Cache::start();
        }

        //Start app 
        $start = new Router;

        if (CACHE === 1) {
            Cache::stop();
        }
        break;

    default:
        if (CACHE === 1) {
            Cache::start();
        }

        //Start app 
        $start = new Router;

        if (CACHE === 1) {
            Cache::stop();
        }
}


