<?php

class Blog extends Controller {

    public function index() {
        // load model
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // load views
            $model = $this->loadModel('News');
            $news = $model->getAllNews();

            $this->view('blog/index', (object) array(
                        'news' => (object) $news
            ));
        }
    }

    public function read($ID) {
        $news_model = $this->loadModel('News');
        $news = $news_model->getNews($ID);

        $comment_model = $this->loadModel('Comment');
        $comments = $comment_model->getComment($ID);

        $errors = Session::flash('errors');

        $this->view('blog/read', (object) array(
                    'news' => (object) $news,
                    'comments' => (object) $comments,
                    'errors' => (object) $errors
        ));
    }

    public function edit($ID) {
        $model = $this->loadModel('News');
        $news = $model->getNews($ID);

        $this->view('blog/edit', (object) array(
                    'news' => (object) $news
        ));
    }

    public function delete($ID) {
        $model = $this->loadModel('News');
        $news = $model->delete($ID);

        Session::flash('errors', '<p>News deleted successfully!</p>');
        Redirect::to(URL . 'controlpanel/news');
    }

    public function create() {
        if (Input::exists()) {
            try {
                $comment = $this->loadModel('News');
                $comment->create(array(
                    'Name' => Input::escape(Input::get('Name')),
                    'Content' => Input::escape(Input::get('Content')),
                    'Date' => date('Y-m-d H:i:s'),
                    'User_ID' => Input::escape(Input::get('User')),
                    'Company_ID' => Input::escape(Input::get('Company')),
                    'Sticky' => Input::escape(Input::get('Sticky'))
                ));

                Session::flash('errors', "<p>News added successfully!</p>");
                Redirect::to(URL . 'controlpanel/news' . Input::escape(Input::get('News')));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            Session::flash('input', $_POST);
            Redirect::to(URL . 'blog/read/' . Input::escape(Input::get('News')));
        }
    }

}
