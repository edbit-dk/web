<?php

class DepartmentModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    /**
     * Add message to database
     */
    public function create($fields = array()) {
        return $this->_db->insert('departments', $fields);
    }

    public function getDepartments() {
        $this->_db->get(array('*'), 'departments', null);
        return $this->_db->results();
    }

    public function getDepartment($ID) {
        $this->_db->get(array('*'), 'departments', array('id', '=', $ID));
        return $this->_db->results();
    }

    public function update($fields = array(), $id = null) {
        return $this->_db->update('departments', $id, $fields);
    }

    /**
     * Delete message from database
     */
    public function delete($ID) {
        if (!$this->_db->delete('departments', array('id', '=', $ID))) {
            throw new Exception('There was a problem deleting.');
        }
    }

}
