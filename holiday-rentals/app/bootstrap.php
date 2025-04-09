<?php

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define( 'PATH_ROOT' , dirname( __DIR__ ) . DIRECTORY_SEPARATOR ) ;

// set a constant that holds the project's "application" folder, like "/var/www/application".
define( 'PATH_APP' , PATH_ROOT . 'app' . DIRECTORY_SEPARATOR ) ;

// set app mvc folders for routing of application
define( 'PATH_APP_CONTROLLERS' , PATH_APP . 'controllers' . DIRECTORY_SEPARATOR ) ;
define( 'PATH_APP_VIEWS' , PATH_APP . 'views' . DIRECTORY_SEPARATOR ) ;
define( 'PATH_APP_MODELS' , PATH_APP . 'models' . DIRECTORY_SEPARATOR ) ;

// set public uploads folders
define( 'PATH_PUBLIC_UPLOADS_SOURCE' ,
        PATH_ROOT . 'public/uploads/source' . DIRECTORY_SEPARATOR ) ;
define( 'PATH_PUBLIC_UPLOADS_THUMBS' ,
        PATH_ROOT . 'public/uploads/thumbs' . DIRECTORY_SEPARATOR ) ;

// set vendor folder dependencies
define( 'PATH_VENDOR' , PATH_ROOT . 'vendor' . DIRECTORY_SEPARATOR ) ;


// this is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is. The
// default will be used instead.
if ( file_exists( PATH_VENDOR . 'autoload.php' ) )
{
    require_once PATH_VENDOR . 'autoload.php' ;
}
else
{

    //Define the paths to the directories holding class files
    require_once PATH_VENDOR . 'thom855j/autoloader/Autoload.php' ;
    Autoload::load( array(
        PATH_APP ,
        PATH_VENDOR
    ) )->namespaces() ;
}

// load application config (error reporting etc.)
require_once(PATH_APP . 'config.php') ;

// set env
if ( DEBUG == true )
{
    error_reporting( E_ALL ) ;
    ini_set( 'display_errors' , true ) ;
    ini_set( 'display_startup_errors' , true ) ;
    //ini_set('log_errors', 'On'); // enable or disable php error logging (use 'On' or 'Off')
    //ini_set('error_log', PATH_LOGS . 'php-error.log'); // path to server-writable log file
}
else
{
    error_reporting( 0 ) ;
    ini_set( 'display_errors' , false ) ;
    ini_set( 'display_startup_errors' , false ) ;
    ini_set( 'log_errors' , false ) ;
}

