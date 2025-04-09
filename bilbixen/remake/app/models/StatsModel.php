<?php

class StatsModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfComments($car_id) {
        $sql = "SELECT COUNT(car_id) AS amount_of_comments FROM comments WHERE car_id = $car_id";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAmountOfCarsByCategory($id) {
        $sql = "SELECT COUNT(car_id) from car_categories where cat_id = $id";
        $this->_db->query($sql);
        return $this->_db->results();
    }

}
