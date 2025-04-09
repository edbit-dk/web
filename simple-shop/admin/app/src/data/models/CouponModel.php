<?php

class CouponModel
{

    //Private DB Handler
    private
            $_db;

    //Singleton DB connection
    public
            function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public
            function getCoupons()
    {
        $this->_db->get(array('*'), 'Coupons', null);
        return $this->_db->results();
    }

    public
            function getCoupon($ID)
    {
        $this->_db->get(array('*'), 'Coupons', array('ID', '=', $ID));
        return $this->_db->results();
    }

    public
            function create($fields = array())
    {
        return $this->_db->insert('Coupons', $fields);
    }

    public
            function update($fields = array(), $id = null)
    {
        return $this->_db->update('Coupons', 'ID', $id, $fields);
    }

    public
            function delete($ID)
    {
        return $this->_db->delete('Coupons', array('ID', '=', $ID));
    }

}
