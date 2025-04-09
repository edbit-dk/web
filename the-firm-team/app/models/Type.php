<?php

class Type {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getTypes() {
        $this->_db->get(array('*'), TYPES_TABLE, null);
        return $this->_db->results();
    }

}
