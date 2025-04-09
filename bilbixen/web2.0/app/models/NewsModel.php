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

class NewsModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    /**
     * Add message to database
     */
    public function create($fields = array()) {
        return $this->_db->insert('departments', $fields);
    }

    public function getNews() {
        $this->_db->get(array('*'), 'news LIMIT 3', null);
        return $this->_db->results();
    }

    /**
     * Delete message from database
     */
    public function delete($ID) {
        if (!$this->_db->delete('departments', array('id', '=', $ID))) {
            throw new Exception('There was a problem deleting.');
        }
    }

}
