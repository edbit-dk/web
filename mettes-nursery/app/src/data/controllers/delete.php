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

class Delete extends Controller {

    public function item($key) {
        Session::deletekey('products', $key);
        Cache::clear();
        Redirect::to(URL . 'butikken/kassen');
    }

    public function cart() {
        if (Session::exists('products') && !Session::exists('order')) {
            Session::delete('products');
            Cache::clear();
            Redirect::to(URL . 'butikken');
        } elseif (Session::exists('order') && !Session::exists('products')) {
            Session::delete('order');
            Cache::clear();
            Redirect::to(URL . 'butikken');
        } elseif (Session::exists('order') && Session::exists('products')) {
            Session::delete('order');
            Session::delete('products');
            Cache::clear();
            Redirect::to(URL . 'butikken');
        } else {
            Cache::clear();
            Redirect::to(URL . 'butikken');
        }
    }

}
