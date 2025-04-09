<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Configuration for: Error reporting for development and production mode
 * Useful to show every little problem during development, but only show hard errors in production
 */

if (DEBUG == TRUE) {
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
} else {
    error_reporting(0);
    ini_set('display_errors', FALSE);
    ini_set('display_startup_errors', FALSE);
    //log_errors(TRUE);
}