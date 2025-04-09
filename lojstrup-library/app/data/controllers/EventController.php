<?php

class EventController extends Controller
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
            Upload::load(PATH_ROOT . 'public/uploads/')->filename('file');


            foreach (Upload::load()->renames() as $img)
            {
                $_POST['img'] = $img;
            }


            if (!Upload::load()->errors())
            {

                CommentsModel::load(Database::load())->create(array(
                    'Title'    => Input::get('Titel'),
                    'Date'     => Input::get('Dato'),
                    'Img'      => Input::get('Billede'),
                    'Speaker'  => Input::get('Taler'),
                    'Text'     => Input::get('Tekst'),
                    'Location' => Input::get('Location'),
                    'Fee'      => Input::get('Entre'),
                    'Img'      => Input::get('img'),
                    'Front'    => Input::get('Front'),
                ));
            }
            else
            {
                Session::set('ERRORS', Upload::load()->errors());
                Redirect::to(URL . 'admin/view/events');
            }
        }
        Session::set('SUCCESS', 'Event oprettet!');
        Redirect::to(URL . 'admin/view/events');
    }

    public
            function update()
    {
        If (Input::exists())
        {

            Upload::load(PATH_ROOT . 'public/uploads/')->filename('file');


            foreach (Upload::load()->renames() as $img)
            {
                $_POST['img'] = $img;
            }


            if (!Upload::load()->errors())
            {

                BooksModel::load(Database::load())->update(array(
                    'Title'    => Input::get('Titel'),
                    'Date'     => Input::get('Dato'),
                    'Img'      => Input::get('Billede'),
                    'Speaker'  => Input::get('Taler'),
                    'Text'     => Input::get('Tekst'),
                    'Location' => Input::get('Placering'),
                    'Fee'      => Input::get('Entre'),
                    'Img'      => Input::get('img'),
                    'Front'    => Input::get('Front'),
                        ), Input::get('ID'));
            }
            else
            {
                Session::set('ERRORS', Upload::load()->errors());
                Redirect::to(URL . 'admin/view/events');
            }
        }
        Session::set('SUCCESS', 'Event opdateret!');
        Redirect::to(URL . 'admin/view/events');
    }

    public
            function remove($ID)
    {
        $data = BooksModel::load(Database::load())->get($ID, 'ID', 'LIMIT 1');
        Upload::load(PATH_ROOT . 'public/uploads/')->remove($data[0]->Img);
        BooksModel::load(Database::load())->delete($ID);
        Session::set('SUCCESS', 'Bog slettet!');
        Redirect::to(URL . 'admin/view/books');
    }

}
