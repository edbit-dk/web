<?php

class ArrangementController extends Controller
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
        $events     = EventsModel::load(Database::load())->read();
        $info       = InfoModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/events',
            PATH_TEMPLATES . 'app/footer',
                ), null, (object) array(
                    'events'     => (object) $events,
                    'categories' => (object) $categories,
                    'info'       => (object) $info
        ));
    }

    public
            function id($ID)
    {
        $categories = CategoriesModel::load(Database::load())->read();
        $event      = EventsModel::load(Database::load())->get($ID, 'ID', 'LIMIT 1');
        $info       = InfoModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/id/event',
            PATH_TEMPLATES . 'app/footer'
                ), null, (object) array(
                    'event'      => (object) $event,
                    'categories' => (object) $categories,
                    'info'       => $info
        ));
    }

}
