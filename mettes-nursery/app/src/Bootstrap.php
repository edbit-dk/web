<?php

// Autoload universal classes 
spl_autoload_register(function($class) {
    require_once(LIBS . $class . '.php');
});

class Options {

    //Private DB Handler
    private $_db;

    //Singleton DB connection
    public function __construct() {
        $this->_db = DB::getInstance();
        //Get all options
        $this->_db->get(array('*'), 'Options', null);
        $options = $this->_db->results();

        foreach ($options as $config) {
            define("$config->Name", $config->Value);
        }
    }

}

$app = new Options();

// Load config files
foreach (glob(CONFIG . '*.php') as $config) {
    require_once($config);
}

if (file_exists(THEME_FOLDER . 'functions.php')) {
    require_once(THEME_FOLDER . 'functions.php');
}


session_start();
//check for cookies 
if (Cookie::exists(COOKIE_NAME) && !Session::exists(SESSION_NAME)) {
    $hash = Cookie::get(COOKIE_NAME);
    $hashCheck = DB::getInstance()->get(array('*'), SESSIONS_TABLE, array(SESSION_HASH, '=', $hash));

    if ($hashCheck->count()) {
        require_once(MODELS . 'UserModel.php');
        $User_ID = SESSION_USER_ID;
        $user = New UserModel($hashCheck->first()->$User_ID);
        $user->login();
    }
}

//Check for user activity
if (Session::exists('LAST_ACTIVITY') && (time() - Session::get('LAST_ACTIVITY') > SESSION_EXPIRY)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    Session::flash('FEEDBACK', '<p style="color: red;">Session udløb. Login igen eller vælg "husk mig".</p>');
}

Session::put('LAST_ACTIVITY', time()); // update last activity time stamp

if (!Session::exists('CREATED')) {
    Session::put('CREATED', time());
} else if (time() - Session::get('CREATED') > SESSION_EXPIRY) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    Session::put('CREATED', time()); // update creation time
}
