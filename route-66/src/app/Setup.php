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

// Main setup settings

define('DATABASE', 'main');

define('DEBUG', false);

define('SSL', true);
//Remember to chance in .htaccess

define('CACHE', false);
//Remember to chance in .htaccess

define('UPLOADS', false);

define('FEEDBACK_MESSAGES', true);

define('TIMEZONE', 'EUROPE');

define('EMAIL_FROM', 'info@route66.dk');



