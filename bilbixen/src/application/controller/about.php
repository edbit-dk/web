<?php

/**
 * Class About
 */
class About extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/about/index
     */
    public function index()
    {
        // load views. 
        require 'application/views/_templates/header.php';
        require 'application/views/about/index.php';
        require 'application/views/_templates/footer.php';
    }

}
