<?php

class Produkter extends Controller {

    public function page() {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getProducts();

        $this->adminView('pages/products', (object) array(
                    'products' => (object) $products
        ));
    }

}
