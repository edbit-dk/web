<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Configuration for: Timezone and timestamps
 * This is the place where you define your database credentials, database type etc.
 */
if(TIMEZONE == 'DK') {
date_default_timezone_set('Europe/Copenhagen');
define('LOCAL_TIMESTAMP', date('d-m-Y H:i:s'));
}

if(TIMEZONE == 'EN') {
date_default_timezone_set('America/New_York');
define('LOCAL_TIMESTAMP', date('Y-m-d H:i:s'));
}