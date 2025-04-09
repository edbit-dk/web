<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Create extends Controller {

    public function car() {
        if (Input::exists()) {

            $filename = Input::escape(Input::get('file', 'name'));

            $model = $this->loadModel('CarModel');
            $model->create(array(
                'car_image' => $filename,
                'car_name' => Input::escape(Input::get('name')),
                'car_price' => Input::escape(Input::get('price')),
                'car_year' => Input::escape(Input::get('year')),
                'car_km' => Input::escape(Input::get('km'))
            ));

            $model->addToCategory(Input::get('category'));

            copy(Input::escape(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $filename);
            Session::flash('errors', '<p style="color: green;">Ad created successfully!</p>');
            Redirect::to(URL . 'controlpanel/ads');
        }
    }

    public function department() {
        if (Input::exists()) {

            $model = $this->loadModel('DepartmentModel');
            $model->create(array(
                'name' => Input::escape(Input::get('name')),
                'address' => Input::escape(Input::get('address')),
                'latitude' => Input::escape(Input::get('lat')),
                'longitude' => Input::escape(Input::get('lon'))
            ));

            Session::flash('errors', '<p style="color: green;">Department created successfully!</p>');
            Redirect::to(URL . 'controlpanel/departments');
        }
    }

    public function comment() {
        if (Input::exists()) {

            $ID = Input::get('ID');

            $model = $this->loadModel('CommentModel');
            $model->create(array(
                'com_name' => Input::escape(Input::get('name')),
                'com_email' => Input::escape(Input::get('email')),
                'com_text' => Input::escape(Input::get('comment')),
                'car_id' => $ID
            ));

            Session::flash('errors', '<p style="color: green;">Comment successfully sent, and will be approved soon by our admins!</p>');
            Redirect::to(URL . 'car/detail/' . $ID);
        }
    }

    public function message() {
        if (Input::exists()) {

            $model = $this->loadModel('ContactModel');
            $model->create(array(
                'message_subject' => Input::escape(Input::get('subject')),
                'message_email' => Input::escape(Input::get('email')),
                'message_text' => Input::escape(Input::get('message'))
            ));

            Session::flash('errors', '<p style="color: green;">Message successfully sent!</p>');
            Redirect::to(URL . 'contact');
        }
    }

}
