<?php

/*
 * Copyright (C) 2015 ThomasElvin
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of verify
 *
 * @author ThomasElvin
 */
class Verify extends Controller {

    public function login() {
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

                if ($login) {
                    Session::flash('feedback', '<p style="color: green;">You have logged in successfully!</p>');
                    Redirect::to(URL . '#controlpanel');
                } elseif (!$login) {
                    Session::flash('feedback', '<p style="color: red;">Sorry. Login failed.</p>');
                    Redirect::to(URL . '#login');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Redirect::to(URL . '#login');
            }
        }
    }

    public function register() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 5,
                    'max' => 32,
                    'notTaken' => 'Users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 5,
                    'max' => 32,
                    'validPass' => Input::encode(Input::get('password'))
                )
            ));

            if ($validation->passed()) {
                try {
                    $user = $this->loadModel('UserModel');
                    $user->create(array(
                        'Username' => Input::encode(Input::get('username')),
                        'Password' => Password::hash(Input::encode(Input::get('password'))),
                    ));

                    Session::flash('feedback', '<p style="color: green;" >You have been registered and can now login!</p>');

                    Redirect::to(URL . '#login');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Redirect::to(URL . '#register');
            }
        }
    }

}
