<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TestModel extends Model
{

    private
            $_storage;

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new TestModel($params);
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

    public
            function create();

    public
            function read();

    public
            function update();

    public
            function delete();
}
