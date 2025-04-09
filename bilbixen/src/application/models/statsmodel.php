<?php

class StatsModel
{
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
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_songs;
    }
    
     public function getAmountOfComments($car_id)
    {
        $sql = "SELECT COUNT(car_id) AS amount_of_comments FROM comments WHERE car_id = :car_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':car_id' => $car_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchColumn();
    }
}

//SELECT * FROM sql_products INNER JOIN sql_product_categories
//ON sql_products.product_ID = sql_product_categories.product_ID 
//WHERE sql_product_categories.category_ID = :ID

