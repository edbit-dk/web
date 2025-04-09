<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of details
 *
 * @author ThomasElvin
 */
class Details extends Controller {

    public function auction($ID) {
        // load model
        $user = $this->loadModel('UserModel');

        // feedback feedback
        if ($user->isLoggedIn()) {
            $auction_model = $this->loadModel('AuctionModel');
            $auction = $auction_model->getAuction($ID);

            $comment_model = $this->loadModel('CommentModel');
            $comments = $comment_model->getCommentsToAuction($ID);

            $image_model = $this->loadModel('ImageModel');
            $images = $image_model->getImagesToAuction($ID);

            $bid_model = $this->loadModel('BidModel');
            $bids = $bid_model->getBidsToAuction($ID);

            $feedback = Session::flash('feedback');
            $inputs[] = Session::flash('inputs');

            // load views.
            $this->view('details/auction', (object) array(
                        'auction' => (object) $auction,
                        'comments' => (object) $comments,
                        'images' => (object) $images,
                        'bids' => (object) $bids,
                        'inputs' => (object) $inputs,
                        'feedback' => (object) $feedback
            ));
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function user($ID) {
        $user_model = $this->loadModel('UserModel');
        $user = $user_model->getUser($ID);

        $auction_model = $this->loadModel('AuctionModel');
        $auctions = $auction_model->getUserAuctions($ID);

        // load views.
        $this->view('details/user', (object) array(
                    'user' => (object) $user,
                    'auctions' => (object) $auctions
        ));
    }

}
