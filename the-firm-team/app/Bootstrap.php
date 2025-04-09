<?php

// Load config files
foreach (glob(CONFIG . '*.*') as $config) {
    require_once $config;
}

// Load core files
foreach (glob(CORE . '*.*') as $core) {
    require_once $core;
}


// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require_once ROOT . 'vendor/autoload.php';
}

// Autoload universal classes 
if (DEBUG == true) {

    function autoload($class) {
        if (file_exists(LIBS . $class . '.php')) {
            require_once LIBS . $class . '.php';
        } else {
            exit('The file/class ' . $class . '.php is missing!');
        }
    }

    spl_autoload_register('autoload');
} else {
    spl_autoload_register(function($class) {
        require_once LIBS . $class . '.php';
    });
}

// Start session and check for sessions and cookies
session_start();

