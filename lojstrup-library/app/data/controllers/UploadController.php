<?php

class UploadController extends Controller
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
            function file()
    {
        Upload::load(PATH_ROOT . 'public/uploads/')->file('file');
        var_dump(Upload::load()->errors());
              var_dump(Upload::load()->renames());
        //Upload::load(PATH_ROOT . 'public/uploads/')->clear();
    }

}
