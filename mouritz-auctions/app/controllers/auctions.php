<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auctions
 *
 * @author ThomasElvin
 */
class Auctions extends Controller {

    public function index() {
        // load model
        $auction_model = $this->loadModel('AuctionModel');
        $auctions = $auction_model->getAuctions();

        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getCategories();

        // load views.
        $this->view('auctions/index', (object) array(
                    'auctions' => (object) $auctions,
                    'categories' => (object) $categories
        ));

    }

    public function search() {
        // load model

        $auction_model = $this->loadModel('AuctionModel');

        if (null !== Input::get('keywords')) {
            $searchtearms = Input::get('keywords');
        } else {
            $searchtearms = Input::get('category');
        }


        $results = $auction_model->search($searchtearms);
        if (empty($searchtearms)) {
            $feedback[] = "<p>No searchtearms given! Showing all results.</p>";
        } else {

            if (empty($results)) {
                $feedback[] = "<p>Sorry. No results where found for your search on category or keyword(s) '$searchtearms'</p>";
            } else {
                $feedback[] = "<p>Your search results for search on category ID or keyword(s) '$searchtearms'</p>";
            }
        }
        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getCategories();

        // load views.
        $this->view('auctions/index', (object) array(
                    'auctions' => (object) $results,
                    'categories' => (object) $categories,
                    'feedback' => (object) $feedback
        ));
    }

}
