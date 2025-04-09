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


if (DEBUG == true) { 
    error_reporting(E_ALL); 
    ini_set('display_errors', true); 
    ini_set('display_startup_errors', true); 
    ini_set('log_errors','On'); // enable or disable php error logging (use 'On' or 'Off')
    ini_set('error_log', PATH_LOGS . 'php-error.log'); // path to server-writable log file
} else { 
    error_reporting(0); 
    ini_set('display_errors', false); 
    ini_set('display_startup_errors', false); 
    ini_set('log_errors',false);
}