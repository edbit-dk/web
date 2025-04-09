<?php

try {
    $conn = new PDO($_POST['type'] . ':host=' . $_POST['host'] . ';dbname=' . $_POST['database'], $_POST['user'], $_POST['pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    Session::set('FEEDBACK_ERROR', '<p style="color: red;">Test failed. Check input!</p>');
    Session::set('type', $_POST['type']);
    Session::set('host', $_POST['host']);
    Session::set('database', $_POST['database']);
    Session::set('user', $_POST['user']);
    Session::set('pass', $_POST['pass']);

    Redirect::to(URL . 'index.php?step=welcome');
    exit();
}
Session::set('type', $_POST['type']);
Session::set('host', $_POST['host']);
Session::set('database', $_POST['database']);
Session::set('user', $_POST['user']);
Session::set('pass', $_POST['pass']);
Session::set('FEEDBACK_SUCCESS', '<p style="color: green;">Test successfull! Click Install to continue.</p>');
Redirect::to(URL . 'index.php?step=welcome');
