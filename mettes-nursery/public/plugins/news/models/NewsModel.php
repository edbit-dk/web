<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }
    
      public function getNews() {
        $this->_db->get(array('*'), 'News', null);
        return $this->_db->results();
    }

    public function getNewsByID($ID) { 
        $this->_db->get(array('*'), 'News', array('ID', '=', $ID)); 
        return $this->_db->results(); 
    } 

}
