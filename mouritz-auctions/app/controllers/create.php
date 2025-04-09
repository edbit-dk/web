<?php

/**
 * This class extends the main class Controller, and functions as a gateway for
 * "creating things". Thereby it is the class posts and such are send to for
 * handeling different creating functions.
 *
 * @author ThomasElvin
 */
class Create extends Controller {

    public function index() {
        if (Input::exists()) {
            
        }
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
                    'required' => 'true',
                    'min' => 1
                ),
                BUY_PRICE => array(
                    'required' => 'true',
                    'min' => 1
            )));

            $imageValidate = $this->loadModel('ValidateModel');
            $imageValidation = $imageValidate->checkImage($_FILES, GLOBAL_FILE, array(
                GLOBAL_NAME => array(
                    'extensions' => unserialize(ALLOWED_EXTENSIONS)
                )
            ));

            if ($validation->passed()) {
                if ($imageValidation->passed()) {

                    try {
                        $ext = str_replace('image/', '.', Input::get('file', 'type'));
                        $file = RANDOM_NAME . $ext;

                        if (file_exists(UPLOADS_FOLDER . $file)) {
                            $uploaderror = $file . " already exists. ";
                            Session::flash('feedback', '<p style="color: red;">' . $uploaderror . '</p>');
                            Session::flash('inputs', $_POST);
                            Redirect::to(URL . 'account/create/auction');
                        } else {
                            move_uploaded_file(Input::encode(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);
                        }

                        $date = date("Y-m-d", strtotime(Input::get(END_DATE))) . ' ' . Input::get(END_TIME);

                        $auction_model = $this->loadModel('AuctionModel');
                        $auction_model->create(array(
                            AUCTION_TITLE => Input::encode(Input::get(AUCTION_TITLE)),
                            'start_date' => LOCAL_TIMESTAMP,
                            END_DATE => $date,
                            AUCTION_DESCRIPTION => Input::encode(Input::get('description')),
                            START_PRICE => Input::encode(Input::get(START_PRICE)),
                            BUY_PRICE => Input::encode(Input::get(BUY_PRICE)),
                            'category_id' => Input::encode(Input::get('category')),
                            'user_id' => Input::encode(Input::get('user'))
                        ));

                        $image_model = $this->loadModel('ImageModel');
                        $image_model->addToImages($file, Input::get('file', 'name'), Input::get('user'));


                        Session::flash('feedback', '<p style="color: green;">Auction created successfully!</p>');
                        Redirect::to(URL . 'account/auctions');
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                } else {
                    foreach ($imageValidation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('feedback', $errors);
                    Session::flash('inputs', $_POST);
                    Redirect::to(URL . 'account/create/auction');
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Session::flash('inputs', $_POST);
                Redirect::to(URL . 'account/create/auction');
            }
        }

        Redirect::to(URL . 'error/404');
    }

    public function bid() {
        if (Input::exists()) {
            if (Input::get('bid') <= Input::get('max_bid') ||
                    Input::get('bid') < Input::get('start_price')) {

                Session::flash('feedback', '<p style="color: red;">Bid must be higher than last bid!</p>');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            } elseif (Input::get('bid') >= Input::get('buy_price')) {

                $auction_model = $this->loadModel('AuctionModel');
                $auction_model->update(array(
                    'status' => 1,
                        ), Input::get('ID'));

                $purchase_model = $this->loadModel('PurchaseModel');
                $purchase_model->create(array(
                    'auction_id' => Input::get('ID'),
                    'user_id' => Input::get('user'),
                    'amount' => Input::get('bid'),
                ));

                Session::flash('feedback', '<p style="color: green;">'
                        . 'Auction purchased successfully! Go to <a href="' . URL . 'account/purchases">my purchases</a></p>');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            } else {
                $comment_model = $this->loadModel('BidModel');
                $comment_model->create(array(
                    'user_id' => Input::get('user'),
                    'auction_id' => Input::get('ID'),
                    'amount' => Input::get('bid')
                ));
                Session::flash('feedback', '<p style="color: green;">Bid created successfully!</p>');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function comment() {
        if (Input::exists()) {

            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'comment' => array(
                    'required' => true,
                    'min' => 30,
                    'max' => 500
            )));

            if ($validation->passed()) {
                $comment_model = $this->loadModel('CommentModel');
                $comment_model->create(array(
                    'comment' => Input::encode(Input::get('comment')),
                    'user_id' => Input::get('user'),
                    'auction_id' => Input::get('ID'),
                    'date' => date('Y-m-d H:i:s')
                ));

                Session::flash('feedback', '<p style="color: green;">Comment created successfully!</p>');
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }

                Session::flash('feedback', $errors);
                Session::flash('inputs', $_POST);
                Redirect::to(URL . 'details/auction/' . Input::get('ID'));
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function user() {
        if (Input::exists()) {
            
        }
        Redirect::to(URL . 'error/404');
    }

}
