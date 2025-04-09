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

use thom855j\mvc\Controller ,
    thom855j\http\Redirect ,
    thom855j\filesystem\Session ,
    thom855j\filesystem\Cookie ,
    thom855j\security\Auth ,
    thom855j\security\Validater ,
    thom855j\sql\DB ;

class AuthController extends Controller
{

    /**
     * Construct this object by extending the basic Controller class
     */
    public
            function __construct()
    {
        parent::__construct() ;
    }

    /**
     * Handles what happens when user moves to URL/default/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public
            function index()
    {

        Redirect::to( URL . 'auth/login' ) ;
    }

    public
            function login()
    {
        if ( Auth::load( DB::load() )->checkCookie() || Auth::load( DB::load() )->checkLogin() )
        {
            Redirect::to( URL ) ;
        }
        //phpinfo();
        $this->View->render( array(
            PATH_ADMIN_VIEWS . 'auth/assets/inc/_header' ,
            PATH_ADMIN_VIEWS . 'auth/login' ,
            PATH_ADMIN_VIEWS . 'auth/assets/inc/_footer' ,
        ) ) ;
    }

    public
            function register()
    {
        $this->View->render( array(
            PATH_ADMIN_VIEWS . 'auth/assets/inc/header' ,
            PATH_ADMIN_VIEWS . 'auth/register' ,
            PATH_ADMIN_VIEWS . 'auth/assets/inc/footer' ,
        ) ) ;
    }

    public
            function verify()
    {
        if ( Input::exists() )
        {
            $remember = (Input::get( 'remember-me' ) === 'on') ? true : false ;
            $login    = Auth::load( DB::load() )->login( Input::get( 'username' ) ,
                                                                     Input::get( 'password' ) ,
                                                                                 $remember ) ;
            if ( $login )
            {
                Session::set( 'SUCCESS' , i18n::get( 'SYSTEM_LOGIN' , 'system' ) ) ;
                Redirect::to( URL ) ;
            }
            else
            {
                Session::set( 'ERRORS' ,
                              i18n::get( 'SYSTEM_LOGIN_ERROR' , 'system' ) ) ;
                Redirect::to( URL . 'auth/login' ) ;
            }
        }
    }

    public
            function create()
    {
        if ( Input::exists() )
        {
            $validate   = Validater::load( DB::load() ) ;
            $validation = $validate->check( $_POST ,
                                            array(
                'Username'    => array(
                    'required' => true ,
                    'min'      => 1 ,
                    'max'      => 32 ,
                    'notTaken' => 'Users'
                ) ,
                'Adgangskode' => array(
                    'required'  => true ,
                    'min'       => 1 ,
                    'max'       => 32 ,
                    'validPass' => Input::get( 'Adgangskode' )
                ) ) ) ;

            if ( $validation->passed() )
            {
                UsersModel::load( Database::load() )->create( array(
                    'Timestamp' => time() ,
                    'Username'  => Input::get( 'Username' ) ,
                    'Password'  => Password::hash( Input::get( 'Adgangskode' ) )
                ) ) ;
            }
            else
            {
                Session::set( 'ERRORS' , 'Login failed.' ) ;
                Redirect::to( URL . 'auth/register' ) ;
            }
        }
    }

    public
            function logout()
    {
        Auth::load( DB::load() )->logout() ;
        Session::set( 'SUCCESS' , i18n::get( 'SYSTEM_LOGOUT' , 'system' ) ) ;
        Redirect::to( URL . 'auth/login' ) ;
    }

}
