<?php

/**
 * MVC CMS - an extremely simple naked PHP, MVC, CMS application
 *
 * @package mvc-cms
 * @author thom855j, with inspiration form panique/mini and CodeCourse
 * @link https://github.com/thom855j/mvc-cms/
 * @license http://opensource.org/licenses/MIT MIT License
 */
// boostrap app
require_once 'app/bootstrap.php' ;

// start the application routing by defining query string "url" 
// and absolute path to app controllers.
// We also load the database, to be able to use it just as DB::load()
use thom855j\http\Router;
//    thom855j\sql\DB ;
//
//DB::load( DB_TYPE , DB_HOST , DB_NAME , DB_USER , DB_PASS ) ;
//DB::load()->query('SELECT * FROM Options');
//foreach ( DB::load()->results() as $option )
//{
//    define($option->Name,$option->Value);
//}
$app = new Router( 'url' , PATH_APP_CONTROLLERS ) ;
var_dump( $app ) ;
