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

define('DATABASE', 'wsdk');

define('DEBUG', false);

define('SSL', true);
//Remember to chance in .htaccess

define('CACHE', true);
//Remember to chance in .htaccess

define('UPLOADS', true);

define('FEEDBACK_MESSAGES', true);

define('TIMEZONE', 'DK');

define('EMAIL_FROM', 'webmaster@websupport.dk');




