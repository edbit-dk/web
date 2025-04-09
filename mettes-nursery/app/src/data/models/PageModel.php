<?php

class PageModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all pages
    public function getPages() {
        $sql = "SELECT Urls.Name, Pages.* FROM Urls LEFT JOIN Pages ON Urls.Page_ID = Pages.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    //Get page
    public function getPageByID($ID) {
        $sql = "Select Urls.Link, Pages.* FROM Urls
                LEFT JOIN Pages ON Urls.Page_ID = Pages.ID
                WHERE Pages.ID = $ID AND Active = 1";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getPageByName($url) {
        $sql = "Select Urls.Link, Pages.* FROM Urls
                LEFT JOIN Pages ON Urls.Page_ID = Pages.ID
                WHERE Urls.Link = '$url' AND Active = 1";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getStandardPage() {
        $sql = "Select ID FROM Pages WHERE ID = " . FRONTPAGE;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert('Pages', $fields);
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('Pages', 'ID', $id, $fields);
    }

}
