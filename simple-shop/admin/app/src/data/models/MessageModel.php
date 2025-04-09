<?php

class MessageModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getMessages() {
        $this->_db->get(array('*'), 'Messages', null);
        return $this->_db->results();
    }

    public function delete($ID) {
        return $this->_db->delete('Messages', array('ID', '=', $ID));
    }

}
