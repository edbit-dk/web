<?php
namespace thom855j\http;

class Output
{

    public static
            function decode( $string )
    {
        return html_entity_decode( $string ) ;
    }

    public static
            function convert( $size )
    {
        $unit = array( 'b' , 'kb' , 'mb' , 'gb' , 'tb' , 'pb' ) ;
        return round( $size / pow( 1024 , ($i    = floor( log( $size , 1024 ) ) ) ) ,
                                                               2 ) . ' ' . $unit[ $i ] ;
    }

    public static
            function recursive( $parent , $array , $slug= null,$class_a =null, $class_ul = null, $class_li= null )
    {
        $has_children = false ;
        foreach ( $array as $key => $value )
        {
            if ( $value->Parent_ID == $parent )
            {
                if ( $has_children === false && $parent )
                {
                    $has_children = true ;
                    echo "<ul class='$class_ul'>" . "\n" ;
                }
                echo "<li class='$class_li'>" . "\n" ;
                echo "<a class='$class_a' href='" . $slug . $value->Slug . "'>" . $value->Label . "</a>" . " \n" ;
                echo "\n" ;
                Output::recursive( $key + 1 , $array ) ;
                echo "</li>\n" ;
            }
        }
        if ( $has_children === true && $parent ) echo "</ul>\n" ;
    }
    
    public static function bootstrap_multi_nav($parent , $array , $slug= null){
        $has_children = false ;
        foreach ( $array as $key => $value )
        {
            if ( $value->Parent_ID == $parent )
            {
                if ( $has_children === false && $parent )
                {
                    $has_children = true ;
                    echo "<li class='dropdown-submenu'>";
                    echo "<a tabindex='-1' href='#'>" . $value->Label . "</a>";
                    echo "<ul class='dropdown-menu'>" . "\n" ;
                }
                echo "<li>" . "\n" ;
                echo "<a href='" . $slug . $value->Slug . "'>" . $value->Label . "</a>" . " \n" ;
                echo "\n" ;
                Output::bootstrap_multi_nav( $key + 1 , $array ) ;
                echo "</li></li>\n" ;
            }
        }
        if ( $has_children === true && $parent ) echo "</ul>\n" ;
    }

    public static
            function truncate( $input , $maxWords , $maxChars )
    {
        $words = preg_split( '/\s+/' , $input ) ;
        $words = array_slice( $words , 0 , $maxWords ) ;
        $words = array_reverse( $words ) ;

        $chars     = 0 ;
        $truncated = array() ;

        while ( count( $words ) > 0 )
        {
            $fragment = trim( array_pop( $words ) ) ;
            $chars += strlen( $fragment ) ;

            if ( $chars > $maxChars ) break ;

            $truncated[] = $fragment ;
        }

        $result = implode( $truncated , ' ' ) ;

        return $result . ($input == $result ? '' : '') ;
    }

}
