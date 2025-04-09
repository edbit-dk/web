<?php

class OrderModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function createOrder($fields = array()) {
        return $this->_db->insert('Orders', $fields);
    }

    public function createDetails($fields = array()) {
        return $this->_db->insert('Order_Details', $fields);
    }

    public function getLastOrderID() {
        return $this->_db->lastInsertID();
    }

    public function getCustomerOrders($ID) {
        $sql = "SELECT 
            Orders.ID, 
            Orders.Total, 
            Orders.Date, 
            Status.Name AS Status
            FROM Orders
            LEFT JOIN Status ON Orders.Status_ID = Status.ID
            WHERE Orders.Customer_ID = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getProductsToOrder($ID) {
        $sql = "SELECT 
                            Order_Details.Quantity, 
                            Order_Details.Product, 
                            Order_Details.Price, 
                            Order_Details.Price, 
                            Order_Details.Subtotal 
                            FROM Order_Details 
                            WHERE Order_Details.Order_ID = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

}
