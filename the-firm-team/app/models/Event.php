<?php

class Event {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function getAllEvents($limit) {
        $this->_db->get(array('*'), EVENTS_TABLE, null, 'LIMIT ' . $limit);
        return $this->_db->results();
    }

    public function getEvent($ID) {
        $this->_db->get(array('*'), EVENTS_TABLE, array(EVENT_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getEventsByCompany($Company_ID, $User_ID, $limit) {
        $sql = 'SELECT ID, Name, Date FROM '
                . '(SELECT Events.ID AS ID, '
                . 'Events.Name AS Name, '
                . 'Events.Date AS Date '
                . 'FROM Events '
                . 'WHERE Events.Company_ID = ' . $Company_ID
                . ') AS Result '
                . 'GROUP BY ID '
                . 'ORDER BY DATE '
                . ' LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }
    
    public function create($fields = array()) {
        return $this->_db->insert(EVENTS_TABLE, $fields);
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->insert(EVENTS_TABLE, $id, $fields);
    }
    

    public function delete($id) {
        return $this->_db->delete(EVENTS_TABLE, array(EVENT_ID, '=', $id));
    }

}
