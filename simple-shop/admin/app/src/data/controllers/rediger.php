<?php

class Rediger extends Controller
{

    public
            function produkt($ID)
    {
        $product_model = $this->loadModel('ProductModel');
        $product       = $product_model->getProduct($ID);

        $cat_model = $this->loadModel('CategoryModel');
        $cats      = $cat_model->getCategories();

        $img_model = $this->loadModel('ImageModel');
        $images    = $img_model->getImagesToProduct($ID);

        $this->adminView('pages/edit/product', (object) array(
                    'product' => (object) $product,
                    'cats'    => (object) $cats,
                    'images'  => (object) $images
        ));
    }

    public
            function kupon($ID)
    {
        $coupon_model = $this->loadModel('CouponModel');
        $coupon       = $coupon_model->getCoupon($ID);
        $this->adminView('pages/edit/coupon', (object) array(
                    'coupon' => (object) $coupon
        ));
    }

}
