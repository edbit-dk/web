<?php

class Account extends Controller {

    public function index() {
        // load model
        $user = $this->loadModel('User');
        $errors[] = Session::flash('errors');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // load views
            $this->view('account/index', (object) array(
                        'user' => $user,
                        'errors' => $errors
            ));
        }
    }

    public function register() {
        // load model
        $user = $this->loadModel('User');

        if ($user->isLoggedIn()) {
            Session::flash('errors', '<p>You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            // errors feedback
            $errors = Session::flash('errors');
            $input = Session::flash('input');
            // load view
            $this->view('account/register', (object) array(
                        'errors' => (object) $errors,
                        'input' => (object) $input
            ));
        }
    }

    public function login() {
        $user = $this->loadModel('User');
        if ($user->isLoggedIn()) {
            Session::flash('errors', '<p>You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            $errors = Session::flash('errors');

            // load views
            $this->view('account/login', (object) array(
                        'errors' => (object) $errors
            ));
        }
    }

    public function profile() {
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/profile', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
            ));
        }
    }

    public function settings() {
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
            ));
        }
    }

    public function change() {
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/change', (object) array(
                        'errors' => (object) $errors,
                        'user' => (object) $user
            ));
        }
    }

    public function uploads($limit = 2147483647) {
        // load model
        $user = $this->loadModel('User');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // errors feedback
            $errors = Session::flash('errors');
            $input = Session::flash('input');

            $ID = $user->data()->ID;
            $Company_ID = $user->data()->Company_ID;
            $upload_model = $this->loadModel('Upload');
            $uploads = $upload_model->getUploadsByUser($ID, $limit);
            
            $album_model = $this->loadModel('Album');
            $albums = $album_model->getAllAlbumsByCompany($Company_ID, $limit);
            
            $type_model = $this->loadModel('Type');
            $types = $type_model->getTypes($Company_ID, $limit);
        }
        // load view
        $this->view('account/uploads', (object) array(
                    'errors' => (object) $errors,
                    'input' => (object) $input,
                    'uploads' => (object) $uploads,
                    'albums' => (object) $albums,
                    'types' => (object) $types
        ));
    }

}
