<?php

class ErrorController extends Controller
{

    /**
     * Construct this object by extending the basic Controller class
     */
    public
            function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/default/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public
            function index($ID = 404)
    {
        /*
         * This is just an example how to redirect if a controller not exists. 
         * When using a database, you would only need ONE controller to do everything
         * like in MVC CMS
         */

            $this->View->render($ID); 
    }

}
