<?php

/*
 * Copyright (C) 2015 thoma
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use thom855j\mvc\Controller ;
use thom855j\http\Router ;

class AdminController extends Controller
{

    public
            $url ;

    public
            function __construct()
    {
        parent::__construct() ;
        $this->url = Router::getProjectUrl() ;
    }

    public
            function index()
    {
        $data[ 'project_url' ] = $this->url ;
        $this->View->render( array(
            PATH_APP_VIEWS . 'backend/admin/assets/inc/_header' ,
            PATH_APP_VIEWS . 'backend/admin/assets/inc/_sidebar' ,
            PATH_APP_VIEWS . 'backend/admin/index' ,
            PATH_APP_VIEWS . 'backend/admin/assets/inc/_footer' ,
                ) , $data ) ;
    }

    public
            function read( $controller , $type , $method , $start = null ,
                           $end = null , $max = null )
    {
        $class                = ucfirst( $controller ) . 'Controller' ;
        require_once(PATH_APP_CONTROLLERS . $class . '.php') ;
        $app                  = new $class ;
        $data[ 'results' ]    = $app->$method( $type , $start , $end , $max ) ;
        $data[ 'controller' ] = $controller ;
        $data[ 'type' ]       = $type ;
    
        $this->View->render( array(
            PATH_APP_VIEWS . 'admin/assets/inc/_header' ,
            PATH_APP_VIEWS . 'admin/assets/inc/_sidebar' ,
            PATH_APP_VIEWS . $controller . '/' . $method ,
            PATH_APP_VIEWS . 'admin/assets/inc/_footer'
                ), $data 
        ) ;
    }

    public
            function crate()
    {
        
    }

    public
            function update()
    {
        
    }

    public
            function delete()
    {
        
    }

}
