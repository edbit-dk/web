<?php

class Home extends Controller {

    public function index($limit = 2147483647) {
        // load model
        $user = $this->loadModel('User');
        $errors[] = Session::flash('errors');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // load views
            $model = $this->loadModel('News');
            $news = $model->getNewsByCompany($user->data()->Company_ID, $limit);

            $Company_ID = $user->data()->Company_ID;
            $album_model = $this->loadModel('Album');
            $albums = $album_model->getAlbumsByCompany($Company_ID, $limit);

            $this->view('home/index', (object) array(
                        'news' => (object) $news,
                        'albums' => (object) $albums
            ));
        }
    }

}
