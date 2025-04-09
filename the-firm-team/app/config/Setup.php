<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */
/**
 * Configuration for: Development og production mode
 * Useful to show every little problem during development, but only show hard errors in production
 */
define('DEBUG', false);

/**
 * Configuration for: Timezone and timestamps
 * This is the place where you define your database credentials, database type etc.
 */
date_default_timezone_set('Europe/Copenhagen');
define('LOCAL_TIMESTAMP', date('Y-m-d H:i:s'));

// Private or public website
define('PRIVATE_NETWORK', false);

/**
 * Configuration for: Account activation method. If false, user can just login
 */
define('EMAIL_FROM', 'webmaster@websupport.dk');
define('EMAIL_ACTIVATION', true);

/**
 * Configuration for: Error reporting for development and production mode
 * Useful to show every little problem during development, but only show hard errors in production
 */

if (DEBUG == TRUE) {
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
} else {
    error_reporting(0);
    ini_set('display_errors', FALSE);
    ini_set('display_startup_errors', FALSE);
    //log_errors(TRUE);
}


/**
 * Configuration for: Folders
 */

define('LIBS', APP . 'libs' . DIRECTORY_SEPARATOR);
define('TEMPLATES', APP . 'views/_templates' . DIRECTORY_SEPARATOR);
define('ERRORS', APP . 'views/_templates/errors' . DIRECTORY_SEPARATOR);

define('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);
define('VIEWS', APP . 'views' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR);

/**
 * Configuration for: URL
 * Here we auto-detect your applications URL and the potential sub-folder. Works perfectly on most servers and in local
 * development environments (like WAMP, MAMP, etc.). Don't touch this unless you know what you do.
 *
 * URL_PUBLIC_FOLDER:
 * The folder that is visible to public, users will only have access to that folder so nobody can have a look into
 * "/application" or other folder inside your application or call any other .php file than index.php inside "/public".
 *
 * URL_PROTOCOL:
 * The protocol. Don't change unless you know exactly what you do.
 *
 * URL_DOMAIN:
 * The domain. Don't change unless you know exactly what you do.
 *
 * URL_SUB_FOLDER:
 * The sub-folder. Leave it like it is, even if you don't use a sub-folder (then this will be just "/").
 *
 * URL:
 * The final, auto-detected URL (build via the segments above). If you don't want to use auto-detection,
 * then replace this line with full URL (and sub-folder) and a trailing slash.
 */
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'https://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
define('ASSETS', URL . 'public' . DIRECTORY_SEPARATOR);


//SECURITY

/**
 * Configuration for: Cookie 
 * This is the place where you define your database credentials, database type etc.
 */

define('COOKIE_NAME', 'Hash');
define('COOKIE_EXPIRY', 604800);

/**
 * Configuration for: Token and sessions
 * This is the place where you define your database credentials, database type etc.
 */
define('SESSION_NAME', 'User');
define('TOKEN_NAME', 'Token');

/**
 * Configuration for: Login and register
 * This is the place where you define your database credentials, database type etc.
 */
define('LOGIN_NAME', 'Login');
define('PASSWORD_CHECK', 'Check');
define('PASSWORD_NEW', 'New');
define('USER_CODE', 'Code');

