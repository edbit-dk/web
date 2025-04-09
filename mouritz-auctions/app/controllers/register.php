<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author ThomasElvin
 */
class Register extends Controller {

    public function index() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            Session::flash('feedback', '<p style="color: green;">You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            $feedback = Session::flash('feedback');
            $auction_model = $this->loadModel('AuctionModel');
            // load views
            $this->view('register/index', (object) array(
                        'feedback' => (object) $feedback
            ));
        }
    }

    public function verify() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 32,
                    'notTaken' => USERS_TABLE
                ),
                'password' => array(
                    'required' => true,
                    'min' => 8,
                    'max' => 32,
                    'validPass' => Input::get('password')
                ),
                'email' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 254,
                    'validEmail' => Input::get('email'),
                    'notTaken' => USERS_TABLE
                ),
                'firstname' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 64
                ),
                'lastname' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 64
                ),
                'address' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 254
                ),
                'zipcode' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 32
                ),
                'phone' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 32
                )
            ));

            if ($validation->passed()) {
                try {
                    $user = $this->loadModel('UserModel');
                    $user->create(array(
                        USER_USERNAME => Input::encode(Input::get('username')),
                        USER_PASSWORD => Password::hash(Input::encode(Input::get('password'))),
                        USER_EMAIL => Input::encode(Input::get('email')),
                        USER_FIRSTNAME => Input::encode(Input::get('firstname')),
                        USER_LASTNAME => Input::encode(Input::get('lastname')),
                        USER_ADDRESS => Input::encode(Input::get('address')),
                        USER_ZIPCODE => Input::encode(Input::get('zipcode')),
                        USER_PHONE => Input::encode(Input::get('phone'))
                    ));

                    Session::flash('feedback', '<p style="color: green;" >You have been registered and can now login!</p>');

                    Redirect::to(URL . 'login');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
//                Session::flash('input', $_POST);
                Redirect::to(URL . 'register');
            }
        }
    }

}
