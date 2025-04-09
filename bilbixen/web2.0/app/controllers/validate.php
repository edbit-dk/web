<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validate
 *
 * @author ThomasElvin
 */
class Validate extends Controller {

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

                if ($login) {
                    Session::flash('errors', '<p>You have logged in successfully.</p>');
                    Redirect::to(URL . 'controlpanel');
                } else {
                    Session::flash('errors', 'Sorry. Login failed.');
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
