<?php

/**
 * Database Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */

/**
 * Configuration for: Development og production mode
 * Useful to show every little problem during development, but only show hard errors in production
 */
// Main setup settings
error_reporting(E_ALL);
ini_set('display_errors', 1);

$_prefix = 'simpleshop';

define('DB_TYPE', 'mysql');
define('DB_HOST', 'mysql17.unoeuro.com');
define('DB_NAME', 'datalaere_dk_db_data');
define('DB_USER', 'datalaere_dk');
define('DB_PASS', 'p95rth2z');




