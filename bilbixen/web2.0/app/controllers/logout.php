<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author ThomasElvin
 */
class Logout extends Controller {

    public function index() {
        $model = $this->loadModel('UserModel');
        $user = $model->logout();
        Session::flash('errors', '<p style="color: green;">You have logged out successfully!</p>');
        Redirect::to(URL . 'login');
    }

}
