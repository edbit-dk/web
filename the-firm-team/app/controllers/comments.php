<?php

class Comments extends Controller {

    public function index() {
        // load model
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // load views
            $model = $this->loadModel('Comment');
            $data = $model->getAllComments();

            $this->view('controlpanel/comments', (object) array(
                        'comments' => (object) $data
            ));
        }
    }

    public function read($ID) {
        $model = $this->loadModel('News');
        $news = $model->getNews($ID);

        $errors[] = Session::flash('errors');

        $this->view('blog/read', (object) array(
                    'news' => (object) $news,
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
        $model = $this->loadModel('Comment');
        $news = $model->delete($ID);

        Session::flash('errors', '<p>Comment deleted successfully!</p>');
        Redirect::to(URL . 'controlpanel/comments');
    }

    public function create() {
        if (Input::exists()) {
            try {
                $comment = $this->loadModel('Comment');
                $comment->create(array(
                    'Content' => Input::escape(Input::get('Comment')),
                    'Date' => date('Y-m-d H:i:s'),
                    'User_ID' => Input::escape(Input::get('User')),
                    'News_ID' => Input::escape(Input::get('News'))
                ));

                Session::flash('errors', "<p>Comment added successfully!</p>");
                Redirect::to(URL . 'blog/read/' . Input::escape(Input::get('News')));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            Session::flash('input', $_POST);
            Redirect::to(URL . 'blog/read/' . Input::escape(Input::get('News')));
        }
    }

}
