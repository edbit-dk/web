<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('SSL', false);
define('THEME', false);
require_once('../../src/data/config/URL.php');
require_once('../../src/data/libs/Model.php');
require_once('../../src/data/libs/helpers/Redirect.php');
require_once('../../src/data/libs/helpers/Session.php');

$url = filter_var(rtrim($_GET['step'], '/'), FILTER_SANITIZE_URL);

if (file_exists('steps/' . $url . '.php') && !empty($url)) {
    require_once 'steps/' . $url . '.php';
} else {
    require_once 'steps/welcome.php';
}