<?php
//Validate admin
function validate_admin(){
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    }
}

//Validate user
function validate_user() {
    if (isset($_SESSION['admin'])) {
        header("Location: admin");
    } elseif (isset($_SESSION['user'])) {
        header("Location: index.php");
    }
}