<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryModel
 *
 * @author ThomasElvin
 */
class CategoryModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

      public function getCategories() {
        $this->_db->get(array('*'), CATEGORIES_TABLE, null);
        return $this->_db->results();
    }
    
    public function getAllCategories() {
        $this->_db->get(array('*'), 'Auction_categories', null);
        return $this->_db->results();
    }
    
      public function getCategory($ID) {
        $this->_db->get(array('*'), CATEGORIES_TABLE, array(CATEGORIES_ID, '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(CATEGORIES_TABLE, $fields);
    }

}
