<?php

class CategoryModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all categories
    public function getCategories() {
        $this->_db->get(array('*'), 'Categories', null);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert('Categories', $fields);
    }

    public function getLastCategoryID() {
        return $this->_db->lastInsertID();
    }

}
