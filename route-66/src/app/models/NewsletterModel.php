<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsletterModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getNewsletters() {
        $this->_db->get(array('*'), 'Newsletters', null);
        return $this->_db->results();
    }

    public function getNewsletter($ID) {
        $this->_db->get(array('*'), 'Newsletters', array('ID', '=', $ID));
        return $this->_db->results();
    }
    
    public function update($fields = array(), $ID) {
          if (!$this->_db->update('Newsletters', 'ID', $ID, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }
    
        public function create($fields) {
        if (!$this->_db->insert('Newsletters', $fields)) {
            throw new Exception('There was a problem. Please contact support.');
        }
    }
    
     public function delete($ID) {
        return $this->_db->delete('Newsletters', array('ID', '=', $ID));
    }

}
