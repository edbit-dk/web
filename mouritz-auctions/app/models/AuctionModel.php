<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuctionModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getAllAuctions() {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id = Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.status = 0
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.start_date ASC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAuctions() {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.status = 0
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.start_date ASC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getNewestAuctions($limit) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.status = 0
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.Auctions_id DESC
               LIMIT $limit";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getEndingAuctions($limit) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.status = 0
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.end_date ASC
               LIMIT $limit";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAuction($ID) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.Auctions_id = $ID
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.start_date ASC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getUserAuctions($ID) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.user_id = $ID
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.Auctions_id DESC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAuctionsToUser($ID, $user_id) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id =  Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price
               WHERE Auctions.Auctions_id = $ID
               AND Auctions.user_id = $user_id
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.start_date ASC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(AUCTIONS_TABLE, $fields);
    }

    public function update($fields = array(), $ID = null) {
        return $this->_db->update(AUCTIONS_TABLE, AUCTION_ID, $ID, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete(AUCTIONS_TABLE, array(AUCTION_ID, '=', $ID));
    }

    public function deleteUserAuctions($ID) {
        return $this->_db->delete(AUCTIONS_TABLE, array(AUCTION_USER_ID, '=', $ID));
    }

    public function search($searchTearms) {
        $sql = "SELECT
               Auctions.*,
               Users.Users_id, Users.username,
               Images.*,
               Categories.*,
               Bids.*
               FROM Auctions
               LEFT JOIN Users ON Auctions.user_id = Users.Users_id
               LEFT JOIN Images ON Auctions.Auctions_id = Images.auction_id
               LEFT JOIN Categories ON Auctions.category_id = Categories.Categories_id
               LEFT JOIN ( 
               SELECT
               auction_id, 
               MAX(amount) as max_price
               FROM Bids 
               GROUP BY auction_id)
               maxResult ON maxResult.auction_id = Auctions.Auctions_id
               LEFT JOIN Bids ON Auctions.Auctions_id = Bids.auction_id
               AND Bids.amount = maxResult.max_price 
               WHERE title LIKE '%$searchTearms%' 
               OR description LIKE '%$searchTearms%' 
               OR category_id LIKE '%$searchTearms%'
               GROUP BY Auctions.Auctions_id
               ORDER BY Auctions.start_date ASC";
        $this->_db->query($sql);
        return $this->_db->results();
    }

}
