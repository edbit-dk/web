<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaginationModel {

    private $_db,
            $_start;
    public $_page = 1,
            $_per_page = 2;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setter($page, $per_page) {
        if (!empty($page) && !empty($per_page)) {
            $this->_page = (int) $page;
            $this->_per_page = $per_page <= 50 ? (int) $per_page : $this->_per_page;
            return true;
        }
        return false;
    }

    /**
     * Creates the data shown on the page, run the pages function after formatting data from this
     * 
     * Uses the DB::action function, refer to the DB class documentation for further info
     * 
     * @param array $data
     * @param string $table
     * @return array containing objects
     */
    public function pagination($data = array(), $table) {

        $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $data) . ", FOUND_ROWS() AS total";

        $this->positioning();

        $this->_db->action($sql, $table, null, array('LIMIT' => "{$this->_start}, {$this->_per_page}"));

        return $this->_db->results();
    }

    /**
     * Calculates where to start the query made in the pagination function
     */
    private function positioning() {
        $this->_start = ($this->_page > 1) ? ($this->_page * $this->_per_page) - $this->_per_page : 0;
    }

    /**
     * Generates the amount of pages needed from the value entered in the constructer
     * 
     * @return object
     */
    public function pages() {
        $query = $this->_db->query("SELECT FOUND_ROWS() AS total");
        $results = $query->results();
        $total = (int) $results[0]->total;
        $pages = ceil($total / $this->_per_page);
        return (object) array('pages' => $pages, 'page' => $this->_page, 'per_page' => $this->_per_page);
    }

}