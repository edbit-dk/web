<?php

class InfoController extends Controller
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
        Redirect::to(URL);
    }

    public
            function create()
    {
        If (Input::exists())
        {

            InfoModel::load(Database::load())->create(array(
                'About'   => Input::get('Om'),
                'Terms'   => Input::get('Retningslinjer'),
                'Address' => Input::get('Adresse'),
                'Open'    => Input::get('Åbningstider'),
                'Phone'   => Input::get('Telefon'),
                'Fax'     => Input::get('Fax'),
                'Email'   => Input::get('Email'),
            ));
        }
              Session::set('SUCCESS', 'Info opdateret!');
        Redirect::to(URL . 'admin/view/info');
    }

    public
            function update()
    {
        If (Input::exists())
        {

            InfoModel::load(Database::load())->update(array(
                'About'   => Input::get('About'),
                'Terms'   => Input::get('Terms'),
                'Address' => Input::get('Adresse'),
                'Open'    => Input::get('Open'),
                'Phone'   => Input::get('Telefon'),
                'Fax'     => Input::get('Fax'),
                'Email'   => Input::get('Email'),
            ), Input::get('ID'));
        }
        Session::set('SUCCESS', 'Info opdateret!');
        Redirect::to(URL . 'admin/view/info');
    }

}
