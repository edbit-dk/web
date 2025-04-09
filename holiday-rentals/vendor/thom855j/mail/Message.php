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

namespace thom855j\mail ;

class Message
{

    protected
            $mailer ;

    public
            function __construct( $mailer )
    {
        $this->mailer = $mailer ;
    }

    public
            function to( $address )
    {
        $this->mailer->addAddress( $address ) ;
    }

    public
            function subject( $subject )
    {
        $this->mailer->Subject = $subject ;
    }

    public
            function body( $body )
    {
        $this->mailer->Body = $body ;
    }

}
