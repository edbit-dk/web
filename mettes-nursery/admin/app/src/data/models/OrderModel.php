<?php

class OrderModel {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
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

    public function getOrders() {
        $sql = "SELECT 
        Orders.ID AS Order_ID, Orders.Date, Orders.Total, 
        Order_Details.Product, 
        Status.Name AS Status, Status.ID AS Status_ID,
        Users.ID AS User_ID, Users.Firstname, Users.Lastname
        FROM Orders
        LEFT JOIN Order_Details ON Order_Details.Order_ID = Orders.ID
        LEFT JOIN Status ON Orders.Status_ID = Status.ID
        LEFT JOIN Users ON Orders.Customer_ID = Users.ID
        GROUP BY Orders.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
 public function getCustomerOrdersID($ID) {
        $this->_db->get(array('ID'), 'Orders', array('Customer_ID', '=', $ID));
        return $this->_db->results();
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('Orders', 'ID', $id, $fields);
    }
    
      public function deleteOrder($ID) {
        return $this->_db->delete('Orders', array('ID', '=', $ID));
    }
    
      public function deleteOrderDetails($ID) {
        return $this->_db->delete('Order_Details', array('Order_ID', '=', $ID));
    }
    
    
      public function deleteCustomerOrders($ID) {
        return $this->_db->delete('Orders', array('Customer_ID', '=', $ID));
    }
    
      public function deleteCustomerOrderDetails($ID) {
        return $this->_db->delete('Order_Details', array('Order_ID', '=', $ID));
    }

}
