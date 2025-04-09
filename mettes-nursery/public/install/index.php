<?php
if(file_exists(APP. 'install/steps/'. $_GET['step'] . '.php')){
    require_once(APP. 'install/steps/'. $_GET['step'] . '.php');
} else {
    echo 'Welcome to setup <a href="index.php?step=1">Next</a>';
}