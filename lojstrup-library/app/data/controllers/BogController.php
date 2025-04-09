<?php

class BogController extends Controller
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
        $book       = BooksModel::load(Database::load())->read();
        $info       = InfoModel::load(Database::load())->read();
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/book',
            PATH_TEMPLATES . 'app/footer'
                ), null, (object) array(
                    'book'       => (object) $book,
                    'categories' => (object) $categories,
                    'info'       => $info
        ));
    }
    
        public
            function id($url)
    {
        $ID = filter_var($url, FILTER_SANITIZE_STRING);
        $categories = CategoriesModel::load(Database::load())->read();
        $comments   = CommentsModel::load(Database::load())->get($ID, 'Book_ID', 'AND Active = 1');
        $book       = BooksModel::load(Database::load())->get($ID, 'ID', 'LIMIT 1');
        $info       = InfoModel::load(Database::load())->read();
        $rating = RatingsModel::load(Database::load())->get($ID);
        $this->View->render(array(
            PATH_TEMPLATES . 'app/header',
            PATH_TEMPLATES . 'app/sidebar-left',
            PATH_VIEWS . 'app/id/book',
            PATH_TEMPLATES . 'app/footer'
                ), null, (object) array(
                    'book'       => (object) $book,
                    'comments'   => (object) $comments,
                    'categories' => (object) $categories,
                    'info'       => $info,
                    'rating' => $rating
        ));
    }

}
