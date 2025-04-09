<?php

/*
 * Copyright (C) 2015 thoma
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace app\models;
use thom855j\mvc\Model ;

class DefaultModel extends Model
{

    // object instance
    protected static
            $_instance = null ;
    private
            $_storage ,
            $_table ,
            $_columns ,
            $_rows ,
            $_total ;

    public
            function __construct( DB $storage )
    {
        $this->_storage = $storage ;
        $this->_table   = '' ;
        $this->_rows    = '' ;
        $this->_columns = array() ;
    }
    
      public static 
            function load($storage ) 
    { 
        if ( !isset( self::$_instance ) ) 
        { 
            self::$_instance = new DefaultModel( $storage ) ; 
        } 
        return self::$_instance ; 
    } 

    public
            function setStorage( $storage )
    {
        $this->_storage = $storage ;
    }

    public
            function setTable( $table )
    {
        $this->_table = $table ;
    }

    public
            function setRows( $rows = '' )
    {
        $this->_rows = $rows ;
    }

    public
            function setColums( $colums = array() )
    {
        $this->_columns = $colums ;
    }

    public
            function search( $query )
    {
        return $this->_storage->search( $this->_table , $this->_rows , $query ,
                                        array( $this->_rows ) ) ;
    }

    // create 
    public
            function create( $fields = array() )
    {
        return $this->_storage->insert( $this->_table , $fields ) ;
    }

    // read
    public
            function read( $paging = null , $where = array( array() ) )
    {
        if ( !empty( $paging ) )
        {
            return $this->paging( $paging[ 'start' ] , $paging[ 'end' ] ,
                                  $paging[ 'max' ] , $where ) ;
        }
        else
        {
            $this->_storage->select( array( $this->_rows ) , $this->_table ,
                                     $where ) ;
            return $this->_storage->results() ;
        }
    }

    // get page by specific search
    public
            function get( $where = array( array() ) ,
                          $paging = array( 'start' , 'end' , 'max' ) ,
                          $options = array() )
    {

        if ( !empty( $paging ) )
        {
            return $this->paging( $paging[ 'start' ] , $paging[ 'end' ] ,
                                  $paging[ 'max' ] , $where , $options ) ;
        }
        else
        {
            $this->_database->select( array( $this->_rows ) , $this->_table ,
                                      $where , $options ) ;
            return $this->_database->results() ;
        }
    }

    // get last ind fro SQL INSERT
    public
            function getLastInsertId()
    {
        return $this->_storage->lastInsertId() ;
    }

    public
            function paging( $start , $end , $max , $where = array( array() ) ,
                             $options = null )
    {

        $page    = isset( $start ) ? ( int ) $start : 1 ;
        $perPage = isset( $end ) && $end <= $max ? ( int ) $end : 5 ;

        $pages = ($page > 1) ? ($page * $perPage) - $perPage : 0 ;

        $this->_total = (ceil( $this->count()[ 0 ]->Total / $perPage )) ;

        $this->_database->select( array( $this->_rows ) , $this->_table ,
                                  $where ,
                                  array( 'ORDER BY ID' => 'DESC' , 'LIMIT' => "$pages,$perPage" ) ) ;


        return $this->_database->results() ;
    }

    public
            function count()
    {
        $this->_storage->select( array( "count(*) AS Total" ) , $this->_table ,
                                 null ) ;
        return $this->_storage->results() ;
    }

    public
            function total()
    {
        return $this->_total ;
    }

    // update page by id
    public
            function update( $fields = array() , $ID = null )
    {
        return $this->_storage->update( $this->_table , 'ID' , $ID , $fields ) ;
    }

    // delete
    public
            function delete( $where = array( array() ) )
    {
        return $this->_storage->delete( $this->_table , $where ) ;
    }

}
