<?php

/*
 * Main folder setup 
 * A constant that holds the project's folder path, like "/var/www/". 
 * DIRECTORY_SEPARATOR adds a slash to the end of the path
 */
define('PATH_ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

//set a constant that holds the project's "source" folder, like "/var/www/application". 
define('PATH_SRC', PATH_ROOT . 'src/');

//data folder 
define('PATH_DATA', PATH_SRC . 'data/');

//classes libs 
define('PATH_LIBS', PATH_DATA . 'libs/');

//App config folders 
define('PATH_CONFIG', PATH_SRC . 'config/');

// logs folder
define('PATH_LOGS', PATH_ROOT . 'public/logs/');

// Define project folder
define('PATH_PROJECT', PATH_ROOT .'app/');
define('PATH_PROJECT_NAME', 'app');

//MVC folders 
define('PATH_MODELS', PATH_PROJECT . 'data/models'. DIRECTORY_SEPARATOR); 
define('PATH_VIEWS', PATH_PROJECT . 'data/views'. DIRECTORY_SEPARATOR);
define('PATH_TEMPLATES', PATH_VIEWS. '_templates'. DIRECTORY_SEPARATOR); 
define('PATH_CONTROLLERS', PATH_PROJECT . 'data/controllers'. DIRECTORY_SEPARATOR); 


// Check config file
if (!file_exists(PATH_ROOT . 'public/config.php'))
    {
    header("Location: install/index.php?step=welcome");
    exit();
    }
else
    {
    require_once(PATH_ROOT . 'public/config.php');
    }


/**
 * Configuration for: Error reporting for development and production mode 
 * Useful to show every little problem during development, but only show hard errors in production 
 */
if (DEBUG == true)
    {
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
    ini_set('log_errors', 'On'); // enable or disable php error logging (use 'On' or 'Off')
    //ini_set('error_log', PATH_LOGS . 'php-error.log'); // path to server-writable log file
    }
else
    {
    error_reporting(0);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
    ini_set('log_errors', false);
    }

// Start bootstrap
require_once(PATH_SRC . 'Bootstrap.php');
$app = Bootstrap::load(PATH_SRC);
// start database connection
$app->remote(Database::load(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS),
        'Options');
$app->config(PATH_CONFIG);

i18n::load(LanguageModel::load(Database::load()));

switch (DEBUG)
    {
    case false:
        Cache::start();

        //Start app
        $app = new Router('url', PATH_CONTROLLERS);

        Cache::stop();
        break;

    case true:
        // Script start
        $debug = new Debug();
        $start = $debug->usage();

        //INITIALIZE COUNTER CLASS
        $counter = new Timer();
        //START COUNTER
        $counter->startCounter();


        //Start app  
        $app = new Router('url', PATH_CONTROLLERS);


        //STOP COUNTER
        $counter->stopCounter();


        // Script end
        $end = $debug->usage();
          ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php
            echo "<pre>Process: " . $debug->runtime($end, $start, "utime") . " ms\n<br>";
            echo "Calls: " . $debug->runtime($end, $start, "stime") . " ms\n<br>";
            echo "Memory: " . Output::convert(memory_get_usage(true)) . " \n<br>";
            //OUTPUT EXECUTION TIME
            echo "Execution time: " . $counter->getElapsedTime() . " ms\n</pre>";
            ?>
        </di>
        <?php
        break;

    default:
        //Start app  
        $app = new Router('url', PATH_CONTROLLERS);
    } 