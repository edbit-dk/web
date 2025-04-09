<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */

// User table
define('USERS_TABLE', 'Users');
define('USER_ID', 'ID');
define('USER_USERNAME', 'Username');
define('USER_PASSWORD', 'Password');
define('USER_EMAIL', 'Email');
define('USER_FIRSTNAME', 'Firstname');
define('USER_LASTNAME', 'Lastname');
define('USER_ROLE', 'Role_ID');
define('USER_ADDRESS', 'Address');
define('USER_ZIPCODE', 'Zipcode');
define('USER_PHONE', 'Phone');

// Roles table
define('ROLES_TABLE', 'Roles');
define('ROLE_ID', 'ID');
define('ROLE_NAME', 'Role');

// Sessions table
define('SESSIONS_TABLE', 'Sessions');
define('SESSION_ID', 'ID');
define('SESSION_HASH', 'Hash');
define('SESSION_USER_ID', 'User_ID');

// Images table 
define('IMAGES_TABLE', 'Images'); 
define('IMAGE_ID', 'ID'); 
define('IMAGE_DATE', 'Date'); 
define('IMAGE_FK_ID', 'Product_ID'); 
define('IMAGE_URL', 'Url'); 
define('IMAGE_ORIGINAL', 'Original'); 