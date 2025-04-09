<?php

class Delete extends Controller {

    public function product() {
        //delete from images   
        $image_model = $this->loadModel('ImageModel');
        $images = $image_model->getImagesToProduct(Input::get('ID'));
        foreach ($images as $image) {
            unlink(UPLOADS_FOLDER . $image->URL);
        }

        $image_model->deleteProductImages(Input::get('ID'));

        $product_model = $this->loadModel('ProductModel');
        $product_model->delete(Input::get('ID'));

        Session::flash('FEEDBACK', '<p style="color: green;">Produkt slettet!</p>');
        Redirect::to(URL . 'produkter');
    }

    public function customer() {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getCustomerOrdersID(Input::get('ID'));

        foreach ($orders as $order) {
            $order_model->deleteCustomerOrderDetails($order->ID);
        }

        $order_model->deleteCustomerOrders(Input::get('ID'));

        $user_model = $this->loadModel('UserModel');
        $user_model->delete(Input::get('ID'));

        Session::flash('FEEDBACK', '<p style="color: green;">Kunde slettet!</p>');
        Redirect::to(URL . 'kunder');
    }

    public function image() {
        $image_model = $this->loadModel('ImageModel');
        $images = $image_model->getImage(Input::get('image'));

        foreach ($images as $image) {
            unlink(UPLOADS_FOLDER . $image->URL);
        }


        $image_model->delete(Input::get('image'));

        Session::flash('FEEDBACK', '<p style="color: green;">Billede slettet!</p>');
        Redirect::to(URL . 'rediger/produkt/' . Input::get('product'));
    }

    public function message() {
        $message_model = $this->loadModel('MessageModel');
        $message_model->delete(Input::get('ID'));
        Session::flash('FEEDBACK', '<p style="color: green;">Besked slettet!</p>');
        Redirect::to(URL . 'beskeder');
    }

    public function order() {
        $order_model = $this->loadModel('OrderModel');
        $order_model->deleteOrder(Input::get('ID'));
        $order_model->deleteOrderDetails(Input::get('ID'));
        Session::flash('FEEDBACK', '<p style="color: green;">Ordrer slettet!</p>');
        Redirect::to(URL . 'ordrer');
    }

    public function cache() {
        Cache::clear();
        Session::flash('FEEDBACK', '<p style="color: green;">Cache slettet!</p>');
        Redirect::to(URL);
    }

}
