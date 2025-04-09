<?php 

/* 
 * To change this license header, choose License Headers in Project Properties. 
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor. 
 */ 

/** 
 * Configuration for: Paths
 */ 


// languages
define('PATH_LANGUAGES',PATH_SRC . 'languages'. DIRECTORY_SEPARATOR);

// public folder
define('PATH_PUBLIC', PATH_ROOT . 'public' . DIRECTORY_SEPARATOR); 

// cache folder
define('PATH_CACHE', PATH_PUBLIC . 'cache' . DIRECTORY_SEPARATOR); 


// themes folder
define('THEME', 'Standard'); 
define('PATH_THEMES', PATH_PUBLIC . 'themes'. DIRECTORY_SEPARATOR); 
define('PATH_THEME', PATH_PUBLIC . 'themes/' . THEME . DIRECTORY_SEPARATOR); 

// plugins folder
define('PATH_PLUGINS', PATH_PUBLIC . 'plugins'. DIRECTORY_SEPARATOR); 

