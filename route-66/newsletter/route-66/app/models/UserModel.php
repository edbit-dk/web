<?php

class UserModel {

    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();

        $this->_sessionName = SESSION_NAME;
        $this->_cookieName = COOKIE_NAME;

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    $this->logout();
                }
            }
        } else {
            $this->find($user);
        }
    }

    //Update users
    public function update($fields = array(), $id = null) {
        $ID = USER_ID;
        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->$ID;
        }

        if (!$this->_db->update(USERS_TABLE, USER_ID, $id, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }

    //Create users
    public function create($fields) {
        if (!$this->_db->insert(USERS_TABLE, $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    //Delete a user
    public function delete($ID) {
        if (!$this->_db->delete(USERS_TABLE, array(USER_ID, '=', $ID))) {
            throw new Exception('There was a problem deleting an account.');
        }
    }

    //Get all users
    public function getUsers() {
        $this->_db->get(array('*'), USERS_TABLE, null);
        return $this->_db->results();
    }

    //Get a user
    public function getUser($ID) {
        $this->_db->get(array('*'), USERS_TABLE, array(USER_ID, '=', $ID));
        return $this->_db->results();
    }

    //Find users
    public function find($user = null) {
        if ($user) {
            $field = (is_numeric($user)) ? USER_ID : USER_USERNAME;
            $data = $this->_db->get(array('*'), USERS_TABLE, array($field, '=', $user), null);

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    //check if user exists
    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    //Log users in
    public function login($username = null, $password = null, $remember = false) {

        $_ID = USER_ID;
        $_Password = USER_PASSWORD;
        $_Hash = SESSION_HASH;

        if (!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->$_ID);
        } else {

            $user = $this->find($username);
            if ($user) {

                if (Password::verify($password, $this->data()->$_Password)) {
                    // password is correct

                    Session::put($this->_sessionName, $this->data()->$_ID);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get(array('*'), SESSIONS_TABLE, array(SESSION_USER_ID, '=', $this->data()->$_ID));

                        if (!$hashCheck->count()) {
                            $this->_db->insert(SESSIONS_TABLE, array(
                                SESSION_USER_ID => $this->data()->$_ID,
                                SESSION_HASH => $hash
                            ));
                        } else {
                            $hashCheck = $hashCheck->first()->$_Hash;
                        }

                        Cookie::put($this->_cookieName, $hash, COOKIE_EXPIRY);
                    }

                    return true;
                }
            }
        }

        return false;
    }

    //User roles
    public function role($key) {

        $_User_Role = USER_ROLE;
        $_Role = ROLE_NAME;

        $role = $this->_db->get(array('*'), ROLES_TABLE, array(ROLE_ID, '=', $this->data()->$_User_Role));

        if ($role->count()) {
            $permissions = json_decode($role->first()->$_Role, true);

            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }

    public function logout() {
        $_ID = USER_ID;
        $this->_db->delete(SESSIONS_TABLE, array(SESSION_USER_ID, '=', $this->data()->$_ID));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data() {
        return $this->_data;
    }

    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }

}
