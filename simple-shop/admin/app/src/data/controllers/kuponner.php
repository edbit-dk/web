<?php

class Kuponner extends Controller
{

    public
            function page()
    {
        $coupon_model = $this->loadModel('CouponModel');
        $coupons      = $coupon_model->getCoupons();
        $this->adminView('pages/coupons', (object) array(
                    'coupons' => (object) $coupons
        ));
    }

}
