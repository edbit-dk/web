<?php

class Update extends Controller
{

    public
            function product()
    {
        if (!empty($_POST['new-cat']))
        {
            $cat_model = $this->loadModel('CategoryModel');
            $cat_model->create(array(
                'Name'  => strtolower(Input::encode(Input::get('new-cat'))),
                'Title' => Input::encode(Input::get('new-cat'))
            ));

            $ID            = $cat_model->getLastCategoryID();
            $product_model = $this->loadModel('ProductModel');

            $product_model->update(array(
                'Name'        => Input::encode(Input::get('name')),
                'Description' => Input::encode(Input::get('description')),
                'Price'       => Input::encode(Input::get('price')),
                'Type'        => Input::encode(Input::get('type')),
                'Time'        => Input::encode(Input::get('time')),
                'Nr'          => Input::encode(Input::get('nr')),
                'Stock'       => Input::encode(Input::get('stock')),
                'Max'         => Input::encode(Input::get('max')),
                'Min'         => Input::encode(Input::get('min')),
                'Category_ID' => $ID
                    ), Input::get('ID'));

            if (!$_FILES['file']['name'] == '')
            {
                $ext  = str_replace('image/', '.', Input::get('file', 'type'));
                $file = md5(Input::get('file', 'name')) . $ext;

                if (file_exists(UPLOADS_FOLDER . $file))
                {
                    $uploaderror = Input::get('file', 'name') . " already exists. ";
                    Session::flash('FEEDBACK', '<p style="color: red;">' . $uploaderror . '</p>');
                    Redirect::to(URL . 'rediger/produkt/' . Input::get('ID'));
                }
                else
                {
                    move_uploaded_file(Input::encode(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);
                }
                $image_model = $this->loadModel('ImageModel');
                $image_model->addToImages($file, Input::get('file', 'name'), Input::get('ID'));
            }

            Session::flash('FEEDBACK', '<p style="color: green;">Produkt opdateret!</p>');
            Redirect::to(URL . 'rediger/produkt/' . Input::get('ID'));
        }
        else
        {
            $product_model = $this->loadModel('ProductModel');

            $product_model->update(array(
                'Name'        => Input::encode(Input::get('name')),
                'Description' => Input::encode(Input::get('description')),
                'Price'       => Input::encode(Input::get('price')),
                'Type'        => Input::encode(Input::get('type')),
                'Time'        => Input::encode(Input::get('time')),
                'Nr'          => Input::encode(Input::get('nr')),
                'Stock'       => Input::encode(Input::get('stock')),
                'Max'         => Input::encode(Input::get('max')),
                'Min'         => Input::encode(Input::get('min')),
                'Category_ID' => Input::get('cat')
                    ), Input::get('ID'));

             if (!$_FILES['file']['name'] == '')
            {
                $ext  = str_replace('image/', '.', Input::get('file', 'type'));
                $file = md5(Input::get('file', 'name')) . $ext;

                if (file_exists(UPLOADS_FOLDER . $file))
                {
                    $uploaderror = Input::get('file', 'name') . " already exists. ";
                    Session::flash('FEEDBACK', '<p style="color: red;">' . $uploaderror . '</p>');
                    Redirect::to(URL . 'rediger/produkt/' . Input::get('ID'));
                }
                else
                {
                    move_uploaded_file(Input::encode(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);
                }

                $image_model = $this->loadModel('ImageModel');
                $image_model->addToImages($file, Input::get('file', 'name'), Input::get('ID'));
            }

            Session::flash('FEEDBACK', '<p style="color: green;">Produkt opdateret!</p>');
            Redirect::to(URL . 'rediger/produkt/' . Input::get('ID'));
        }
    }

    public
            function status()
    {
        $order_model = $this->loadModel('OrderModel');
        $order_model->update(array(
            'Status_ID' => Input::get('option')
                ), Input::get('ID'));

        Session::flash('FEEDBACK', '<p style="color: green;">Ordrer status opdateret!</p>');
        Redirect::to(URL . 'ordrer');
    }

}
