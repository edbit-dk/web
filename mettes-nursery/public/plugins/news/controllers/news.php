<?php

class News extends Controller {

    public function page($ID = null) {
        //load model
        $menu_model = $this->loadModel('MenuModel');
        $news_model = $this->loadModel('NewsModel');
        $url = 'news';
        if (is_null($ID)) {
            $menus = $menu_model->getMenus();
            $pages = $news_model->getNews();
            $this->view('pages/index', (object) array(
                        'page' => (object) $pages,
                        'menus' => (object) $menus,
                        'url' => (object) $url
            ));
        } else {
            $url = 'page';
            //Load method
            $menus = $menu_model->getMenus();
            $page = $news_model->getNewsByID($ID);

            if (!$page) {
                Redirect::to(URL . 'error/404');
            } else {
                if ($page[0]->PHP != 1) {
                    $this->view('pages/index', (object) array(
                                'menus' => (object) $menus,
                                'page' => (object) $page,
                                'url' => (object) $url
                    ));
                } else {
                    eval($page[0]->Content);
                    $this->view('pages/index', (object) array(
                                'menus' => (object) $menus,
                                'page' => (object) $page,
                                'url' => (object) $url
                    ));
                }
            }
        }
    }

}
