<?php

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
        Redirect::to( URL ) ;
    }

    public
            function login()
    {
        $this->View->render( array(
            PATH_TEMPLATES . 'auth/header' ,
            PATH_VIEWS . 'auth/login' ,
            PATH_TEMPLATES . 'auth/footer' ,
        ) ) ;
    }

    public
            function register()
    {
        $this->View->render( array(
            PATH_TEMPLATES . 'auth/header' ,
            PATH_VIEWS . 'auth/register' ,
            PATH_TEMPLATES . 'auth/footer' ,
        ) ) ;
    }

    public
            function verify()
    {
        if ( Input::exists() )
        {
            $remember = (Input::get( 'remember-me' ) === 'on') ? true : false ;
            $login    = Auth::load( Database::load() )->login( Input::get( 'Brugernavn' ) ,
                                                                           Input::get( 'Adgangskode' ) ,
                                                                                       $remember ) ;
            if ( $login )
            {
                Session::set( 'FEEDBACK' , 'Login successful.' ) ;
                Redirect::to( URL . 'admin' ) ;
            }
            else
            {
                Session::set( 'ERRORS' , 'Login failed.' ) ;
                Redirect::to( URL . 'auth/login' ) ;
            }
        }
    }

    public
            function create()
    {
        if ( Input::exists() )
        {
            $validate   = Validate::load( Database::load() ) ;
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
        Auth::load( Database::load() )->logout() ;
        Session::set( 'FEEDBACK' , 'Logout successful.' ) ;
        Redirect::to( URL . 'auth/login' ) ;
    }

}
