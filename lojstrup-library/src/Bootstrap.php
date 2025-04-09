<?php

/*
 * Bootstrap file responsible for requiring all required files
 * and setting op basic usage functionality
 */

class Bootstrap
{

    private
            $_storage;
    protected static
            $_instance = null;

    public static
            function load($root)
    {

        if (!isset(self::$_instance))
            {
            self::$_instance = new Bootstrap($root);
            }


        return self::$_instance;
    }

    public
            function __construct($root, $theme = null)
    {
        // autoload with the (optional) Composer auto-loader if it exists
        if (file_exists($root . 'vendor/autoload.php'))
            {
            require_once($root . 'vendor/autoload.php');
            }
        else
            {
            // Default Autoloader
            spl_autoload_register(function ($file)
                {
                $directories = unserialize(AUTOLOAD_PATHS);
                foreach ($directories as $dir)
                    {
                    $path = PATH_ROOT . "/{$dir}/{$file}.php";
                    if (file_exists($path))
                        {
                        require_once $path;
                        }
                    }
                });
            }

        // load the theme's 'functions.php'-file if it exists
        if (file_exists($theme . 'functions.php'))
            {
            require_once($theme . 'functions.php');
            }
    }

    public
            function config($folder)
    {

        // Load config files 
        foreach (glob($folder . '*.php') as $config)
            {
            require_once($config);
            }
    }

    public
            function remote($storage, $location)
    {
        // Set remote storage
        $this->_storage = $storage;

        // Get all options from remote storage
        $this->_storage->select(array('*'), $location, null);

        // Return option results from database
        $options = $this->_storage->results();

        // Set af define() for each option
        foreach ($options as $config)
            {
            define("$config->Name", $config->Value);
            }
    }

}
