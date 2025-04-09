<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface SQLInterface
{

    public
            function search($searchTerms, $searchQuery);

    public
            function insert($table, $fields);

    public
            function select($select, $table, $where, $options, $searchQuery);

    public
            function update($table, $column_ID, $ID, $fields);

    public
            function delete($table, $where);
}
