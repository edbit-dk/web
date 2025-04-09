<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Data {

    public function index() {
        $auction_model = $this->loadModel('AuctionModel');
        $auctions = $auction_model->getAuctions();
        // load views.
        $this->view('data/index', (object) array(
                    'auctions' => (object) $auctions
        ));
    }

}
