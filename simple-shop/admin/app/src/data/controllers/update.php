<?php

class Update extends Controller
{

    public
            function product()
    {

        $product_model = $this->loadModel('ProductModel');

        $product_model->update(array(
            'Name'             => Input::encode(Input::get('name')),
            'beskrivelse'      => Input::encode(Input::get('description')),
            'Price'            => Input::encode(Input::get('price')),
            'Stock'            => Input::encode(Input::get('stock')),
            'Max'              => Input::encode(Input::get('max')),
            'Min'              => Input::encode(Input::get('min')),
            'fk_kategorier_id' => Input::get('cat')
                ), Input::get('ID'));

        Session::flash('FEEDBACK', '<p style="color: green;">Produkt opdateret!</p>');
        Redirect::to(URL . 'rediger/produkt/' . Input::get('ID'));
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

    public
            function coupon()
    {

        $coupon_model = $this->loadModel('CouponModel');

        $coupon_model->update(array(
            'Name'     => Input::encode(Input::get('name')),
            'Start'    => strtotime(Input::get('start')),
            'End'      => strtotime(Input::get('end')),
            'Code'     => Input::encode(Input::get('code')),
            'Discount' => Input::encode(Input::get('discount')),
                ), Input::get('ID'));

        Session::flash('FEEDBACK', '<p style="color: green;">Kupon opdateret!</p>');
        Redirect::to(URL . 'rediger/kupon/' . Input::get('ID'));
    }

}
