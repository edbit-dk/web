<?php

/*
 * Login, logut and login check functions
 */

/*
  The $source in this function is fx. a sql check in the database for the user input:
  $source =
  $result =
  sql(SELECT username, password FROM Users
  WHERE username = $username AND password = $passsword);
  = $source just has to return "true", to be accepted in the function.

  $Name is set for the session and cookie (if true!)

  $user_id is the user ID from database or anything unique.
  $role_id is role ID from database or anything unique.

 */

function login($source, $name = 'user', $user_id = 1, $role = 'role', $role_id = 1, $error = 'Login failed.', $success = 'Login successfull.', $cookie = false, $expiry = 1800)
{
    global $errors;
    global $feedback;

    if (isset($source))
    {
        $_SESSION[$name] = $user_id;
        $_SESSION[$role] = $role_id;
    }
    else
    {
        $errors[] = $error;
        return false;
    }

    if ($cookie === true)
    {
        setcookie($name, $user_id, time() + $expiry, '/');
        setcookie($role, $role_id, time() + $expiry, '/');
    }
    return $feedback[] = $success;
}

//checks if a session or cookie exists by the $name used in login() function
function login_auth($name = 'user', $error = 'You are not logged in.')
{
    global $errors;
    return (isset($_SESSION[$name]) || isset($_COOKIE[$name])) ? true : false;
}

// $role = name of session or cookie set in login. $role_id = requried ID to access
function role_check($role, $role_id = 1, $error = 'You do not have access.')
{
    global $errors;
    if (isset($_SESSION[$role]) OR isset($_COOKIE[$role]))
    {
        if ($_SESSION[$role] === $role_id OR $_COOKIE[$role] === $role_id)
        {
            return true;
        }
    }
    $errors[] = $error;
    return false;
}

// checks if a cookie or session is set, and deletes them
function logout($name, $role = 'role', $error = 'Logout failed.', $success = 'Logout successfull.')
{
    global $errors;
    global $feedback;
    if (isset($_SESSION[$name]) && isset($_COOKIE[$name]))
    {
        unset($_SESSION[$name]);
        setcookie($name, '', time() - 1);
        setcookie($role, '', time() - 1);
        unset($_SESSION[$role]);
        return $feedback[] = $success;
    }

    if (isset($_SESSION[$name]))
    {
        unset($_SESSION[$name]);
        unset($_SESSION[$role]);
        return $feedback[] = $success;
    }

    $errors[] = $error;
    return false;
}
