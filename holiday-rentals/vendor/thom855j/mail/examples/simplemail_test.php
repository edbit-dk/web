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
error_reporting( E_ALL ) ;
ini_set( 'display_errors' , true ) ;
ini_set( 'display_startup_errors' , true ) ;

$path_vendor = '../../../../vendor/' ;
if ( file_exists( $path_vendor . 'autoload.php' ) )
{
    require_once $path_vendor . 'autoload.php' ;
}
else
{
    require_once $path_vendor . 'thom855j/mail/SimpleMail.php' ;
    require_once $path_vendor . 'thom855j/mail/MailWrapper.php' ;
       require_once $path_vendor . 'thom855j/mail/Message.php' ;
}

use thom855j\mail\SimpleMail ;
use thom855j\mail\MailWrapper ;

$mailer = new SimpleMail() ;

$mailer->From = 'test@sde.dk' ;

$mail = new MailWrapper( $mailer ) ;

$template = 'test_mail.php' ;

$data     = array( 
    'from' => $mailer->From, 
    'username' => 'test@mail.com', 
    'password' => '243SDF3',
    'login' => 'http://sde.websupport.dk') ;

$callback = function($message)
{
    $message->to( 'sde.thom855j@gmail.com' ) ;
    $message->subject( 'Test mail' ) ;
} ;

$mail->send( $template , $data , $callback ) ;
