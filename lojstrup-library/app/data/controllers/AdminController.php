<?php

class AdminController extends Controller
{

    /**
     * Construct this object by extending the basic Controller class
     */
    public
            function __construct()
    {
        parent::__construct();
        Auth::load(Database::load())->checkCookie();
        Auth::load(Database::load())->checkLogin(URL . 'auth/login');
        Auth::load(Database::load())->checkRole('Admin', URL . 'auth/login');
    }

    /**
     * Handles what happens when user moves to URL/default/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public
            function index()
    {
        $data = UsersModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'admin/header',
            PATH_VIEWS . 'admin/index',
            PATH_TEMPLATES . 'admin/footer',
                ), $data);
    }

    public
            function view($page)
    {
        $model = ucfirst($page) . 'Model';
        $data  = $model::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'admin/header',
            PATH_VIEWS . 'admin/' . $page,
            PATH_TEMPLATES . 'admin/footer',
                ), null, (object) array(
                    'data' => (object) $data
        ));
    }

    public
            function create($page, $data = null)
    {

        if (!is_null($data))
        {
            $model = ucfirst($data) . 'Model';
            $data  = $model::load(Database::load())->read();
        }
        $this->View->render(array(
            PATH_TEMPLATES . 'admin/header',
            PATH_VIEWS . 'admin/create/' . $page,
            PATH_TEMPLATES . 'admin/footer',
                ), null, (object) array(
                    'categories' => (object) $data
        ));
    }

    public
            function update($page, $ID, $data = null)
    {
        if (!is_null($data))
        {
            $model = ucfirst($data) . 'Model';
            $cat   = $model::load(Database::load())->read();
        }
        $model = ucfirst($page) . 'Model';
        $data  = $model::load(Database::load())->get($ID, 'ID', 'LIMIT 1');
        $this->View->render(array(
            PATH_TEMPLATES . 'admin/header',
            PATH_VIEWS . 'admin/update/' . $page,
            PATH_TEMPLATES . 'admin/footer',
                ), null, (object) array(
                    'categories' => (object) $cat,
                    'data'       => (object) $data
        ));
    }

}
