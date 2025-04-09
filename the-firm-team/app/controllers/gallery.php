<?php

class Gallery extends Controller {

    public function index($uploads_limit = 1, $album_limit = 2147483647) {
        // load model
        $user = $this->loadModel('User');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $Company_ID = $user->data()->Company_ID;
            $upload_model = $this->loadModel('Upload');
            $uploads = $upload_model->getUploadsByCompany($Company_ID, $uploads_limit);
            $album_model = $this->loadModel('Album');
            $albums = $album_model->getAlbumsByCompany($Company_ID, $album_limit);

            $this->view('gallery/index', (object) array(
                        'uploads' => (object) $uploads,
                        'albums' => (object) $albums
            ));
        }
    }

    public function album($Album_ID, $limit = 2147483647) {
        $user = $this->loadModel('User');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $Company_ID = $user->data()->Company_ID;
            $upload_model = $this->loadModel('Upload');
            $uploads = $upload_model->getUploadsByAlbum($Company_ID, $Album_ID, $limit);

            $this->view('gallery/album', (object) array(
                        'uploads' => (object) $uploads
            ));
        }
    }

    public function pictures($limit = 2147483647) {
        // load model
        $user = $this->loadModel('User');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $Company_ID = $user->data()->Company_ID;
            $upload_model = $this->loadModel('Upload');
            $uploads = $upload_model->getUploadsByCompany($Company_ID, $limit);

            $this->view('gallery/pictures', (object) array(
                        'uploads' => (object) $uploads
            ));
        }
    }

}
