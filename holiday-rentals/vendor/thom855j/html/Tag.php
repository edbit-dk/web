<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace thom855j\html;

class Tag
{

    public static
            function br( $input , $postion = 'around' )
    {
        switch ( $postion )
        {
            case 'around':

                echo '<br>' . $input . '<br>' ;
                break ;

            default:
                break ;
        }
    }
    
        public static
            function p( $input , $postion = 'around' )
    {
        switch ( $postion )
        {
            case 'around':

                echo '<p>' . $input . '</p>' ;
                break ;

            default:
                break ;
        }
    }
    
        public static
            function div( $input , $postion = 'around', $options = null)
    {
        switch ( $postion )
        {
            case 'around':

                echo "<div $options>" . $input . "</div>" ;
                break ;

            default:
                break ;
        }
    }

}
