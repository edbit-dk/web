<?php

/*
 * Copyright (C) 2015 thom855j
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

class RatingController extends Controller
{

    /**
     * Construct this object by extending the basic Controller class
     */
    public
            function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/default/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public
            function index()
    {
        Redirect::to(URL);
    }

    public
            function create()
    {
        If (Input::exists())
        {
            $result = RatingsModel::load(Database::load())->create(array(
                'Rating'  => Input::get('Rating'),
                'IP'      => Input::get('IP'),
                'Book_ID' => Input::get('ID')
                    ), Input::get('ID'), Input::get('IP'));
            if (!$result)
            {
                Session::set('INFO', 'Du har allerede stemt.');
            }else {
                  Session::set('SUCCESS', 'Tak for din stemme!');
            }
            Redirect::to(URL . 'bog/id/' . Input::get('ID'));
        }
    }

}
