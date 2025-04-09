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
require_once 'vendor/autoload.php' ;

$mailer = new PHPMailer() ;

$mailer->Host       = 'smtp.gmail.com' ;
$mailer->SMTPAuth   = true ;
$mailer->SMTPSecure = 'tls' ;
$mailer->Port       = 587 ;
$mailer->Username   = 'test@mail.com' ;
$mailer->Password   = 'password' ;
$mailer->From       = 'test@mail.com' ;
$mailer->isHTML( true ) ;

$mail = new thom855j\mail\MailWrapper( $mailer ) ;

$template = 'views/mail_welcome.php' ;
$data     = array( 'Name' => 'Test' ) ;
$callback = function($message)
{
    $message->to( 'mail@email.com' ) ;
    $message->subject( 'Test mail' ) ;
} ;
$mail->send( $template , $data , $callback ) ;
