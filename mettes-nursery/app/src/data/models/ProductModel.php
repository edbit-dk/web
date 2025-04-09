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

    public function getPopularProducts($Limit) {
        $sql = "SELECT ID, Name FROM Products ORDER BY Stock LIMIT $Limit";
        $this->_db->query($sql);
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

    public function getStock($ID) {
        $this->_db->get(array('Stock'), 'Products', array('ID', '=', $ID));
        return $this->_db->results();
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('Products', 'ID', $id, $fields);
    }

    public function getLastProductID() {
        return $this->_db->lastInsertID();
    }

}
