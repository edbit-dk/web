<?php

class KontaktController extends Controller
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
            function index()
    {
        $categories = CategoriesModel::load(Database::load())->read();
        $info       = InfoModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/contact',
            PATH_TEMPLATES . 'app/footer',
                ), null, (object) array(
                    'categories' => (object) $categories,
                    'info'       => (object) $info
        ));
    }

}
