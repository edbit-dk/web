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
 * Description of ParticipantModel
 *
 * @author ThomasElvin
 */
class ParticipantModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getParticipant($ID) {
        $this->_db->get(array('*'), 'Participants', array('ID', '=', $ID));
        return $this->_db->results();
    }

    public function getParticipants() {
        $sql = "SELECT Participants.*, Questions.Question
                FROM Participants
                LEFT JOIN Questions ON Participants.Question_ID = Questions.ID
                GROUP BY Participants.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
        public function getCorrectRandomParticipant() {
        $sql = "SELECT Participants.*
                FROM Participants, Winners
                WHERE Participants.Correct_answer = 1
                AND Participants.ID != Winners.Participant_ID
                ORDER BY RAND()
                LIMIT 3";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getCorrectParticipantAnswers() {
        $this->_db->get(array('*'), 'Participants', array('Correct_answer', '=', 1));
        return $this->_db->results();
    }

    //Create participant
    public function create($fields) {
        if (!$this->_db->insert('Participants', $fields)) {
            throw new Exception('There was a problem. Please contact support.');
        }
    }

    public function delete($ID) {
        return $this->_db->delete('Participants', array('ID', '=', $ID));
    }

}
