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
        $this->_db->get(array('*'), COMMENTS_TABLE, array(COMMENT_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getAmountToAuction($ID) {
        $this->_db->get(array('count(id) AS amount_of_comments'), COMMENTS_TABLE, array(COMMENT_AUCTION_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getCommentsToAuction($ID) {
        $sql = "SELECT
               Users.Users_id, Users.username,
               Comments.*
               FROM Comments
               LEFT JOIN Users ON Comments.user_id = Users.Users_id
               WHERE Comments.auction_id = $ID
               GROUP BY Comments.Comments_id
               DESC
               LIMIT 5";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
     public function getUserComments($ID) {
        $sql = "SELECT
               Users.Users_id, Users.username,
               Comments.*
               FROM Comments
               LEFT JOIN Users ON Comments.user_id = Users.Users_id
               WHERE Comments.user_id = $ID
               GROUP BY Comments.Comments_id
               LIMIT 5";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(COMMENTS_TABLE, $fields);
    }

    public function update($fields = array()) {
        return $this->_db->insert(COMMENTS_TABLE, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete(COMMENTS_TABLE, array(COMMENT_ID, '=', $ID));
    }
    
    public function deleteUserComments($ID) {
        return $this->_db->delete(COMMENTS_TABLE, array(COMMENT_USER_ID, '=', $ID));
    }

}
