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
 * Description of WinnerModel
 *
 * @author ThomasElvin
 */
class WinnerModel {
    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

   public function getWinner($ID) {
        $this->_db->get(array('*'), 'Winners', array('ID', '=', $ID));
        return $this->_db->results();
    }
    
    public function getWinners() {
   $sql = "SELECT Winners.ID, Winners.Date, Winners.Participant_ID AS Participant_ID,
           Participants.Name, Participants.Email, 
           Questions.Question, Prices.Name As Price
           FROM Winners
           LEFT JOIN Participants ON Winners.Participant_ID = Participants.ID
           LEFT JOIN Questions ON Winners.Question_ID = Questions.ID
           LEFT JOIN Prices on Winners.Price_ID = Prices.ID
           GROUP BY Winners.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
      public function create($fields = array()) {
        return $this->_db->insert('Winners', $fields);
    }
    
      public function delete($ID) {
        return $this->_db->delete('Winners', array('Participant_ID', '=', $ID));
    }

}
