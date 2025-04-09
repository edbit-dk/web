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
        if ($user->isLoggedIn()) {
            Session::flash('feedback', '<p style="color: green;">You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            // load model
            $auction_model = $this->loadModel('AuctionModel');
            $feedback[] = Session::flash('feedback');
            // load views
            $this->view('login/index', (object) array(
                        'feedback' => (object) $feedback
            ));
        }
    }

    public function verify() {
//Login validation
        if (Input::exists()) {

            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username' => array('required' => true),
                'password' => array('required' => true)
            ));

            if ($validation->passed()) {
                $user = $this->loadModel('UserModel');
                $remember = (Input::get('remember') === 'on') ? true : false;
                $login = $user->login(Input::encode(Input::get('username')), Input::encode(Input::get('password')), $remember);

                if ($login && $user->role('Admin')) {
                    Session::flash('feedback', '<p style="color: green;">You have logged in successfully!</p>');
                    Redirect::to(URL . 'controlpanel');
                } elseif ($login) {
                    Session::flash('feedback', '<p style="color: green;">You have logged in successfully!</p>');
                    Redirect::to(URL . 'account');
                } elseif (!$login) {
                    Session::flash('feedback', '<p style="color: red;">Sorry. Login failed.</p>');
                    Redirect::to(URL . 'login');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Redirect::to(URL . 'login');
            }
        }
    }

}
