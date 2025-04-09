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
        $this->_db->get(array('*'), 'categories', null);
        return $this->_db->results();
    }
    
//    public function getCategories() {
//        $sql = "SELECT cat_id, cat_name FROM categories ORDER BY cat_id";
//        $this->_db->query($sql);
//        return $this->_db->results();
//    }

}
