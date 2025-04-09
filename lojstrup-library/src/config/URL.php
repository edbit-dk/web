<?php

/*
 * To change this license header, choose License Headers in Project Properties. 
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor. 
 */

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
if (SSL == 1) {
    define('URL_PROTOCOL', 'https://');
} else {
    define('URL_PROTOCOL', 'http://');
}


define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_PATH', str_replace(PATH_PROJECT_NAME, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_PATH);

define('URL_PATH_UPLOADS', URL . 'uploads' . DIRECTORY_SEPARATOR);

define('URL_PATH_THEMES', URL . 'public/themes/' . THEME . DIRECTORY_SEPARATOR);