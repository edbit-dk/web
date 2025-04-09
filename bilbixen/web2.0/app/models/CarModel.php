<?php

class CarModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    /**
     * Get all cars from database
     */
    public function getCars() {
        $sql = "SELECT ID, car_name, car_image, car_price, car_year, car_km, car_sold FROM cars ORDER BY ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    /**
     * Get all cars by id from database
     */
    public function getCar($ID) {
        $sql = "SELECT ID, car_name, car_image, car_price, car_sold, car_year, car_km "
                . " FROM cars"
                . " WHERE ID = $ID ";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getCarAndCategory($ID) {
        $sql = "SELECT ID, name, category, cat_id, image, price, sold, year, km "
                . " FROM (SELECT"
                . " cars.ID AS ID,"
                . " cars.car_name AS name,"
                . " categories.cat_name AS category,"
                . " categories.cat_id AS cat_id,"
                . " cars.car_image AS image,"
                . " cars.car_price AS price,"
                . " cars.car_sold AS sold,"
                . " cars.car_year AS year,"
                . " cars.car_km AS km"
                . " FROM cars, car_categories, categories"
                . " WHERE car_categories.car_id = cars.ID"
                . " AND car_categories.cat_id = categories.cat_id"
                . " AND cars.ID = $ID)"
                . " AS Result";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    /**
     * Get all cars by category random from database
     */
    public function getRandomAllCarsByCategory() {
        $sql = "SELECT ID, car, sold, category, cat_id, price, year, km, image, amount_of_comments "
                . " FROM("
                . " SELECT"
                . " cars.ID AS ID,"
                . " cars.car_name AS car,"
                . " cars.car_price AS price,"
                . " cars.car_year AS year,"
                . " cars.car_km AS km,"
                . " cars.car_image AS image,"
                . " cars.car_sold AS sold,"
                . " categories.cat_name AS category,"
                . " categories.cat_id AS cat_id,"
                . " (SELECT"
                . " COUNT(comments.ID)"
                . " FROM comments"
                . " WHERE comments.com_approved = 1"
                . " AND comments.car_id = cars.ID)"
                . " AS amount_of_comments"
                . " FROM cars, car_categories, categories"
                . " WHERE car_categories.car_id = cars.ID"
                . " AND car_categories.cat_id = categories.cat_id"
                . " ORDER BY RAND()"
                . " ) AS result_table"
                . " GROUP BY category"
                . " ORDER BY cat_id"
                . " LIMIT 3";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    /**
     * Get all cars by category from database
     */
    public function getAllCarsByCategory($cat_id) {
        $sql = "SELECT ID, car, category, price, sold, reduced_price, year, km, image, amount_of_comments "
                . " FROM("
                . " SELECT"
                . " cars.ID AS ID,"
                . " cars.car_name AS car,"
                . " cars.car_price AS price,"
                . " (car_price * 0.9) AS reduced_price,"
                . " cars.car_year AS year,"
                . " cars.car_km AS km,"
                . " cars.car_image AS image,"
                . " cars.car_sold AS sold,"
                . " categories.cat_name AS category,"
                . " (SELECT"
                . " COUNT(comments.ID)"
                . " FROM comments"
                . " WHERE comments.com_approved = 1"
                . " AND comments.car_id = cars.ID)"
                . " AS amount_of_comments"
                . " FROM cars, car_categories, categories"
                . " WHERE car_categories.car_id = cars.ID"
                . " AND car_categories.cat_id = $cat_id "
                . " ) AS result_table"
                . " GROUP BY ID";

        $this->_db->query($sql);
        return $this->_db->results();
    }

    /**
     * Get all categories from database
     */
    public function getCategory($ID) {
        $sql = "SELECT cat_id, cat_name FROM categories WHERE cat_id = $ID ORDER BY cat_id";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getCategories() {
        $this->_db->get(array('*'), 'categories', null);
        return $this->_db->results();
    }

    /**
     * Add car to database
     */
    public function create($fields = array()) {
        return $this->_db->insert('cars', $fields);
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('cars', $id, $fields);
    }

    public function addToCategory($fields) {
        $ID = $this->_db->lastInsertID();
        $data = array(
            'car_id' => $ID,
            'cat_id' => $fields
        );
        return $this->_db->insert('car_categories', $data);
    }

    public function updateCategory($fields, $ID = null) {
        $data = array(
            'car_id' => $ID,
            'cat_id' => $fields
        );
        return $this->_db->updateCategories('car_categories', $ID, $data);
    }

    public function removeFromCategory($ID) {
        if (!$this->_db->delete('car_categories', array('ID', '=', $ID))) {
            throw new Exception('There was a problem deleting.');
        }
    }

    public function addCar($car_name, $car_image, $car_price, $car_year) {
        // clean the input from javascript code for example
        $car_name = strip_tags($car_name);
        $car_image = strip_tags($car_image);
        $car_price = strip_tags($car_price);
        $car_year = strip_tags($car_year);

        $sql = "INSERT INTO cars (car_name, car_image, car_price, car_year) "
                . "VALUES (:car_name, :car_image, :car_price, :car_year)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':car_name' => $car_name, ':car_image' => $car_image, ':car_price' => $car_price, ':car_year' => $car_year));
    }

    /**
     * Add comment to database
     */
    public function addComment($name, $email, $comment, $id) {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $email = strip_tags($email);
        $comment = strip_tags($comment);
        $id = strip_tags($id);

        $sql = "INSERT INTO comments (com_name, com_email, com_text, ID) "
                . "VALUES (:name, :email, :comment, :ID)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':email' => $email, ':comment' => $comment, ':ID' => $id));
    }

    /**
     * Delete car from database
     */
    public function delete($ID) {
        if (!$this->_db->delete('cars', array('ID', '=', $ID))) {
            throw new Exception('There was a problem deleting.');
        }
    }

    public function find($car = null) {
        if ($car) {
            $field = (is_numeric($car)) ? 'ID' : 'car_name';
            $data = $this->_db->get(array('*'), 'cars', array($field, '=', $car), null);

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

}
