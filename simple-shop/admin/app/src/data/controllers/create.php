<?php

class Create extends Controller
{

    public
            function product()
    {


        $product_model = $this->loadModel('ProductModel');
        $product_model->create(array(
            'Name'             => Input::encode(Input::get('name')),
            'beskrivelse'      => Input::encode(Input::get('description')),
            'Price'            => Input::encode(Input::get('price')),
            'Date'             => time(),
            'Nr'               => Input::encode(Input::get('nr')),
            'Stock'            => Input::encode(Input::get('stock')),
            'Max'              => Input::encode(Input::get('max')),
            'Min'              => Input::encode(Input::get('min')),
            'fk_kategorier_id' => Input::get('cat')
        ));

        if (!empty($_FILES['file']))
        {
            $ext  = str_replace('image/', '.', Input::get('file', 'type'));
            $file = md5(Input::get('file', 'name')) . $ext;

            if (file_exists(UPLOADS_FOLDER . $file))
            {
                $uploaderror = Input::get('file', 'name') . " already exists. ";
                Session::flash('FEEDBACK', '<p style="color: red;">' . $uploaderror . '</p>');
                Redirect::to(URL . 'opret/produkt');
            }
            else
            {
                move_uploaded_file(Input::encode(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);
            }

            $image_model = $this->loadModel('ImageModel');
            $image_model->addToImages($file, Input::get('file', 'name'));



            Session::flash('FEEDBACK', '<p style="color: green;">Produkt oprettet!</p>');
            Redirect::to(URL . 'produkter');
        }
    }

    public
            function category()
    {
        $cat_model = $this->loadModel('CategoryModel');
        $cat_model->create(array(
            'navn' => strtolower(Input::encode(Input::get('name'))),
        ));

        Session::flash('FEEDBACK', '<p style="color: green;">Kategori oprettet!</p>');
        Redirect::to(URL . 'opret/produkt');
    }

    public
            function customer()
    {
        if (Input::exists())
        {
            $validate   = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username'  => array(
                    'required' => true,
                    'min'      => 4,
                    'max'      => 32,
                    'notTaken' => USERS_TABLE
                ),
                'password'  => array(
                    'required'  => true,
                    'min'       => 4,
                    'max'       => 32,
                    'validPass' => Input::get('password')
                ),
                'email'     => array(
                    'required'   => true,
                    'min'        => 4,
                    'max'        => 254,
                    'validEmail' => Input::get('email'),
                    'notTaken'   => USERS_TABLE
                ),
                'firstname' => array(
                    'required' => true,
                    'min'      => 2,
                    'max'      => 64
                ),
                'lastname'  => array(
                    'required' => true,
                    'min'      => 2,
                    'max'      => 64
                ),
                'address'   => array(
                    'required' => true,
                    'min'      => 2,
                    'max'      => 254
                )
            ));

            if ($validation->passed())
            {
                try
                {
                    $user = $this->loadModel('UserModel');
                    $user->create(array(
                        USER_USERNAME  => Input::encode(Input::get('username')),
                        USER_PASSWORD  => Password::hash(Input::encode(Input::get('password'))),
                        USER_EMAIL     => Input::encode(Input::get('email')),
                        USER_FIRSTNAME => Input::encode(Input::get('firstname')),
                        USER_LASTNAME  => Input::encode(Input::get('lastname')),
                        USER_ADDRESS   => Input::encode(Input::get('address'))
                    ));

                    Session::flash('FEEDBACK', '<p style="color: green;" >Du er nu oprettet og kan logge ind!</p>');
                    Cache::clear();
                    Redirect::to(URL . 'log-ind');
                }
                catch (Exception $e)
                {
                    die($e->getMessage());
                }
            }
            else
            {
                foreach ($validation->errors() as $error)
                {
                    $errors[] = $error;
                }

                Session::flash('ERRORS', $errors);
                Cache::clear();
                Redirect::to(URL . 'opret-kunde');
            }
        }
    }

    public
            function coupon()
    {

        $coupon_model = $this->loadModel('CouponModel');
        $coupon_model->create(array(
            'Name'     => Input::encode(Input::get('name')),
            'Start'    => strtotime(Input::get('start')),
            'End'      => strtotime(Input::get('end')),
            'Code'     => Input::encode(Input::get('code')),
            'Discount' => Input::encode(Input::get('discount')),
        ));

        Session::flash('FEEDBACK', '<p style="color: green;">Kupon oprettet!</p>');
        Redirect::to(URL . 'opret/kupon');
    }

}
