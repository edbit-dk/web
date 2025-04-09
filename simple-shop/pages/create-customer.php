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


$username = escape($_POST['username']);
$password = escape($_POST['password']);
$address = $_POST['address'];
$email = escape($_POST['email']);
$firstname = escape($_POST['firstname']);
$lastname = escape($_POST['lastname']);

$query_username = "SELECT Username FROM Users WHERE Username = '$username' LIMIT 1";
$query_result = mysqli_query($con, $query_username) or die(mysqli_error($con));
$check_username = mysqli_num_rows($query_result);

$query = "SELECT Username FROM Users WHERE Email = '$email' LIMIT 1";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$check_email = mysqli_num_rows($result);


$validate = 0;
$validate += is_email($email);
$validate += is_alphanumeric($password);
$validate += is_alphanumeric($firstname);
$validate += is_alphanumeric($lastname);
$validate += is_alphanumeric($username);
$validate += is_minlength($address, 10);


if ($check_username === 0 && $check_email === 0 && $validate >= 5)
    {
    $hashed_password = md5($password);

    $query = "
INSERT INTO Users (Username, Password, Address,  Email, Firstname, Lastname)
VALUES ('$username', '$hashed_password', '$address', '$email',  '$firstname', '$lastname')";
    //$con->query($query);
    mysqli_query($con, $query) or die(mysqli_error($con));
    }
else
    {
    echo 'Fejl i det indtastede. Prøv venligst igen.';
    ?>
    <input class="btn btn-primary" action="action" type="button" value="Prøv igen" onclick="history.go(-1);" />
    <?php
    exit();
    }
?>
<p>Success! Du kan logge ind nu.</p>
<a class="btn btn-success" href="?page=konto">Log ind</a>