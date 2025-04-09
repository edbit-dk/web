<?php

class Test extends Controller {

    public function code() {

        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $key . $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
        }

        $file_ext = explode('.', $_FILES['files']['name'][$key]);
        $file_ext = end($file_ext);
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$key])));
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed";
        }

        if ($_FILES['files']['size'][$key] > 2097152) {
            $errors[] = 'File size must be less tham 2 MB';
        }

        if (is_dir($dir) == false) {
            move_uploaded_file($file_tmp, UPLOADS_FOLDER . $file_name);
        }

        if (is_dir($dir) == false) {
            mkdir("$dir", 0700);
        }

        #Check if a file of same name exist
        if (is_dir("emp_data/$codes/" . $file_name) == false) {
            move_uploaded_file($file_tmp, "$desired_dir/" . $file_name);
        } else {
            rename($file_tmp, "$desired_dir/" . $file_name);

            # rename can move the file along with renaming it
        }
    }

    public function multiupload() {
        if (isset($_FILES['files'])) {
            $errors = array();
            foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
                $file_name = $key . $_FILES['files']['name'][$key];
                $file_size = $_FILES['files']['size'][$key];
                $file_tmp = $_FILES['files']['tmp_name'][$key];
                $file_type = $_FILES['files']['type'][$key];

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be less than 2 MB';
                }

                //$query = "INSERT into upload_data (`USER_ID`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$user_id','$file_name','$file_size','$file_type'); ";
                $upload_dir = "username";

                if (empty($errors) == true) {
                    if (is_dir($upload_dir) == false) {
                        mkdir("$upload_dir", 0700);  // Create directory if it does not exist
                    }
                    if (is_dir("$upload_dir/" . $file_name) == false) {
                        move_uploaded_file($file_tmp, "$upload_dir/" . $file_name);
                    } else {         //rename the file if another one exist
                        $new_dir = "$upload_dir/" . $file_name . time();
                        rename($file_tmp, $new_dir);
                    }
                    // mysql_query($query);
                } else {
                    print_r($errors);
                }
            }



            if (empty($error)) {
                echo "Success";
            }
        }
    }

    public function upload() {
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
            )));

            $imageValidate = $this->loadModel('ValidateModel');
            $imageValidation = $imageValidate->checkImage($_FILES, GLOBAL_FILE, array(
                GLOBAL_NAME => array(
                    'extensions' => array('jpg', 'jpeg', 'png')
                )
            ));

            if ($imageValidation->passed()) {
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
            } else {
                foreach ($imageValidation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Session::flash('inputs', $_POST);
                Redirect::to(URL . 'account/create/auction');
            }

            if ($validation->passed()) {
                try {


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

}
