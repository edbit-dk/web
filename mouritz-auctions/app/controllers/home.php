<?php

class Home extends Controller {

    public function index() {

        $auction_model = $this->loadModel('AuctionModel');
        $ending_auctions = $auction_model->getEndingAuctions(3);

        $newest_auctions = $auction_model->getNewestAuctions(3);

        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getCategories();

        // load views.
        $this->view('home/index', (object) array(
                    'auctions' => (object) $ending_auctions,
                    'newest_auctions' => (object) $newest_auctions,
                    'categories' => (object) $categories
        ));

    }

}
