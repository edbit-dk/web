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

$username = $_POST['username'];
$password = md5($_POST['password']);

$query  = "SELECT * FROM {$_prefix}_users WHERE username = '{$username}' AND password = '{$password}'";
//$con->query($query);
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$check  = mysqli_num_rows($result);

if ($check >= 1)
{
    $row = $result->fetch_assoc();

    $role_id = $row['role_id'];

    $user_id = $row['ID'];


    login($check, $name = $_user, $user_id, $role = 'role', $role_id);

    if (isset($_SESSION[$_cart]))
    {
        header('Location: ' . '?page=checkout');
        exit;
    }

    global $feedback;

    if (isset($feedback))
    {
        foreach ($feedback as $value)
        {
            echo $value;
        }
    }
    ?>
    <a class="btn btn-primary" href="?page=account">Konto</a>
<?php
}
else
{

    global $errors;

    if (isset($errors))
    {
        foreach ($errors as $error)
        {
            echo $error;
        }
    }
    echo 'Wrong input. Try again.';
}