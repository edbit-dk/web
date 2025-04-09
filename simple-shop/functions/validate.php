<?php

/* Validate functions in php using globals
 *
 * "global $errors" contains error messages you can use by defining a function
 * like this:
 *
  global $errors;
  valid_pass(')=#(U¤="#/¤?)');
 *
 * and then run a foreach on $errors to echo all the errors.
 *
  foreach ($errors as $value)
  {
  echo $value . '<br>';
  }
 *
 * You can change the error message by givin the function feedback arg. like:
 *
  global $errors;
  valid_pass('some_f3#¤#"ck_password', 'this is NOT a valid pass!');
 *
 * May the code be with you....
 *
 */

/**
 * valid email
 * @param   string
 * @return  boolean
 */
function is_email($val)
{
    return (bool) (preg_match("/^([a-z0-9+_-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix", $val));
}

/**
 * Matches alpha and numbers only
 * @param   string
 * @return  boolean
 */
function is_alphanumeric($val)
{
    global $errors;
    return (bool) preg_match("/^([a-zA-Z0-9])+$/i", $val);
}

/**
 * Check the string length has minimum length
 * @param   string
 * @return  boolean
 */
function is_minlength($val, $min)
{
    return (strlen($val) >= (int) $min);
}

/**
 * check string length exceeds maximum length
 * @param   string
 * @return  boolean
 */
function is_maxlength($val, $max)
{
    return (strlen($val) <= (int) $max);
}

function valid_max($input, $rule_value, $feedback = 'Input is to long.')
{
    global $errors;
    if (strlen($input) > $rule_value)
    {
        $errors[] = $feedback;
    }
    return true;
}

function valid_min($input, $rule_value, $feedback = 'Input is to short.')
{
    global $errors;
    if (strlen($input) < $rule_value)
    {
        return $errors[] = $feedback;
    }
    return true;
}

function valid_number($input, $feedback = 'Input is not a number.')
{
    global $errors;
    if (!filter_var($input, FILTER_VALIDATE_INT))
    {

        return $errors[] = $feedback;
    }
    return true;
}

function valid_matches($input, $source, $feedback = 'Input does not match.')
{
    global $errors;
    if ($input != $source)
    {
        return $errors[] = $feedback;
    }
    return true;
}

function required($input = array(), $feedback = 'Fill out required fields.')
{
    global $errors;
    foreach ($input as $value)
    {
        if (empty($value))
        {
            return $errors[] = $feedback;
        }
    }
    return true;
}
