<?php

/*
 * Copyright (C) 2015 ThomasElvin
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

/**
 * Description of QuestionModel
 *
 * @author ThomasElvin
 */
class QuestionModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getQuestion($ID) {
        $sql = "SELECT ID, Question, End_date
                FROM Questions
                WHERE ID = $ID
                ORDER BY ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getQuestionID($ID) {
        $sql = "SELECT
                   ID
                   FROM Questions
                   WHERE ID = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getQuestions() {
        $this->_db->get(array('*'), 'Questions', null);
        return $this->_db->results();
    }

    public function lastID() {
        return $this->_db->lastInsertID();
    }

    //Create participant
    public function create($fields) {
        if (!$this->_db->insert('Questions', $fields)) {
            throw new Exception('There was a problem. Please contact support.');
        }
    }

}
