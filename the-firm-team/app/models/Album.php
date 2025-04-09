<?php

class Album {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getAlbums() {
        $this->_db->get(array('*'), ALBUMS_TABLE, null);
        return $this->_db->results();
    }

    public function getAllAlbumsByCompany($Company_ID, $limit) {
        $sql = 'SELECT Albums.ID AS ID, Albums.Name AS Name, '
                . 'Albums.Date AS Date, '
                . '(SELECT Companies.Name from Companies WHERE Albums.Company_ID'
                . ' = Companies.ID) AS Company, '
                . '(SELECT Uploads.File from Uploads WHERE Albums.ID'
                . ' = Uploads.Album_ID ORDER BY Uploads.Date DESC LIMIT 1) AS File '
                . 'FROM Albums WHERE Albums.Company_ID = ' . $Company_ID
                . ' OR Albums.Company_ID = 0 ORDER BY Albums.ID ASC LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
       public function getAlbumsByCompany($Company_ID, $limit) {
        $sql = 'SELECT Albums.ID AS ID, Albums.Name AS Name, '
                . 'Albums.Date AS Date, '
                . '(SELECT Companies.Name from Companies WHERE Albums.Company_ID'
                . ' = Companies.ID) AS Company, '
                . '(SELECT Uploads.File from Uploads WHERE Albums.ID'
                . ' = Uploads.Album_ID ORDER BY Uploads.Date DESC LIMIT 1) AS File '
                . 'FROM Albums WHERE Albums.Company_ID = ' . $Company_ID
                . ' AND Albums.Type_ID = 1 '
                . ' ORDER BY Albums.Date DESC LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    //Delete an album
    public function delete($ID) {
        if (!$this->_db->delete(UPLOADS_TABLE, array('ID', '=', $ID))) {
            throw new Exception('There was a problem deleting a file.');
        }
    }

}
