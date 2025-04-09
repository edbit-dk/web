<?php

class News {

    private $_db;


    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getAllNews() {
        $this->_db->get(array('*'), NEWS_TABLE, null);
        return $this->_db->results();
    }
    
      public function getNewsByCompany($Company_ID, $limit) {
        $sql = 'SELECT ID, Name, Date, Content FROM '
                . '(SELECT News.ID AS ID, '
                . 'News.Name AS Name, '
                . 'News.Date AS Date, '
                . 'News.Content AS Content '
                . 'FROM News '
                . 'WHERE News.Company_ID = ' . $Company_ID
                . ') AS Result '
                . 'GROUP BY ID '
                . 'ORDER BY DATE '
                . ' LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getNews($ID) {
        $this->_db->get(array('*'), NEWS_TABLE, array(NEWS_ID, '=', $ID));
        return $this->_db->results();
    }
    
    public function create($fields = array()) {
        return $this->_db->insert(NEWS_TABLE, $fields);
    }

    public function update($fields = array()) {
        return $this->_db->insert(NEWS_TABLE, $fields);
    }

    public function delete($id) {
        return $this->_db->delete(NEWS_TABLE, array(NEWS_ID, '=', $id));
    }

}
