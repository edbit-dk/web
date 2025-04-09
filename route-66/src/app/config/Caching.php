<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('CACHE_TIME', '60');

define('CACHE_EXT', 'html');

define('CACHE_IGNORE', serialize(array(
    'Setup.php'
)));

if (CACHE == false) {
    define('CACHE_EMPTY', true);
} else {
    define('CACHE_EMPTY', false);
}

