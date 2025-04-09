<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */
define('DB_PREFIX', 'simpleshop_');

// User table
define('USERS_TABLE', DB_PREFIX . 'users');
define('USER_ID', 'ID');
define('USER_USERNAME', 'username');
define('USER_PASSWORD', 'password');
define('USER_EMAIL', 'email');
define('USER_FIRSTNAME', 'firstname');
define('USER_LASTNAME', 'lastname');
define('USER_ROLE', 'role_id');
define('USER_ADDRESS', 'address');
define('USER_ZIPCODE', 'zipcode');
define('USER_PHONE', 'phone');

// Roles table
define('ROLES_TABLE', DB_PREFIX . 'roles');
define('ROLE_ID', 'ID');
define('ROLE_NAME', 'role');

// Sessions table
define('SESSIONS_TABLE', DB_PREFIX . 'sessions');
define('SESSION_ID', 'ID');
define('SESSION_HASH', 'hash');
define('SESSION_USER_ID', 'user_id');

// Images table 
define('IMAGES_TABLE', DB_PREFIX . 'product_images'); 
define('IMAGE_ID', 'ID'); 
define('IMAGE_DATE', 'date'); 
define('IMAGE_FK_ID', 'product_id'); 
define('IMAGE_URL', 'Url'); 
define('IMAGE_ORIGINAL', 'Original'); 