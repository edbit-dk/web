<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageModel
 *
 * @author ThomasElvin
 */
class ImageModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all users
    public function getImages() {
        $this->_db->get(array('*'), IMAGES_TABLE, null);
        return $this->_db->results();
    }

    public function getImagesToAuction($ID) {
        $this->_db->get(array('*'), IMAGES_TABLE, array(IMAGE_FK_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getUserImages($ID) {
        $this->_db->get(array('*'), IMAGES_TABLE, array(IMAGE_USER_ID, '=', $ID));
        return $this->_db->results();
    }

    public function delete($ID) {
        return $this->_db->delete(IMAGES_TABLE, array(IMAGE_ID, '=', $ID));
    }

    public function deleteUserImages($ID) {
        return $this->_db->delete(IMAGES_TABLE, array(IMAGE_USER_ID, '=', $ID));
    }
    
    public function deleteAuctionImage($ID) {
        return $this->_db->delete(IMAGES_TABLE, array(IMAGE_AUCTION_ID, '=', $ID));
    }

    public function addToImages($file, $original, $user) {
        $ID = $this->_db->lastInsertID();
        $data = array(
            IMAGE_FK_ID => $ID,
            IMAGE_ORIGINAL => $original,
            IMAGE_URL => $file,
            IMAGE_DATE => LOCAL_TIMESTAMP,
            IMAGE_USER_ID => $user
        );
        return $this->_db->insert(IMAGES_TABLE, $data);
    }

    public function addImagesToAuction($file, $original, $ID, $user) {
        $data = array(
            IMAGE_FK_ID => $ID,
            IMAGE_ORIGINAL => $original,
            IMAGE_URL => $file,
            IMAGE_DATE => LOCAL_TIMESTAMP,
            IMAGE_USER_ID => $user
        );
        return $this->_db->insert(IMAGES_TABLE, $data);
    }

}
