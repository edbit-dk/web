<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update
 *
 * @author ThomasElvin
 */
class Update extends Controller {

    public function index() {
        Redirect::to(URL . 'error/404');
    }

    public function auction() {
        if (Input::exists()) {

            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                AUCTION_TITLE => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 254
                ),
                END_DATE => array(
                    'required' => true
                ),
                END_TIME => array(
                    'required' => true
                ),
                AUCTION_DESCRIPTION => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 500
                ),
                START_PRICE => array(
                    'required' => 'true'
                ),
                BUY_PRICE => array(
                    'required' => 'true'
                )
            ));
            $imageValidate = $this->loadModel('ValidateModel');
            $imageValidation = $imageValidate->checkImage($_FILES, GLOBAL_FILE, array(
                GLOBAL_NAME => array(
                    'extensions' => array('jpg', 'jpeg', 'png')
                )
            ));

            if (!empty(Input::get('file', 'name'))) {

                $ext = str_replace('image/', '.', Input::get('file', 'type'));
                $file = RANDOM_NAME . $ext;

                if (file_exists(UPLOADS_FOLDER . $file)) {
                    $uploaderror = $file . " already exists. ";
                    Session::flash('feedback', '<p style="color: red;">' . $uploaderror . '</p>');
                    Redirect::to(URL . 'account/update/auction/' . Input::get('ID'));
                } else {
                    copy(Input::encode(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);

                    $image_model = $this->loadModel('ImageModel');
                    $image_model->addImagesToAuction($file, Input::get('file', 'name'), Input::get('ID'), Input::get('user'));
                }
            }

            //Check date
            if (empty(Input::get(END_DATE)) OR empty(Input::get(END_TIME))) {
                $end_date = Input::get('date');
            } else {
                $end_date = date("Y-m-d", strtotime(Input::get('end_date'))) . ' ' . Input::get('end_time');
            }

            if (empty(Input::get('category'))) {
                $category = Input::get('current_category');
            } else {
                $category = Input::get('category');
            }

            $auction_model = $this->loadModel('AuctionModel');
            $auction_model->update(array(
                'title' => Input::encode(Input::get('title')),
                'end_date' => $end_date,
                'description' => Input::encode(Input::get('description')),
                'start_price' => Input::encode(Input::get('start_price')),
                'buy_price' => Input::encode(Input::get('buy_price')),
                'category_id' => $category,
                'user_id' => Input::get('user')
                    ), Input::get('ID'));

            Session::flash('feedback', '<p style="color: green;">Auction updated successfully!</p>');
            Redirect::to(URL . 'account/update/auction/' . Input::get('ID'));
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

    public function status() {
        if (Input::exists()) {
            $auction_model = $this->loadModel('AuctionModel');
            $auction_model->update(array(
                'status' => 1,
                    ), Input::get('ID'));

            $purchase_model = $this->loadModel('PurchaseModel');
            $purchase_model->create(array(
                'auction_id' => Input::get('ID'),
                'user_id' => Input::get('user'),
                'amount' => Input::get('amount'),
            ));

            Session::flash('feedback', '<p style="color: green;">'
                    . 'Auction purchased successfully! Go to <a href="' . URL . 'account/purchases">my purchases</a></p>');
            Redirect::to(URL . 'details/auction/' . Input::get('ID'));
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

    public function user() {
        if (Input::exists()) {
            
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

    public function ended() {
        if (Input::exists()) {
            if (!empty(Input::get('user'))) {
                $auction_model = $this->loadModel('AuctionModel');
                $auction_model->update(array(
                    'status' => 1,
                        ), Input::get('ID'));

                $purchase_model = $this->loadModel('PurchaseModel');
                $purchase_model->create(array(
                    'auction_id' => Input::get('ID'),
                    'user_id' => Input::get('user'),
                    'amount' => Input::get('amount'),
                ));

                Session::flash('feedback', '<p style="color: green;">'
                        . 'Auction ended! Go to <a href="' . URL . 'account/purchases">my purchases</a></p>');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            } else {
                $auction_model = $this->loadModel('AuctionModel');
                $auction_model->update(array(
                    'end_date' => date("Y-m-d H:i:s", strtotime('+1 hours'))
                        ), Input::get('ID'));
                
                Session::flash('feedback', '<p style="color: green;">'
                        . 'Auction prolonged!');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            }
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

    public function profile() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                USER_FIRSTNAME => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 64
                ),
                USER_LASTNAME => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 64
                ),
                USER_EMAIL => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 254,
                    'validEmail' => Input::encode(Input::get('email'))
                )
            ));
            if ($validation->passed()) {
                try {
                    $user = $this->loadModel('UserModel');
                    $user->update(array(
                        USER_EMAIL => Input::encode(Input::get('email')),
                        USER_FIRSTNAME => Input::encode(Input::get('firstname')),
                        USER_LASTNAME => Input::encode(Input::get('lastname'))
                    ));
                    Session::flash('feedback', 'Your details have been updated!');
                    Redirect::to(URL . 'account/profile');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                //Session::flash('input', $_POST);
                Redirect::to(URL . 'account/settings');
            }
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

    public function password() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'current' => array(
                    'required' => true,
                    'min' => 8,
                    'max' => 32
                ),
                'new' => array(
                    'required' => true,
                    'min' => 8,
                    'max' => 32,
                    'matches' => 'check'
                ),
                'check' => array(
                    'required' => true
                )
            ));

            if ($validation->passed()) {
                $password = Input::encode(Input::get('current'));
                $user = $this->loadModel('UserModel');

                $_Password = USER_PASSWORD;

                if (!Password::verify($password, $user->data()->$_Password)) {
                    Session::flash('feedback', '<p style="color: red;">Your current password is wrong!</p>');
                    Redirect::to(URL . 'account/settings');
                } else {
                    $user->update(array(
                        USER_PASSWORD => Password::hash(Input::encode(Input::get('new')))
                    ));

                    Session::flash('feedback', '<p style="color: green;">Your password has been updated successfully!</p>');
                    Redirect::to(URL . 'account/settings');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                //Session::flash('data', $_POST);
                Redirect::to(URL . 'account/settings');
            }
        } else {
            Redirect::to(URL . 'error/404');
        }
    }

}
