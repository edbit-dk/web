<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */

// User table
define('USERS_TABLE', 'Users');
define('USER_ID', 'Users_id');
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
define('ROLES_TABLE', 'Roles');
define('ROLE_ID', 'Roles_id');
define('ROLE_NAME', 'role');

// Comments table
define('COMMENTS_TABLE', 'Comments');
define('COMMENT_ID', 'Comments_id');
define('COMMENT_FK_ID', 'auction_id');
define('COMMENT_USER_ID', 'user_id');
define('COMMENT_AUCTION_ID', 'auction_id');

// Auctions table
define('AUCTIONS_TABLE', 'Auctions');
define('AUCTION_ID', 'Auctions_id');
define('AUCTION_TITLE', 'title');
define('END_DATE', 'end_date');
define('END_TIME', 'end_time');
define('AUCTION_DESCRIPTION', 'description');
define('START_PRICE', 'start_price');
define('BUY_PRICE', 'buy_price');
define('AUCTION_USER_ID', 'user_id');

// Images table
define('IMAGES_TABLE', 'Images');
define('IMAGE_ID', 'Images_id');
define('IMAGE_AUCTION_ID', 'auction_id');
define('IMAGE_DATE', 'date');
define('IMAGE_FK_ID', 'auction_id');
define('IMAGE_USER_ID', 'user_id');
define('IMAGE_URL', 'url');
define('IMAGE_ORIGINAL', 'original_name');

// Categories table
define('CATEGORIES_TABLE', 'Categories');
define('CATEGORIES_ID', 'Categories_id');

// Bids table
define('BIDS_TABLE', 'Bids');
define('BID_ID', 'Bids_id');
define('BID_USER_ID', 'user_id');
define('BID_FK_ID', 'auction_id');

// Purchaeses table
define('PURCHASES_TABLE', 'Purchases');
define('PURCHASE_ID', 'Purchases_id');
define('PURCHASE_USER_ID', 'user_id');
define('PURCHASE_AUCTION_ID', 'auction_id');

// Sessions table
define('SESSIONS_TABLE', 'Sessions');
define('SESSION_ID', 'Sessions_id');
define('SESSION_HASH', 'hash');
define('SESSION_USER_ID', 'user_id');

