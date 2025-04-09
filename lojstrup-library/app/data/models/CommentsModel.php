<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CommentsModel extends Model
{

    // object instance
    private static
            $_instance = null;
    private
            $_storage,
            $_table           = 'Comments';

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new CommentsModel($params);
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


    public
            function read()
    {
        $this->_storage->select(array('*'), $this->_table, null);
        return $this->_storage->results();
    }
    
     public
            function getBookComments()
    {
         $sql = "SELECT 
        Books.ID as Book_ID, Comments.Name, Comments.Email, Comments.Date,
        Comments.Text, Comments.Active
        FROM Comments
        LEFT JOIN Books ON Comments.Book_ID = Books.ID
        GROUP BY Comments.ID";
        $this->_storage->query($sql);
        return $this->_storage->results();
    }
    
    

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
        return $this->_storage->update($this->_table, 'ID', $ID, $fields);
    }

    // delete by id
    public
            function delete($ID)
    {
        return $this->_storage->delete($this->_table, array('ID', '=', $ID));
    }

}
