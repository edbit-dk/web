<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('setup.php');

require_once('templates/header.php');
if (isset($_GET['page']))
{
    if (file_exists('pages/' . $_GET['page'] . '.php'))
    {
        require_once 'pages/' . $_GET['page'] . '.php';
    }
}
else
{
    require_once 'pages/home.php';
}
require_once('templates/footer.php');