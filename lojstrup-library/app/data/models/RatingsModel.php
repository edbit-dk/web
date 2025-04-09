<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RatingsModel
{

    // object instance
    private static
            $_instance = null;
    private
            $_storage,
            $_table           = 'Ratings';

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new RatingsModel($params);
        }
        return self::$_instance;
    }

    public
            function __construct($storage)
    {
        $this->_storage = $storage;
    }

    // create a page
    public
            function create($fields = array(), $ID, $IP)
    {
        $ip_check  = "SELECT * FROM Ratings WHERE IP = '$IP' AND Book_ID = $ID";
        $this->_storage->query($ip_check);
        $ip_exists = $this->_storage->results();
        if (!$ip_exists)
        {
            return $this->_storage->insert($this->_table, $fields);
        }
        return false;
    }

    public
            function read()
    {
        $this->_storage->select(array('*'), $this->_table, null);
        return $this->_storage->results();
    }

    public
            function get($ID)
    {
        $sum    = 1;
        $rates = 1;
        $rates           = "SELECT COUNT(*) AS Rates FROM Ratings WHERE Book_ID = $ID";
        $this->_storage->query($rates);
        $rates           = $this->_storage->results();
        $sum             = "SELECT sum(Rating) AS Sum FROM Ratings WHERE Book_ID = $ID";
        $this->_storage->query($sum);
        $sum            = $this->_storage->results();
        if($sum[0]->Sum || $rates[0]->Rates < 0){
        $result          = $sum[0]->Sum / $rates[0]->Rates;
        } else {
            $result  = 0;
        }
        return ceil($result);
    }

}
