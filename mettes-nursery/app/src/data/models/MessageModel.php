<?php

class MessageModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()) {
        return $this->_db->insert('Messages', $fields);
    }

}
