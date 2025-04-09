<?php

class Ordrer extends Controller {

    public function page() {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getOrders();

        $product_model = $this->loadModel('StatusModel');
        $options = $product_model->getStatusOptions();

        $this->adminView('pages/orders', (object) array(
                    'orders' => (object) $orders,
                    'options' => (object) $options
        ));
    }

    public function detaljer($ID) {
        $product_model = $this->loadModel('OrderModel');
        $orders = $product_model->getProductsToOrder($ID);

        $this->adminView('pages/details/order', (object) array(
                    'orders' => (object) $orders
        ));
    }

}
