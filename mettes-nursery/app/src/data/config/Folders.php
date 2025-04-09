<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Configuration for: Folders
 */
//Custom templates for header and footer


//Classes library
define('ERROR', APP . 'views/error/');

//MVC folders
define('MODELS', DATA . 'models/');
define('VIEWS', DATA . 'views/');
define('CONTROLLERS', DATA . 'controllers/');

//App core folders
define('PUBLIC_FOLDER', ROOT . 'public' . DIRECTORY_SEPARATOR);
//Uploads
define('UPLOADS_FOLDER', PUBLIC_FOLDER . 'uploads' . DIRECTORY_SEPARATOR);
//themes
define('THEME_FOLDER', PUBLIC_FOLDER . 'themes/' . THEME . DIRECTORY_SEPARATOR);
define('TEMPLATE', PUBLIC_FOLDER . 'themes/');
//plugins
define('PLUGINS', PUBLIC_FOLDER . 'plugins'. DIRECTORY_SEPARATOR);
//cache
define('CACHE_FOLDER', PUBLIC_FOLDER . 'cache' . DIRECTORY_SEPARATOR);
//CSS
define('CSS_FOLDER', PUBLIC_FOLDER . 'css' . DIRECTORY_SEPARATOR);
//js
define('JS_FOLDER', PUBLIC_FOLDER . 'js' . DIRECTORY_SEPARATOR);
