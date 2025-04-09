<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace thom855j\multilingual;

class i18n
{

    private static
            $locale , $texts , $storage ;

    public static
            function set( $locale )
    {

        self::$locale = $locale ;
    }

    public static
            function register( $path , $token )
    {

        self::$storage[ $token ] = $path ;
    }

    public static
            function get( $key , $token )
    {
        // if not $key
        if ( !$key )
        {
            return null ;
        }
        // load config file (this is only done once per application lifecycle)


        self::$texts[ $token ] = require(self::$storage[ $token ] . '/' . substr( self::$locale ,
                                                                                  0 ,
                                                                                  -3 ) . '/' . substr( self::$locale ,
                                                                                                       -2
                ) . '.php') ;

        // check if array key exists
        if ( !array_key_exists( $key , self::$texts[ $token ] ) )
        {
            return null ;
        }
        return self::$texts[ $token ][ $key ] ;
    }

    public static
            function output( $key , $token )
    {
        // if not $key
        if ( !$key )
        {
            return null ;
        }
        // load config file (this is only done once per application lifecycle)


        self::$texts[ $token ] = require(self::$storage[ $token ] . '/' . substr( self::$locale ,
                                                                                  0 ,
                                                                                  -3 ) . '/' . substr( self::$locale ,
                                                                                                       -2
                ) . '.php') ;

        // check if array key exists
        if ( !array_key_exists( $key , self::$texts[ $token ] ) )
        {
            return null ;
        }
        echo self::$texts[ $token ][ $key ] ;
    }

}
