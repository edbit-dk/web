<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author ThomasElvin
 */
class Login extends Controller {

    public function index() {
        $user = $this->loadModel('UserModel');
        $errors[] = Session::flash('errors');
        // load views
        $this->view('login/index', (object) array(
                    'errors' => (object) $errors
        ));
    }

    public function check() {
//Login validation
        if (Input::exists()) {

            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username' => array('required' => true),
                'password' => array('required' => true)
            ));

            if ($validation->passed()) {
                $user = $this->loadModel('UserModel');
                $remember = (Input::escape(Input::get('remember')) === 'on') ? true : false;
                $login = $user->login(Input::escape(Input::get('username')), Input::escape(Input::get('password')), $remember);

                if ($login && $user->role('Admin')) {
                    Session::flash('errors', '<p style="color: green;">You have logged in successfully!</p>');
                    Redirect::to(URL . 'controlpanel');
                } elseif ($login) {
                    Session::flash('errors', '<p style="color: green;">You have logged in successfully!</p>');
                    Redirect::to(URL . 'login');
                } elseif(!$login) {
                    Session::flash('errors', '<p style="color: red;">Sorry. Login failed.</p>');
                    Redirect::to(URL . 'login');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('errors', $errors);
                Redirect::to(URL . 'login');
            }
        }
    }

}
