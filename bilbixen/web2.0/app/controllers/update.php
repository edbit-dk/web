<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edit
 *
 * @author ThomasElvin
 */
class Update extends Controller {

    public function car() {
        if (Input::exists()) {
            if (!empty(Input::get('file', 'name'))) {
                $model = $this->loadModel('CarModel');

                $car = $model->getCar(Input::get('ID'));
                $file = $car{0}->car_image;
                unlink(UPLOADS_FOLDER . $file);

                $filename = Input::escape(Input::get('file', 'name'));

                $model->update(array(
                    'car_image' => $filename,
                    'car_name' => Input::escape(Input::get('name')),
                    'car_price' => Input::escape(Input::get('price')),
                    'car_year' => Input::escape(Input::get('year')),
                    'car_km' => Input::escape(Input::get('km'))
                        ), Input::get('ID'));

                copy(Input::escape(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $filename);

                Session::flash('errors', '<p style="color: green;">Ad updated successfully!</p>');
                Redirect::to(URL . 'controlpanel/ads');
            }

            $model = $this->loadModel('CarModel');
            $model->update(array(
                'car_name' => Input::escape(Input::get('name')),
                'car_price' => Input::escape(Input::get('price')),
                'car_year' => Input::escape(Input::get('year')),
                'car_km' => Input::escape(Input::get('km'))
                    ), Input::get('ID'));

            Session::flash('errors', '<p style="color: green;">Ad updated successfully!</p>');
            Redirect::to(URL . 'controlpanel/ads');
        }
    }

    public function department() {
        if (Input::exists()) {
            $model = $this->loadModel('DepartmentModel');
            $model->update(array(
                'name' => Input::escape(Input::get('name')),
                'address' => Input::escape(Input::get('address')),
                'latitude' => Input::escape(Input::get('lat')),
                'longitude' => Input::escape(Input::get('lon'))
                    ), Input::get('ID'));
            Session::flash('errors', '<p style="color: green;">Department updated successfully!</p>');
            Redirect::to(URL . 'controlpanel/departments');
        }
    }

    public function comment() {
        if (Input::exists()) {
            if (Input::get('status') == 0) {
                $model = $this->loadModel('CommentModel');
                $model->update(array(
                    'com_approved' => 0
                        ), Input::get('ID'));
                Session::flash('errors', '<p style="color: red;">Comment disapproved successfully!</p>');
                Redirect::to(URL . 'controlpanel/comments');
            } else {
                $model = $this->loadModel('CommentModel');
                $model->update(array(
                    'com_approved' => 1
                        ), Input::get('ID'));
                Session::flash('errors', '<p style="color: green;">Comment approved successfully!</p>');
                Redirect::to(URL . 'controlpanel/comments');
            }
        }
    }

    public function carstatus() {
        if (Input::exists()) {
            if (Input::get('status') == 0) {
                $model = $this->loadModel('CarModel');
                $model->update(array(
                    'car_sold' => 0
                        ), Input::get('ID'));
                Session::flash('errors', '<p style="color: red;">Ad set as not sold successfully!</p>');
                Redirect::to(URL . 'controlpanel/ads');
            } else {
                $model = $this->loadModel('CarModel');
                $model->update(array(
                    'car_sold' => 1
                        ), Input::get('ID'));
                Session::flash('errors', '<p style="color: green;">Ad set as sold successfully!</p>');
                Redirect::to(URL . 'controlpanel/ads');
            }
        }
    }

}
