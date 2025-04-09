<?php

class BookController extends Controller
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
                
            }

            if (!Upload::load()->errors())
            {

                BooksModel::load(Database::load())->create(array(
                    'Title'     => Input::get('Titel'),
                    'Author'    => Input::get('Forfatter'),
                    'ISBN'      => Input::get('ISBN'),
                    'Publisher' => Input::get('Udgiver'),
                    'Pages'     => Input::get('Sider'),
                    'Date'      => strtotime(Input::get('Udgivelse')),
                    'Text'      => Input::get('Tekst'),
                    'Short'     => Input::get('Short'),
                    'Img'       => $img,
                    'Cat_ID'    => Input::get('Kategori'),
                    'Front'     => Input::get('Front')
                ));
            }
            else
            {
                Session::set('ERRORS', Upload::load()->errors());
                Redirect::to(URL . 'create/book');
            }
        }
        Session::set('SUCCESS', 'Bog oprettet!');
        Redirect::to(URL . 'admin/view/books');
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
                    'Title'     => Input::get('Titel'),
                    'Author'    => Input::get('Forfatter'),
                    'ISBN'      => Input::get('ISBN'),
                    'Publisher' => Input::get('Udgiver'),
                    'Pages'     => Input::get('Sider'),
                    'Date'      => strtotime(Input::get('Udgivelse')),
                    'Text'      => Input::get('Tekst'),
                    'Short'     => Input::get('Short'),
                    'Img'       => Input::get('img'),
                    'Cat_ID'    => Input::get('Kategori'),
                    'Front'     => Input::get('Front')
                        ), Input::get('ID'));
            }
            else
            {
                Session::set('ERRORS', Upload::load()->errors());
                Redirect::to(URL . 'update/book/' . Input::get('ID' . '/categories'));
            }
        }
        Session::set('SUCCESS', 'Bog opdateret!');
        Redirect::to(URL . 'admin/view/books');
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
