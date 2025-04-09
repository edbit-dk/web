<?php

class CommentModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all users
    public function getComments() {
        $this->_db->get(array('*'), COMMENTS_TABLE, null);
        return $this->_db->results();
    }

    public function getComment($ID) {
        $sql = "SELECT ID, com_text, com_date, com_name, com_approved"
                . " FROM comments"
                . " WHERE car_id = $ID AND com_approved = 1"
                . " LIMIT 3";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
        public function readComment($ID) {
        $sql = "SELECT ID, com_text, com_date, com_name, com_approved"
                . " FROM comments"
                . " WHERE ID = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(COMMENTS_TABLE, $fields);
    }

       public function update($fields = array(), $id = null) {
        return $this->_db->update(COMMENTS_TABLE, $id, $fields);
    }

    public function delete($id) {
        return $this->_db->delete(COMMENTS_TABLE, array(COMMENT_ID, '=', $id));
    }

}
