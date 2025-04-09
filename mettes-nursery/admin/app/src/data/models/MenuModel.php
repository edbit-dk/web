<?php

class MenuModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all menus
    public function getMenus() {
        $sql = "Select Pages.Title, Urls.Link, Urls.Sort, Urls.Parent_ID FROM Menus
                LEFT JOIN Urls ON Urls.Menu_ID = Menus.ID 
                Left JOIN Pages ON Urls.Page_ID = Pages.ID
                WHERE Menus.Active = 1";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
}
