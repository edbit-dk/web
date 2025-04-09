<?php

class OrderModel
{

    //Private DB Handler
    private $_db;
  	private $_prefix = DB_PREFIX;

    //Singleton DB connection
    public
            function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public
            function getProductsToOrder($ID)
    {
        $sql = "SELECT *
                FROM {$this->_prefix}order_details 
                WHERE order_id = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public
            function getOrderTotal($ID)
    {
        $sql = "SELECT
                            SUM(order_details.subtotal) AS Total
                            FROM order_details
                            WHERE order_details.order_id = $ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public
            function getOrders()
    {
      
        $sql = "SELECT 
        {$this->_prefix}orders.ID AS order_id, {$this->_prefix}orders.date, {$this->_prefix}orders.payment, 
        {$this->_prefix}order_details.product, {$this->_prefix}orders.coupon,
        {$this->_prefix}status.name AS status, {$this->_prefix}status.ID AS status_id,
        {$this->_prefix}users.ID AS user_id, {$this->_prefix}users.firstname, {$this->_prefix}users.lastname
        FROM {$this->_prefix}orders
        LEFT JOIN {$this->_prefix}order_details ON {$this->_prefix}order_details.order_id = {$this->_prefix}orders.ID
        LEFT JOIN {$this->_prefix}status ON {$this->_prefix}orders.status_id = {$this->_prefix}status.ID
        LEFT JOIN {$this->_prefix}users ON {$this->_prefix}orders.user_id = {$this->_prefix}users.ID
        GROUP BY {$this->_prefix}orders.ID";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public
            function getCustomerOrdersID($ID)
    {
        $this->_db->get(array('ID'), DB_PREFIX . 'orders', array('user_id', '=', $ID));
        return $this->_db->results();
    }

    public
            function update($fields = array(), $id = null)
    {
        return $this->_db->update(DB_PREFIX . 'orders', 'ID', $id, $fields);
    }

    public
            function deleteOrder($ID)
    {
        return $this->_db->delete(DB_PREFIX . 'orders', array('ID', '=', $ID));
    }

    public
            function deleteOrderDetails($ID)
    {
        return $this->_db->delete(DB_PREFIX . 'order_details', array('order_id', '=', $ID));
    }

    public
            function deleteCustomerOrders($ID)
    {
        return $this->_db->delete(DB_PREFIX . 'orders', array('user_id', '=', $ID));
    }

    public
            function deleteCustomerOrderDetails($ID)
    {
        return $this->_db->delete(DB_PREFIX . 'order_details', array('order_id', '=', $ID));
    }

}
