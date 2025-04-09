<?php

class Controlpanel extends Controller {

    public function index() {
        // load models
        $user = $this->loadModel('User');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn() && $user->role('Admin') || $user->role('SuperAdmin')) {
            //load view
            $this->view('controlpanel/index', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
            ));
        } else {
            Redirect::to(URL . 'account');
        }
    }

    public function edit($params, $ID) {
        $class = ucfirst($params);
        $method = 'get' . $class;
        $model = $this->loadModel($class);
        $data = $model->$method($ID);
        $this->view('controlpanel/edit/' . $params, (object) array(
                    'data' => (object) $data
        ));
    }

    public function create($params, $limit = 10) {
        if ($params == 'signup') {
            $user = $this->loadModel('User');
            if ($user->role('SuperAdmin')) {
                $model = $this->loadModel('User');
                $data = $model->getAllUsers($limit);
            } else {
                $ID = $user->data()->Company_ID;
                $model = $this->loadModel('User');
                $data = $model->getAllUsersByCompany($ID, $limit);
            }
        }
        $this->view('controlpanel/create/' . $params, (object) array(
                    'data' => (object) $data
        ));
    }

    public function comments() {
        // load model

        $model = $this->loadModel('Comment');
        $data = $model->getAllComments();
        // load views
        $this->view('controlpanel/comments', (object) array(
                    'comments' => (object) $data
        ));
    }

    public function events($limit = 10) {
        $user = $this->loadModel('User');
        if ($user->role('SuperAdmin')) {
            $model = $this->loadModel('Event');
            $events = $model->getAllEvents($limit);
            $errors[] = Session::flash('errors');
        } else {
            $Company_ID = $user->data()->Company_ID;
            $User_ID = $user->data()->ID;
            $events_model = $this->loadModel('Event');
            $events = $events_model->getEventsByCompany($Company_ID, $User_ID, $limit);
            $errors[] = Session::flash('errors');
        }
        $this->view('controlpanel/events', (object) array(
                    'events' => (object) $events,
                    'errors' => (object) $errors
        ));
    }

    public function users($limit = 10) {
        //load model
        $user = $this->loadModel('User');
        if ($user->role('SuperAdmin')) {
            $model = $this->loadModel('User');
            $users = $model->getAllUsers($limit);
        } else {
            $ID = $user->data()->Company_ID;
            $model = $this->loadModel('User');
            $users = $model->getAllUsersByCompany($ID, $limit);
        }
        $this->view('controlpanel/users', (object) array(
                    'users' => (object) $users
        ));
    }

    public function news() {
        //load model
        $model = $this->loadModel('News');
        $news = $model->getAllNews();

        $errors[] = Session::flash('errors');

        $this->view('controlpanel/news', (object) array(
                    'news' => (object) $news,
                    'errors' => (object) $errors
        ));
    }

    public function signups($ID) {
        //load model
        $model = $this->loadModel('Signup');
        $users = $model->getAllSignups($ID, $limit = 2147483647);

        $errors[] = Session::flash('errors');

        $this->view('controlpanel/signups', (object) array(
                    'users' => (object) $users,
                    'errors' => (object) $errors
        ));
    }

    public function uploads($limit = 2147483647) {
        //load model
        $user = $this->loadModel('User');
        $ID = $user->data()->Company_ID;

        $model = $this->loadModel('Upload');
        $data = $model->getUploadsByCompany($ID, $limit);

        $this->view('controlpanel/uploads', (object) array(
                    'uploads' => (object) $data
        ));
    }

}
