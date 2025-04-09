<?php

/*
 * Env setup
 */
define('DEBUG', false);
define('ENV', 'remote');

/*
 * App setup
 */
define('LOCALE', 'da_DK');
define('THEME', 'app');
define('TOKEN', 'H4qRRbMkUpgvw==');

/*
 * Set db config
 */
if (ENV == 'local')
{
    define('DB_TYPE', 'mysql');
    define('DB_HOST', '127.0.0.1');
    define('DB_PREFIX', "");
    define('DB_NAME', 'websuppo_portfolio_happy_house');
    define('DB_USER', 'websuppo_admin');
    define('DB_PASS', '1992c.m.lange');
}
elseif (ENV == 'remote')
{
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'mysql41.unoeuro.com');
    define('DB_PREFIX', '');
    define('DB_NAME', 'websupport_dk_db2');
    define('DB_USER', 'websupport_dk');
    define('DB_PASS', 'myxgnhfp');
}
