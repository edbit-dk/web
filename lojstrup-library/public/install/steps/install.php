<?php

if (isset($_POST['database'])) {
    $type = $_POST['type'];
    $host = $_POST['host'];
    $database = $_POST['database'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    define('DB_TYPE', $type);
    define('DB_HOST', $host);
    define('DB_NAME', $database);
    define('DB_USER', $user);
    define('DB_PASS', $pass);

    class Setup {

        //Private DB Handler
        private $_db;

        //Singleton DB connection
        public function __construct() {
            $this->_db = Model::getInstance();

            //Create tables
            $tables = file_get_contents(URL . 'assets/files/Install_MVC-CMS.sql');

            $this->_db->query($tables);
        }

    }

    $app = new Setup();


    $file = fopen("assets/files/Setup.php", "w") or die("Unable to create Setup file!");
    $txt = "<?php\n\n";
    $txt .= "#Default Config\n\n";
    $txt .= "define('DB_TYPE', '$type');\n";
    $txt .= "define('DB_HOST', '$host');\n";
    $txt .= "define('DB_NAME', '$database');\n";
    $txt .= "define('DB_USER', '$user');\n";
    $txt .= "define('DB_PASS', '$pass');\n\n";
    $txt .=<<<DEFAULT
define('DEBUG', true);
DEFAULT;

    fwrite($file, $txt);
    fclose($file);


// Will copy foo/test.php to bar/test.php
// overwritting it if necessary
    copy('assets/files/Setup.php', '../Setup.php');
    unlink('assets/files/Setup.php');
    Redirect::to('index.php?step=setup');
} else {
    Redirect::to('index.php?step=welcome');
}