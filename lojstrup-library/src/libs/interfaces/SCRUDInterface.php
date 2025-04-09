<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface SCRUDInterface
{

    public
            function search();

    public
            function create($fields);

    public
            function getLastInsertId();

    public
            function read();

    public
            function getById($ID);

    public
            function getByName($name);

    public
            function update($fields, $ID);

    public
            function delete($ID);
}
