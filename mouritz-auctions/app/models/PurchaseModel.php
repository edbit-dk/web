<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PurchaseModel
 *
 * @author ThomasElvin
 */
class PurchaseModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getPurchases() {
        $this->_db->get(array('*'), PURCHASES_TABLE, null);
        return $this->_db->results();
    }

    public function getUserPurchases($ID) {
        $this->_db->get(array('*'), PURCHASES_TABLE, array(PURCHASE_USER_ID, '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(PURCHASES_TABLE, $fields);
    }

    public function deleteUserPurchases($ID) {
        return $this->_db->delete(PURCHASES_TABLE, array(PURCHASE_USER_ID, '=', $ID));
    }

    public function delete($ID) {
        return $this->_db->delete(PURCHASES_TABLE, array(PURCHASE_AUCTION_ID, '=', $ID));
    }

}
