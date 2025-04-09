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

use thom855j\mvc\Controller,
    thom855j\sql\DB,
    thom855j\security\Auth,
    thom855j\http\Router;

class DefaultController extends Controller
{

    public
            $url;

    /**
     * Construct this object by extending the base Controller class
     */
    public
            function __construct()
    {
        parent::__construct();
        $this->url = Router::getProjectUrl();
    }

    public
            function index()
    {
        $data['project_url'] = $this->url;
        $this->View->render(array(
            PATH_APP_VIEWS . 'frontend/shu/assets/inc/_header',
                 PATH_APP_VIEWS . 'frontend/shu/assets/inc/_nav',
            PATH_APP_VIEWS . 'frontend/shu/home',
            PATH_APP_VIEWS . 'frontend/shu/assets/inc/_footer'
                ), $data);
    }

}
