<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Register
{

   private static
            $_navs ,
            $_autoload ;

    public static
            function autoload( $path )
    {
        static $data     = array() ;
        array_push( $data , $path ) ;
        self::$_autoload = $data ;
    }


    public static
            function nav( $nav )
    {
        static $data = array() ;
        array_push( $data , $nav ) ;
        self::$_navs = $data ;
    }


    public static
            function admin( $case )
    {
        switch ( $case )
        {
            case 'nav':
                $menus = self::$_navs ;
                foreach ( $menus as $data )
                {
                    foreach ( $data as $value )
                    {
                        echo $value ;
                    }
                }

                break ;

            default:
                break ;
        }
    }

}
