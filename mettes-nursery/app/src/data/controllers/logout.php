<?php

class Logout extends Controller {

    public function page() {
        $model = $this->loadModel('UserModel');
        $user = $model->logout();
        Cache::clear();
        Session::flash('FEEDBACK', '<p style="color: green;">Du er nu logget ud!</p>');
        Redirect::to(URL . 'log-ind');
    }

}
