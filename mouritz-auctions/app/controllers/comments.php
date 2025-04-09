<?php

class Comments extends Controller {

    public function index() {
        // load model
        // load views
        $model = $this->loadModel('CommentModel');
        $comments = $model->getComments();

        $this->view('comments/index', (object) array(
                    'comments' => (object) $comments
        ));
    }

    public function read($ID) {
        $model = $this->loadModel('News');
        $news = $model->getNews($ID);

        $feedback[] = Session::flash('feedback');

        $this->view('blog/read', (object) array(
                    'news' => (object) $news,
                    'feedback' => (object) $feedback
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

        Session::flash('feedback', '<p>Comment deleted successfully!</p>');
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

                Session::flash('feedback', "<p>Comment added successfully!</p>");
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
