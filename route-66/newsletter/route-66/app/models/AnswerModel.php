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
 * Description of AnswerModel
 *
 * @author ThomasElvin
 */
class AnswerModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getAnswer($ID) {
        $this->_db->get(array('*'), 'Answers', array('ID', '=', $ID));
        return $this->_db->results();
    }

    public function getCorrectAnswer($Question_ID) {
        $sql = "SELECT
                  ID
                  FROM Answers
                  WHERE Correct_answer = 1
                  AND Question_ID = $Question_ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAnswers() {
        $sql = "SELECT Answers.*, Questions.Question
                FROM Answers
                LEFT JOIN Questions ON Answers.Question_ID = Questions.ID
                GROUP BY Answers.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAnswersToQuestion($ID) {
        $this->_db->get(array('*'), 'Answers', array('Question_ID', '=', $ID));
        return $this->_db->results();
    }

    public function getQuestionAnswers($ID) {
        $this->_db->get(array('*'), 'Answers', array('Question_ID', '=', $ID));
        return $this->_db->results();
    }
    
       //Create participant
    public function create($fields) {
        if (!$this->_db->insert('Answers', $fields)) {
            throw new Exception('There was a problem. Please contact support.');
        }
    }

}
