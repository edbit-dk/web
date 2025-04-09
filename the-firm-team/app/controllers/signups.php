<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Signups {

    public function add($Event_ID, $User_ID) {

        $user = $this->loadModel('User');

        $model = $this->loadModel('Signup');
        $model->create(array(
            'Event_ID' => $Event_ID,
            'User_ID' => $User_ID
        ));

        Session::flash('errors', 'You successfully signed up for this event!');
        Redirect::to(URL . 'events/signups');
    }

}
