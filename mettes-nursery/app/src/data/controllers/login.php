<?php

class Login extends Controller {

    public function page() {
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
                    Session::flash('FEEDBACK', '<p style="color: green;">Du er nu logget ind som admin!</p>');
                    Redirect::to(URL . 'admin');
                } elseif (Session::exists('order') && $login) {
                    Redirect::to(URL . 'create/order');
                } elseif ($login) {
                    Session::flash('FEEDBACK', '<p style="color: green;">Du er nu logget ind som kunde!</p>');
                    Cache::clear();
                    Redirect::to(URL . 'konto');
                } elseif (!$login) {
                    Session::flash('FEEDBACK', '<p style="color: red;">Beklager. Brugernavn eller adgangskode forkert.</p>');
                    Redirect::to(URL . 'log-ind');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('FEEDBACK', $errors);
                Redirect::to(URL);
            }
        }
    }

}
