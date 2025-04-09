<?php

class Signup {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all users
    public function getAllSignups($Event_ID, $limit) {
        $sql = 'SELECT ID, Event_ID, Firstname, Lastname FROM'
                . ' (Select Users.ID AS ID,'
                . ' Users.Firstname AS Firstname,'
                . ' Users.Lastname AS Lastname,'
                . ' Signups.Event_ID AS Event_ID'
                . ' FROM Users, Signups'
                . ' WHERE Signups.Event_ID = ' . $Event_ID
                . ' AND Signups.User_ID = Users.ID)'
                . ' AS Result'
                . ' GROUP BY ID ORDER BY ID'
                . ' LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getSignups($User_ID, $limit) {
        $sql = 'SELECT ID, Name, Date, Signup_ID FROM '
                . '(Select Events.ID AS ID, '
                . 'Events.Name as Name, '
                . 'Events.Date AS Date, '
                . 'Signups.ID AS Signup_ID '
                . 'FROM Events, Signups '
                . 'WHERE Signups.User_ID = ' . $User_ID
                . ' AND Signups.Event_ID = Events.ID) '
                . 'AS Result '
                . 'GROUP BY ID ORDER BY Date '
                . 'LIMIT ' . $limit;
        $this->_db->query($sql);
        return $this->_db->results();
    }

    //Get a user
    public function getSignup($ID) {
        $this->_db->get(array('*'), SIGNUPS_TABLE, array(COMMENT_ID, '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(SIGNUPS_TABLE, $fields);
    }

    public function update($fields = array()) {
        return $this->_db->insert(SIGNUPS_TABLE, $fields);
    }

    public function delete($id) {
        return $this->_db->delete(SIGNUPS_TABLE, array('ID', '=', $id));
    }

}
