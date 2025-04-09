<?php

class ContactModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    /**
     * Add message to database
     */
    public function create($fields = array()) {
        return $this->_db->insert('messages', $fields);
    }

    public function getMessages() {
        $this->_db->get(array('*'), 'messages', null);
        return $this->_db->results();
    }

    /**
     * Delete message from database
     */
    public function delete($ID) {
        if (!$this->_db->delete('messages', array('message_id', '=', $ID))) {
            throw new Exception('There was a problem deleting.');
        }
    }

}
