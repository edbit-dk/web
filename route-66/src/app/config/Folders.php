<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Configuration for: Folders
 */

//Global headers and footers
define('GLOBAL_HEADER', APP . 'views/_templates/global/');
define('GLOBAL_FOOTER', APP . 'views/_templates/global/');

// frontend
define('FRONTEND_HEADER', APP . 'views/_templates/frontend/header.php');
define('FRONTEND_TEMPLATE', APP . 'views/_templates/frontend'. DIRECTORY_SEPARATOR);
define('FRONTEND_FOOTER', APP . 'views/_templates/frontend/footer.php');

// backend
define('BACKEND_HEADER', APP . 'views/_templates/backend/header.php');
define('BACKEND_TEMPLATE', APP . 'views/_templates/backend'. DIRECTORY_SEPARATOR);
define('BACKEND_FOOTER', APP . 'views/_templates/backend/footer.php');


//Custom templates for header and footer
define('TEMPLATES', APP . 'views/_templates' . DIRECTORY_SEPARATOR);

//Classes library
define('LIBS', APP . 'libs' . DIRECTORY_SEPARATOR);
define('ERROR', APP . 'views/error' . DIRECTORY_SEPARATOR);

//MVC folders
define('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);
define('VIEWS', APP . 'views' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR);

//App core folders
define('PUBLIC_FOLDER', ROOT . 'public' . DIRECTORY_SEPARATOR);
//Uploads
define('UPLOADS_FOLDER', PUBLIC_FOLDER . 'uploads' . DIRECTORY_SEPARATOR);
//cache
define('CACHE_FOLDER', PUBLIC_FOLDER . 'cache' . DIRECTORY_SEPARATOR);
//CSS
define('CSS_FOLDER', PUBLIC_FOLDER . 'css' . DIRECTORY_SEPARATOR);
//js
define('JS_FOLDER', PUBLIC_FOLDER . 'js' . DIRECTORY_SEPARATOR);
