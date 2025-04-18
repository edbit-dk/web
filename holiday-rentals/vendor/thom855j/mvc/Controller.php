<?php

namespace thom855j\mvc ;

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 * Whenever a controller is created, we also
 * 1. initialize a session
 * 2. check if the user is not logged in anymore (session timeout) but has a cookie
 */
class Controller
{

    /** @var View View The view object */
    public
            $View ;

    /**
     * Construct the (base) controller. This happens when a real controller is constructed, like in
     * the constructor of IndexController when it says: parent::__construct();
     */
    public
            function __construct()
    {
        // always initialize a session
        if ( session_id() == '' )
        {
            session_start() ;
        }
        
        // create a view object to be able to use it inside a controller, like $this->View->render();
        $this->View = new View() ;
    }

}
