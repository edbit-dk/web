<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'tsch75.wi3',
		'password' => '023101q0',
		'db' => 'tsch75_wi3_sde_dk'
	),
	'remember' => array(
		'cookie' => 'hash',
		'cokie_expiry' => 86400 
	),
	'session' => array(
		'session_name' => 'user'
	)
);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';	
});

require_once 'functions/sanitize.php';