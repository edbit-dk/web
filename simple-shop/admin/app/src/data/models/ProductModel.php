<?php

class ProductModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getProducts() {
        $this->_db->get(array('*'), 'Products', null);
        return $this->_db->results();
    }

    public function getProductsByCategoryID($ID) {
        $this->_db->get(array('*'), 'Products', array('Category_ID', '=', $ID));
        return $this->_db->results();
    }

    public function getProduct($ID) {
        $this->_db->get(array('*'), 'Products', array('ID', '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert('Products', $fields);
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('Products', 'id', $id, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete('Products', array('ID', '=', $ID));
    }

}
