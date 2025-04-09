<?php

class CommentController extends Controller
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

            CommentsModel::load(Database::load())->create(array(
                'Date'    => time(),
                'Name'    => Input::get('Navn'),
                'Text'    => Input::get('Tekst'),
                'Book_ID' => Input::get('Bog_ID')
            ));
        }
        Session::set('INFO', 'Tak for din kommentar. Når den er blevet godkendt, vil den blive vist.');
        Redirect::to(URL . 'bog/id/' . Input::get('Bog_ID'));
    }

    public
            function update()
    {
        If (Input::exists())
        {
            CommentsModel::load(Database::load())->update(array(
                'Text'   => Input::get('text'),
                'Active' => Input::get('Active')
                    ), Input::get('ID'));
        }
        Session::set('SUCCESS', 'Kommentar opdateret.');
        Redirect::to(URL . 'admin/view/comments');
    }

    public
            function remove($ID)
    {

        CommentsModel::load(Database::load())->delete($ID);
        Session::set('SUCCESS', 'Kommentar slettet.');
        Redirect::to(URL . 'admin/view/comments');
    }

}
