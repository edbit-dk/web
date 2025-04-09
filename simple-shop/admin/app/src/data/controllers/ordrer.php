<?php

class Ordrer extends Controller
{

    public
            function page()
    {
        $order_model = $this->loadModel('OrderModel');
        $orders      = $order_model->getOrders();

        $status_model = $this->loadModel('StatusModel');
        $status       = $status_model->getStatusOptions();

        $this->adminView('pages/orders', (object) array(
                    'orders'  => (object) $orders,
                    'status' => (object) $status
        ));
    }

    public
            function detaljer($ID)
    {
        $order_model = $this->loadModel('OrderModel');
        $orders      = $order_model->getProductsToOrder($ID);
        $total       = $order_model->getOrderTotal($ID);

        $this->adminView('pages/details/order', (object) array(
                    'orders' => (object) $orders,
                    'total'  => (object) $total,
        ));
    }

}
