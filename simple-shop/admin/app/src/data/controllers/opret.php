<?php

class Opret extends Controller
{

    public
            function produkt()
    {
        $cat_model = $this->loadModel('CategoryModel');
        $cats      = $cat_model->getCategories();
        $this->adminView('pages/create/product', (object) array(
                    'cats' => (object) $cats
        ));
    }

    public
            function bruger()
    {
        require_once VIEWS . 'pages/register.php';
    }

    public
            function kupon()
    {
         $this->adminView('pages/create/coupon');
    }

}
