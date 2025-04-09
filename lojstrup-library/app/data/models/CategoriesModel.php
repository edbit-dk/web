<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoriesModel extends Model
{

    // object instance
    private static
            $_instance = null;
    private
            $_storage,
            $_table           = 'Categories';

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new CategoriesModel($params);
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
            function create($fields = array())
    {
        return $this->_storage->insert($this->_table, $fields);
    }

    // get all pages 
    public
            function read()
    {
        $this->_storage->select(array('*'), $this->_table, null);
        return $this->_storage->results();
    }

    // get a specific page by id
    public
            function get($item, $row, $limit = 'LIMIT 0,18446744073709551615')
    {
        $this->_storage->select(array('*'), $this->_table, array($row, '=', $item), $limit);
        return $this->_storage->results();
    }

    // get last ind fro SQL INSERT
    public
            function getLastInsertId()
    {
        return $this->_storage->lastInsertId();
    }

    // update page by id
    public
            function update($fields = array(), $ID = null)
    {
        return $this->_storage->update($this->_table, $this->_ID, $ID, $fields);
    }

    // delete by id
    public
            function delete($ID)
    {
        return $this->_storage->delete($this->_table, array($this->_ID, '=', $ID));
    }

}
