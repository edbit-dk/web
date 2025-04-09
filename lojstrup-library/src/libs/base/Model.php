<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract
        class Model implements SCRUDInterface, SingletonInterface
{

    // object instance
    private static
            $_instance = null;
    // class constants
    private
            $_storage,
            $_Table,
            $_ID,
            $_Name;

    public
            function __construct($storage = null, $table = 'Pages', $ID = 'ID', $name = 'Name')
    {
        $this->_Table   = $table;
        $this->_ID      = $ID;
        $this->_Name    = $name;
        $this->_storage = $storage;
    }

    public static
            function load()
    {

        if (!isset(self::$_instance))
        {
            // self::$_instance = new Model($params);
        }

        return self::$_instance;
    }

    public
            function search()
    {
        
    }

    // create something
    public
            function create($fields = array())
    {
        return $this->_storage->insert($this->_Table, $fields);
    }

    // get something
    public
            function read()
    {
        $this->_storage->select(array('*'), $this->_Table, null);
        return $this->_storage->results();
    }

    // get a specific something by id
    public
            function getById($ID)
    {
        $this->_storage->select(array('*'), $this->_Table, array($this->_ID, '=', $ID, 'LIMIT 1'));
        return $this->_storage->results();
    }

    // get a specific something by id
    public
            function getByName($url)
    {
        $this->_storage->select(array('*'), $this->_Table, array($this->_Name, '=', $url), 'LIMIT 1');
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
        return $this->_storage->update($this->_Table, $this->_ID, $ID, $fields);
    }

    // delete by id
    public
            function delete($ID)
    {
        return $this->_storage->delete($this->_Table, array($this->_ID, '=', $ID));
    }

}
