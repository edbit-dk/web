<?php

/* 
 * Copyright (C) 2015 thom855j
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


function is_in_array($array, $key, $key_value)
{
    $within_array = false;
    foreach ($array as $k => $v)
    {
        if (is_array($v))
        {
            $within_array = is_in_array($v, $key, $key_value);
            if ($within_array == true)
            {
                break;
            }
        }
        else
        {
            if ($v == $key_value && $k == $key)
            {
                $within_array = true;
                break;
            }
        }
    }
    return $within_array;
}

/**
 * replace any value in $array specified by $key with $value
 *
 * @return array array with replaced values
 */
function replace_recursive(Array $array, $key, $value)
{
    array_walk_recursive($array, function(&$v, $k) use ($key, $value)
        {$k == $key && $v = $value;});
    return $array;
}

# usage:
//$array = replace_recursive($array, 'something', 'replaced');