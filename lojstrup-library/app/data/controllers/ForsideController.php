<?php

class ForsideController extends Controller
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
        $events      = EventsModel::load(Database::load())->get(1, 'Front');
        $books       = BooksModel::load(Database::load())->get(1, 'Front');
        $info       = InfoModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/index',
            PATH_TEMPLATES . 'app/footer',
                ), null, (object) array(
                    'events'      => (object) $events,
                    'books'       => (object) $books,
                    'categories' => (object) $categories,
                    'info'       => (object) $info
        ));
    }


}
