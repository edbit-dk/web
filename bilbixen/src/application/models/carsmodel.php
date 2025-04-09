<?php

class CarsModel {

    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all cars from database
     */
    public function getAllCars() {
        $sql = "SELECT car_id, car_name, car_image, car_price, car_year, car_km FROM cars";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all cars by id from database
     */
    public function getCarById($car_id) {
        $sql = "SELECT car_id, car_name, car_image, car_price, car_sold, car_year, car_km "
                . " FROM cars"
                . " WHERE car_id = :car_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':car_id' => $car_id));

        return $query->fetchAll();
    }

    /**
     * Get all comments by id from database
     */
    public function getComById($car_id) {
        $sql = "SELECT com_text, com_date, com_name"
                . " FROM comments"
                . " WHERE car_id = :car_id AND com_approved = 1"
                . " LIMIT 3";
        $query = $this->db->prepare($sql);
        $query->execute(array(':car_id' => $car_id));

        return $query->fetchAll();
    }

    /**
     * Get all cars by category random from database
     */
    public function getRandomAllCarsByCategory() {
        $sql = "SELECT  id, car, sold, category, cat_id, price, year, km, image, amount_of_comments "
                . " FROM("
                . " SELECT"
                . " cars.car_id AS id,"
                . " cars.car_name AS car,"
                . " cars.car_price AS price,"
                . " cars.car_year AS year,"
                . " cars.car_km AS km,"
                . " cars.car_image AS image,"
                . " cars.car_sold AS sold,"
                . " categories.cat_name AS category,"
                . " categories.cat_id AS cat_id,"
                . " (SELECT"
                . " COUNT(comments.com_id)"
                . " FROM comments"
                . " WHERE comments.com_approved = 1"
                . " AND comments.car_id = cars.car_id)"
                . " AS amount_of_comments"
                . " FROM cars, car_categories, categories"
                . " WHERE car_categories.car_id = cars.car_id"
                . " AND car_categories.cat_id = categories.cat_id"
                . " ORDER BY RAND()"
                . " ) AS result_table"
                . " GROUP BY category"
                . " ORDER BY cat_id"
                . " LIMIT 3";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all cars by category from database
     */
    public function getAllCarsByCategory($cat_id) {
        $sql = "SELECT id, car, category, price, sold, reduced_price, year, km, image, amount_of_comments "
                . " FROM("
                . " SELECT"
                . " cars.car_id AS id,"
                . " cars.car_name AS car,"
                . " cars.car_price AS price,"
                . " (car_price * 0.9) AS reduced_price,"
                . " cars.car_year AS year,"
                . " cars.car_km AS km,"
                . " cars.car_image AS image,"
                . " cars.car_sold AS sold,"
                . " categories.cat_name AS category,"
                . " (SELECT"
                . " COUNT(comments.com_id)"
                . " FROM comments"
                . " WHERE comments.com_approved = 1"
                . " AND comments.car_id = cars.car_id)"
                . " AS amount_of_comments"
                . " FROM cars, car_categories, categories"
                . " WHERE car_categories.car_id = cars.car_id"
                . " AND car_categories.cat_id = :cat_id"
                . " ) AS result_table"
                . " GROUP BY id";

        $query = $this->db->prepare($sql);
        $query->execute(array(':cat_id' => $cat_id));

        return $query->fetchAll();
    }

    /**
     * Get all categories from database
     */
    public function getAllCategories() {
        $sql = "SELECT cat_id, cat_name";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Add car to database
     */
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

        $sql = "INSERT INTO comments (com_name, com_email, com_text, car_id) "
                . "VALUES (:name, :email, :comment, :car_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':email' => $email, ':comment' => $comment, ':car_id' => $id));
    }

    /**
     * Delete car from database
     */
    public function deleteCar($car_id) {
        $sql = "DELETE FROM cars WHERE car_id = :car_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':car_id' => $car_id));
    }

}
