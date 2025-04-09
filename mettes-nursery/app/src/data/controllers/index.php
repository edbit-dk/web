<?php

class Index extends Controller {

    public function ID() {
        //Load model
        $page_model = $this->loadModel('PageModel');
        $menu_model = $this->loadModel('MenuModel');
        if (empty($_GET['url'])) {
            $standard_page = $page_model->getStandardPage();
            $page = $page_model->getPageByID($standard_page[0]->ID);
            $this->view('page/index', (object) array(
                        'page' => (object) $page,
                        'menus' => (object) $menus
            ));
        } else {

            //Load method
            $pages = $page_model->getPageByID($ID);

            if (!$pages) {
                Redirect::to(URL . 'error/404');
            } else {
                //Load view
                if ($page[0]->PHP != 1) {
                    $menus = $menu_model->getMenus();
                    $this->view('page/index', (object) array(
                                'page' => (object) $page,
                                'menus' => (object) $menus
                    ));
                } else {
                    eval($page[0]->Content);
                }
            }
        }
    }

    public function page($url = 'index', $ID = null) {

        //load model
        $feedback[] = Session::flash('FEEDBACK');
        $menu_model = $this->loadModel('MenuModel');
        $page_model = $this->loadModel('PageModel');
        $category_model = $this->loadModel('CategoryModel');
        $product_model = $this->loadModel('ProductModel');
        $popular_products = $product_model->getPopularProducts(3);

        $url = filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL);
        if (empty($_GET['url'])) {
            $menus = $menu_model->getMenus();
            $standard_page = $page_model->getStandardPage();
            $page = $page_model->getPageByID($standard_page[0]->ID);
            $user = $this->loadModel('UserModel');
            $this->view('pages/index', (object) array(
                        'page' => (object) $page,
                        'menus' => (object) $menus,
                        'url' => (object) $url,
                        'popular' => (object) $popular_products,
                        'feedback' => (object) $feedback
            ));
        } else {
            //Load method

            $menus = $menu_model->getMenus();
            $page = $page_model->getPageByName(filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            if (!$page && is_numeric($ID)) {
                $page = $page_model->getPageByName(filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
            }
            if (!$page) {
                Redirect::to(URL . 'error/404');
            } else {
                $categories = $category_model->getCategories();
                $product_categories = $product_model->getProduct($ID);

                $this->view('pages/index', (object) array(
                            'menus' => (object) $menus,
                            'page' => (object) $page,
                            'url' => (object) $url,
                            'categories' => (object) $categories,
                            'product_categories' => (object) $product_categories,
                            'popular' => (object) $popular_products,
                            'feedback' => (object) $feedback
                ));
            }
        }
    }

}
