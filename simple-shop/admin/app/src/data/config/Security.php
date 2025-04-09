<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//SECURITY

define('TOKEN_NAME', 'Token');

//Randoms
define('RANDOM_NAME', md5(mt_srand() . microtime()));