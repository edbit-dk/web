<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controlpanel extends Controller {

    function index() {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn() && $user->role('Admin')) {

            //load view 
            $this->view('controlpanel/index', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to be admin. Login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function ads() {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn()) {

            $model = $this->loadModel('CarModel');
            $cars = $model->getCars();
            //load view 
            $this->view('controlpanel/cars', (object) array(
                        'cars' => (object) $cars,
                        'errors' => (object) $errors,
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function comments() {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn()) {

            $model = $this->loadModel('CommentModel');
            $comments = $model->getComments();
            //load view 
            $this->view('controlpanel/comments', (object) array(
                        'comments' => (object) $comments,
                        'errors' => (object) $errors
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function messages() {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn()) {

            $model = $this->loadModel('ContactModel');
            $messages = $model->getMessages();
            //load view 
            $this->view('controlpanel/messages', (object) array(
                        'messages' => (object) $messages,
                        'errors' => (object) $errors
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function comment($ID) {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn()) {

            $model = $this->loadModel('CommentModel');
            $comment = $model->readComment($ID);
            //load view 
            $this->view('controlpanel/comment', (object) array(
                        'comment' => (object) $comment
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function departments() {
        // load models 
        $user = $this->loadModel('UserModel');
        $errors = Session::flash('errors');
        if ($user->isLoggedIn()) {

            $model = $this->loadModel('DepartmentModel');
            $departments = $model->getDepartments();
            //load view 
            $this->view('controlpanel/departments', (object) array(
                        'departments' => (object) $departments,
                        'errors' => (object) $errors
                    ), 'backend');
        } else {
            Session::flash('errors', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function editcar($ID) {

        $car_model = $this->loadModel('CarModel');
        $cars = $car_model->getCarAndCategory($ID);


        $this->view('controlpanel/edit/car', (object) array(
                    'cars' => (object) $cars
                ), 'backend');
    }

    public function editdepartment($ID) {

        $deb_model = $this->loadModel('DepartmentModel');
        $deb = $deb_model->getDepartment($ID);


        $this->view('controlpanel/edit/department', (object) array(
                    'deb' => (object) $deb
                ), 'backend');
    }

    public function create($params) {
        $model = $this->loadModel('CarModel');
        $data = $model->getCategories();
        $this->view('controlpanel/create/' . $params, (object) array(
                    'categories' => (object) $data
                ), 'backend');
    }

}
