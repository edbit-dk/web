<?php

// Const tables with prefix USER_
class Auth
{

    // object instance
    private static
            $_instance = null;
    private
            $_storage,
            $_data,
            $_users           = 'Users',
            $_roles           = 'Roles',
            $_sessionName     = 'User',
            $_sessions        = 'Sessions',
            $_cookieName      = 'Hash',
            $_cookieExpiry    = 1800,
            $_isLoggedIn;

    public
            function __construct($storage)
    {
        $this->_storage = $storage;

        if (Session::exists($this->_sessionName))
        {
            $user = Session::get($this->_sessionName);

            if ($this->search($user))
            {
                $this->_isLoggedIn = true;
            }
            else
            {
                $this->logout();
            }
        }
    }

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Auth($params);
        }
        return self::$_instance;
    }

    //Find users
    public
            function search($user = null)
    {
        if ($user)
        {
            $field = (is_numeric($user)) ? 'ID' : 'Username';

            $data = $this->_storage->select(array('*'), $this->_users, array($field, '=', $user));

            if ($data->count())
            {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    //check if user exists
    public
            function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    //Log users in
    public
            function login($username = null, $password = null, $remember = false)
    {

        if (!$username && !$password && $this->exists())
        {
            Session::set($this->_sessionName, $this->data()->ID);
        }
        else
        {

            $user = $this->search($username);
            if ($user)
            {

                if (Password::verify($password, $this->data()->Password))
                {
                    // password is correct

                    Session::set($this->_sessionName, $this->data()->ID);

                    if ($remember)
                    {
                        $hash      = Hash::unique();
                        $hashCheck = $this->_storage->select(array('*'), $this->_users, array('User_ID', '=', $this->data()->ID), 'LIMIT 1');

                        if (!$hashCheck->count())
                        {
                            $this->_storage->insert($this->_sessions, array(
                                'User_ID' => $this->data()->ID,
                                'Hash'    => $hash
                            ));
                        }
                        else
                        {
                            $hashCheck = $hashCheck->first()->Hash;
                        }

                        Cookie::set($this->_cookieName, $hash, $this->_cookieExpiry);
                    }

                    return true;
                }
            }
        }

        return false;
    }

    //User roles
    public
            function role($key)
    {

        $role = $this->_storage->select(array('*'), $this->_roles, array('ID', '=', $this->data()->Role_ID));

        if ($role->count())
        {
            $permissions = json_decode($role->first()->Role, true);

            if ($permissions[$key] == true)
            {
                return true;
            }
        }
        return false;
    }

    public
            function checkCookie()
    {
        /*
         * Check for cookies on client 
         * only if no session user-session (login-session) exists
         */
        if (Cookie::exists($this->_cookieName) && !Session::exists($this->_sessionName))
        {
            // Get hashed name from cookie on client
            // and check if hashed name exists in database 'Sessions'
            $hashCheck = $this->_storage->select(array('User_ID'), $this->_sessions, array('Hash', '=', $this->_cookieName), 'LIMIT 1');
            // Only if the query returns results then login the client
            if ($hashCheck->count())
            {
                // Get the user ID from the $hashCheck query and login the client/user
                $this->login($hashCheck->first()->User_ID);
            }
        }
    }

    public
            function checkLogin($url = null)
    {
        if ($this->isLoggedIn() == true)
        {
            return true;
        }
        else
        {
            Redirect::to($url);
        }
    }

    public
            function checkRole($key, $url = null)
    {
        if ($this->role($key) == true)
        {
            return true;
        }
        else
        {
            Redirect::to($url);
        }
    }

    public
            function logout()
    {
        if (Cookie::exists($this->_cookieName))
        {
            $this->_storage->delete($this->_sessions, array('User_ID', '=', $this->data()->ID));
        }
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public
            function data()
    {
        return $this->_data;
    }

    public
            function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

}
