<?php

class Controlpanel extends Controller {

    public function index() {

        // load models
        $user = $this->loadModel('UserModel');
        $feedback = Session::flash('feedback');
        if ($user->isLoggedIn() && $user->role('Admin')) {
            //load view
            $this->view('controlpanel/index', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
                    ), 'controlpanel', true);
        } else {
            Session::flash('feedback', '<p style="color: red;">Access denied!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function edit($params, $ID) {
        $class = ucfirst($params) . 'Model';
        $method = 'get' . $class;
        $model = $this->loadModel($class);
        $data = $model->$method($ID);
        $this->view('controlpanel/edit/' . $params, (object) array(
                    'data' => (object) $data
                ), 'controlpanel', true);
    }

    public function create($params) {
        $this->view('controlpanel/create/' . $params, null, 'controlpanel', true);
    }

    public function comments() {
        $model = $this->loadModel('CommentModel');
        $comments = $model->getComments();
        $this->view('controlpanel/comments', (object) array(
                    'comments' => (object) $comments
                ), 'controlpanel', true);
    }

    public function auctions() {
        $model = $this->loadModel('AuctionModel');
        $auctions = $model->getAuctions();
        $this->view('controlpanel/auctions', (object) array(
                    'auctions' => (object) $auctions
                ), 'controlpanel', true);
    }

    public function bids() {
        $model = $this->loadModel('BidModel');
        $bids = $model->getBids();
        $this->view('controlpanel/bids', (object) array(
                    'bids' => (object) $bids
                ), 'controlpanel', true);
    }
    
        public function users() {
        $model = $this->loadModel('UserModel');
        $users = $model->getUsers();
        $this->view('controlpanel/users', (object) array(
                    'users' => (object) $users
                ), 'controlpanel', true);
    }

}
