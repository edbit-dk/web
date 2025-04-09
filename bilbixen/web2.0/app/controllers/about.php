<?php

/**
 * Class About
 */
class About extends Controller {
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/about/index
     */
    public function index()
    {
         // load views. 
        require TEMPLATES . 'header.php';
        require VIEWS . 'about/index.php';
        require TEMPLATES . 'footer.php';
    }

}
