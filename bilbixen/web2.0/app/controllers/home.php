<?php

/**
 * Class Home
 */
class Home extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $cars_model = $this->loadModel('CarModel');
        $cars = $cars_model->getRandomAllCarsByCategory();


        require TEMPLATES . 'header.php';
        require VIEWS . 'home/index.php';
        require TEMPLATES . 'footer.php';
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

}
