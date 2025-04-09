<?php

class Upload {

    private $_db;

    public function __construct($folder) {
        $this->folder = $folder;
        $this->_db = DB::getInstance();
    }

    public function getUploads() {
        $this->_db->get(array('*'), UPLOADS_TABLE, null);
        return $this->_db->results();
    }

    public function getUploadsByUser($ID, $limit) {
        $sql = 'SELECT Uploads.ID AS ID, Uploads.File AS File, '
                . 'Uploads.Date AS Date, '
                . '(SELECT Companies.Name from Companies WHERE Uploads.Company_ID'
                . ' = Companies.ID) AS Company, '
                . '(SELECT Albums.Name from Albums WHERE '
                . 'Uploads.Album_ID = Albums.ID) AS Album, '
                . '(SELECT Types.Name from Types WHERE '
                . 'Uploads.Type_ID = Types.ID) AS Type '
                . 'FROM Uploads WHERE Uploads.User_ID = ' . $ID
                . ' ORDER BY Uploads.Date DESC LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getUploadsByCompany($ID, $limit) {
        $sql = 'SELECT Uploads.ID AS ID, Uploads.File AS File, '
                . 'Uploads.Date AS Date, Uploads.Album_ID As Album_ID, '
                . '(SELECT Companies.Name from Companies WHERE Uploads.Company_ID'
                . ' = Companies.ID) AS Company, '
                . '(SELECT Albums.Name from Albums WHERE '
                . 'Uploads.Album_ID = Albums.ID) AS Album, '
                . '(SELECT Albums.Date from Albums WHERE '
                . 'Uploads.Album_ID = Albums.ID) AS Album_Date '
                . 'FROM Uploads WHERE Uploads.Company_ID = ' . $ID
                . ' AND Uploads.Type_ID = 1 '
                . ' ORDER BY Uploads.Date DESC LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getUploadsByAlbum($Company_ID, $Album_ID, $limit) {
        $sql = 'SELECT Uploads.ID AS ID, Uploads.File AS File, '
                . 'Uploads.Date AS Date, '
                . '(SELECT Companies.Name from Companies WHERE Uploads.Company_ID'
                . ' = Companies.ID) AS Company, '
                . '(SELECT Albums.Name from Albums WHERE '
                . 'Uploads.Album_ID = Albums.ID) AS Album '
                . 'FROM Uploads WHERE Uploads.Company_ID = ' . $Company_ID
                . ' AND Uploads.Album_ID = ' . $Album_ID
                . ' AND Uploads.Type_ID = 1 '
                . ' ORDER BY Uploads.Date DESC LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function upload($fields = array()) {
        if (!$this->_db->insert(UPLOADS_TABLE, $fields)) {
            throw new Exception('There was a problem uploading.');
        }
    }

    public function uploadImage() {
        if ($this->file != '') {
            $filename = md5(mt_srand() . microtime()) . '_' . $this->file[name];
            $thumbname = 'thmb_' . $filename;
            copy($this->file[tmp_name], $this->folder . $filename);
            copy($this->file[tmp_name], $this->folder . $thumbname);
            return $filename;
        } else {
            return false;
        }
    }

    //Delete a user
    public function delete($ID) {
        if (!$this->_db->delete(UPLOADS_TABLE, array('ID', '=', $ID))) {
            throw new Exception('There was a problem deleting a file.');
        }
    }

}

//md5(mt_srand().microtime())

//    public function upload() {
//        $timestamp = date('d-m-Y_H-i-s');
//        if ($this->file != '') {
//            $filename = $timestamp . '_' . $this->file[name];
//            copy($this->file[tmp_name], $this->folder . $filename);
//            return $filename;
//        } else {
//            return false;
//        }
//    }