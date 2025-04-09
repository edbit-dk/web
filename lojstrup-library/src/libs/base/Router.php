<?php

/*
 * Router Class 
 *  
 * responsible for fechting the write controller-classes  
 * and methods according to the "index.php?url=[controller class]/[method]/[parameters]"  URL. 
 * protected $variable = Only accessible inside this class and childs! 
 */

class Router implements HTTPInterface
{

    // object instance
    private static
            $_instance = null;
    // variable containing error controller 
    protected
            $controller = 'DefaultController';
    // variable containing default controller 
    protected
            $defaultController = 'default';
    // variable containing an empty array as default  
    protected
            $params = array();
    // variable containing default method name 
    protected
            $method = 'index';

    public static
            function load($frontcontroller, $controllers)
    {

        if (!isset(self::$_instance))
            {
            self::$_instance = new Router($frontcontroller, $controllers);
            }


        return self::$_instance;
    }

    /*
     * fetching the controller class and its methods  
     * happens in the contructer doing every run 
     */

    public
            function __construct($name = 'url', $path = null)
    {
        // use this class method to parse the $_GET[url] 
        $url = self::get($name);
        if (isset($url))
            {
            $controllerName = ucfirst($url[0]);
            }
        else
            {
            $url = array($this->defaultController);
            $controllerName = ucfirst($url[0]);
            }
        // checks if a controller by the name from the URL exists 
        if (ctype_lower(str_replace('_', '', $url[0])) && file_exists($path . $controllerName . 'Controller.php'))
            {

            // if exists, use this as the controller instead of default 
            $this->controller = $controllerName . 'Controller';

            /*
             * destroys the first URL parameter, 
             *  to leave it like index.php?url=[0]/[1]/[parameters in array seperated by "/"] 
             */
            unset($url[0]);
            }


        // use the default controller if file NOT exists, or else use the controller name from the URL 
        require_once $path . $this->controller . '.php';

        // initiate the controller class as an new object 
        $this->controller = new $this->controller;

        // checks for if a second url parameter like index.php?url=[0]/[1] is set 
        if (isset($url[1]))
            {

            // then check if an according method exists in the controller from $url[0] 
            if (method_exists($this->controller, $url[1]))
                {

                // if exists, use this as the method instead of default 
                $this->method = $url[1];

                /*
                 * destroys the second URL, to leave only the parameters 
                 *  left like like index.php?url=[parameters in array seperated by "/"] 
                 */
                unset($url[1]);
                }
            }

        /*
         * checks if the $_GET['url'] has any parameters left in the   
         * index.php?url=[parameters in array seperated by "/"]. 
         * If it has, get all the values. Else, just parse is as an empty array. 
         */
        $this->params = $url ? array_values($url) : array();

        /*
         * 1. call/execute the controller and it's method.  
         * 2. If the Router has NOT changed them, use the default controller and method. 
         * 2. if there are any params, return these too. Else just return an empty array. 
         */
        call_user_func_array(array($this->controller, $this->method),
                $this->params);
    }

    /*
     * The parUrl method is responsible for getting the $_GET['url']-parameters  
     * as an array, for sanitizing it for anything we don't want and removing "/"-slashes  
     * after the URL-parameter 
     */

    public static
            function get($name, $array = true)
    {

        if (isset($_GET[$name]) && $array === true)
            {
            return explode('/',
                    filter_var(rtrim(str_replace('-', '_', $_GET[$name]), '/'),
                            FILTER_SANITIZE_URL));
            }

        if (isset($_GET[$name]) && $array === false)
            {
            return filter_var(rtrim($_GET[$name], '/'), FILTER_SANITIZE_URL);
            }
    }

    public static
            function post($name)
    {
        if (isset($_POST[$name]))
            {
            return filter_var($_POST[$name], FILTER_SANITIZE_STRING);
            }
    }

    public static
            function delete($method = false)
    {
        if ($method === false)
            {
            $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
            return header('Location: ' . $root);
            }
        if ($method === 'php')
            {
            $url = filter_var($_SERVER['HTTP_REFERER'], FILTER_SANITIZE_URL);
            return header('Location: ' . $url);
            }
        if ($method === 'js')
            {
            return header('Location: javascript://history.go(-1)');
            }
    }

    public static
            function put($name)
    {
        $url = filter_var($name, FILTER_SANITIZE_URL);
        return header('Location: ' . $url);
    }

}
