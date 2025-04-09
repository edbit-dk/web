<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersModel extends Model
{

    private static
            $_instance = null;
    private
            $_storage,
            $_data,
            $_table           = 'Users';

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new UsersModel($params);
        }
        return self::$_instance;
    }

    public
            function __construct($storage)
    {
        $this->_storage = $storage;
    }

    public
            function search()
    {
        var_dump($_storage);
        echo 'search';
    }

    //Get all users
    public
            function read($limit = 'LIMIT 0,18446744073709551615')
    {
        $this->_storage->select(array('*'), $this->_table, $limit);
        return $this->_storage->results();
    }

    //Get a user
    public
            function get($item, $row, $limit = 'LIMIT 0,18446744073709551615')
    {
        $this->_storage->select(array('*'), $this->_table, array($row, '=', $item), $limit);
        return $this->_storage->results();
    }

    //Update users
    public
            function update($fields = array(), $ID = null)
    {
        if (!$ID && $this->isLoggedIn())
        {
            $ID = $this->data()->ID;
        }

        if (!$this->_storage->update($this->_users, 'ID', $ID, $fields))
        {
            throw new Exception('There was a problem updating.');
        }
    }

    //Create users
    public
            function create($fields)
    {
        if (!$this->_storage->insert($this->_table, $fields))
        {
            throw new Exception('There was a problem creating an account.');
        }
    }

    //Delete a user
    public
            function delete($ID)
    {
        if (!$this->_storage->delete($this->_table, array('ID', '=', $ID)))
        {
            throw new Exception('There was a problem deleting an account.');
        }
    }

    public
            function data()
    {
        return $this->_data;
    }

}
