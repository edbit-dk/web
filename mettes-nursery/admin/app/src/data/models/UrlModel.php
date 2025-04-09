<?php

class UrlModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function create($name) {
        $ID = $this->_db->lastInsertID();
        $data = array(
            'Page_ID' => $ID,
            'Name' => $name
        );
        return $this->_db->insert('Urls', $data);
    }

}
