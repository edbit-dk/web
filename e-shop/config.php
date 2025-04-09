<?php
// HTTP

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('HTTP_SERVER', 'http://portfolio.websupport.dk/cases/sde/e-shop/');

// HTTPS
define('HTTPS_SERVER', 'https://portfolio.websupport.dk/cases/sde/e-shop/');

// DIR
define('DIR_APPLICATION', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/catalog/');
define('DIR_SYSTEM', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/');
define('DIR_LANGUAGE', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/catalog/language/');
define('DIR_TEMPLATE', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/catalog/view/theme/');
define('DIR_CONFIG', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/config/');
define('DIR_IMAGE', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/image/');
define('DIR_CACHE', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/cache/');
define('DIR_DOWNLOAD', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/download/');
define('DIR_UPLOAD', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/upload/');
define('DIR_MODIFICATION', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/modification/');
define('DIR_LOGS', '/home/websuppo/public_html/portfolio.websupport.dk/cases/sde/e-shop/system/logs/');

// DB
define('DB_DRIVER', 'mpdo');
define('DB_HOSTNAME', '127.0.0.1');
define('DB_USERNAME', 'websuppo_admin');
define('DB_PASSWORD', '1992c.m.lange');
define('DB_DATABASE', 'websuppo_portfolio_eshop');
define('DB_PREFIX', '_');
