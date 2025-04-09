<?php

// Load config files
foreach (glob(CONFIG . '*.*') as $config) {
    require_once($config);
}

// Load lib files
foreach (glob(DATA . '*.*') as $data) {
    require_once($data);
}


// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require_once(ROOT . 'vendor/autoload.php');
}

// Autoload universal classes 
if (DEBUG == TRUE) {

    function autoload($class) {
        if (file_exists(LIBS . $class . '.php')) {
            require_once(LIBS . $class . '.php');
        } else {
            exit('The file/class ' . $class . '.php is missing!');
        }
    }

    spl_autoload_register('autoload');
} else {
    spl_autoload_register(function($class) {
        require_once(LIBS . $class . '.php');
    });
}

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_EXPIRY)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > SESSION_EXPIRY) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}