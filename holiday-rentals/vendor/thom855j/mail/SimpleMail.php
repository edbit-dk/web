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

class SimpleMail
{

    public
            $Header ,
            $From ,
            $Address ,
            $Subject ,
            $Body ;

    public
            function addAddress( $email )
    {
        $this->Address = $email ;
    }

    public
            function subject( $subject )
    {
        $this->Subject = $subject ;
    }

    public
            function body( $template )
    {
        $this->Body = $template ;
    }

    public
            function send()
    {
        $this->Header = "From: $this->From \r\n" ;
        $this->Header .= "Content-Type: text/html; charset=UTF-8\r\n" ;
        $this->Header .= "Reply-To: $this->From \r\n" ;

        mail( $this->Address , $this->Subject , $this->Body , $this->Header ) ;
    }

}
