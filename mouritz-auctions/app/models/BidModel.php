<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BidsModel
 *
 * @author ThomasElvin
 */
class BidModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getBids() {
        $this->_db->get(array('*'), BIDS_TABLE, null);
        return $this->_db->results();
    }

    public function getBid($ID) {
        $this->_db->get(array('*'), BIDS_TABLE, array(BID_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getBidsToAuction($ID) {
        $sql = "SELECT
                Bids.auction_id, Bids.auction_id, Bids.amount,
                Users.Users_id, Users.username
                FROM Bids
                LEFT JOIN Users ON Bids.user_id = Users.Users_id
                WHERE Bids.auction_id = $ID
                GROUP BY Bids.Bids_id
                ORDER BY Bids.amount DESC";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
      public function getUserBids($ID) {
        $sql = "SELECT
                Bids.auction_id, Bids.auction_id, Bids.amount,
                Users.Users_id, Users.username
                FROM Bids
                LEFT JOIN Users ON Bids.user_id = Users.Users_id
                WHERE Bids.user_id = $ID
                GROUP BY Bids.Bids_id
                ORDER BY Bids.amount DESC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(BIDS_TABLE, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete(BIDS_TABLE, array(BID_ID, '=', $ID));
    }
    
     public function deleteUserBids($ID) {
        return $this->_db->delete(BIDS_TABLE, array(BID_USER_ID, '=', $ID));
    }

}
