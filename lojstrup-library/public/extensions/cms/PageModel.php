<?php

class PageModel extends Model
{

    // object instance
    protected static
            $_instance = null;
    // class db constants
    private
            $_storage,
            $_Table,
            $_ID,
            $_Name;

    // singleton DB connection 
    public
            function __construct($storage = null, $table = 'Pages', $ID = 'ID', $name = 'Name')
    {
        $this->_Table = $table;
        $this->_ID = $ID;
        $this->_Name = $name;
        $this->_storage = $storage;
    }

    public static
            function getInstance($params = null)
    {
        if (!isset(self::$_instance))
            {
            self::$_instance = new PageModel($params);
            }
        return self::$_instance;
    }

    public function search()
    {
        
    }

    // create a page
    public
            function create($fields = array())
    {
        return $this->_storage->insert($this->_Table, $fields);
    }

    // get all pages 
    public
            function read()
    {
        $this->_storage->select(array('*'), $this->_Table, null);
        return $this->_storage->results();
    }

    // get a specific page by id
    public
            function getById($ID)
    {
        $this->_storage->select(array('*'), $this->_Table, array($this->_ID, '=', $ID));
        return $this->_storage->results();
    }

    // get a specific page by name
    public
            function getByName($url)
    {
        $this->_storage->select(array('*'), $this->_Table, array($this->_Name, '=', $url));
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
