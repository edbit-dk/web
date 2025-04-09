<?php

class StatusModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all categories
    public function getStatusOptions() {
        $this->_db->get(array('*'), DB_PREFIX . 'status', null);
        return $this->_db->results();
    }

}
