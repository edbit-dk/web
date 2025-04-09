<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */

// User table
define('USERS_TABLE', 'users');
define('USER_ID', 'ID');
define('USER_NAME', 'Username');
define('USER_PASSWORD', 'Password');
define('USER_EMAIL', 'Email');
define('USER_SALT', 'Salt');
define('USER_FIRSTNAME', 'Firstname');
define('USER_LASTNAME', 'Lastname');
define('USER_ROLE', 'Department_ID');
define('USER_COMPANY', 'Company_ID');

//Uploads
define('UPLOADS_TABLE', 'Uploads');

//Albums
define('ALBUMS_TABLE', 'Albums');

//Types
define('TYPES_TABLE', 'Types');

//Types
define('SIGNUPS_TABLE', 'Signups');

//News
define('NEWS_TABLE', 'News');
define('NEWS_ID', 'ID');
define('NEWS_TITLE', 'Title');
define('NEWS_CREATED', 'Created');
define('NEWS_CONTENT', 'Content');
define('NEWS_STICKY', 'Sticky');

//Events
define('EVENTS_TABLE', 'Events');
define('EVENT_ID', 'ID');

//Comments
define('COMMENTS_TABLE', 'comments');
define('COMMENT_ID', 'ID');

//Companies
define('COMPANY_TABLE', 'Companies');
define('COMPANY_CODE', 'Code');

// Roles table
define('ROLES_TABLE', 'groups');
define('ROLE_ID', 'ID');

//Roles
define('ADMIN_ROLE', 'Admin');

// Sessions table
define('SESSIONS_TABLE', 'Sessions');
define('SESSION_ID', 'ID');
define('SESSION_HASH', 'Hash');
define('SESSION_USER_ID', 'User_ID');