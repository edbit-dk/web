<?php

class Account extends Controller {

    public function index() {
        // Check if user is logged ind
        $user = $this->loadModel('UserModel');

        // feedback feedback
        if ($user->isLoggedIn()) {
            $feedback[] = Session::flash('feedback');

            //load models      
            $auction_model = $this->loadModel('AuctionModel');
            $auctions = $auction_model->getUserAuctions($user->data()->Users_id);

            $bid_model = $this->loadModel('BidModel');
            $bids = $bid_model->getUserBids($user->data()->Users_id);

            $purchase_model = $this->loadModel('PurchaseModel');
            $purchases = $purchase_model->getUserPurchases($user->data()->Users_id);

            $comment_model = $this->loadModel('CommentModel');
            $comments = $comment_model->getUserComments($user->data()->Users_id);
            // loadModel views
            $this->view('account/index', (object) array(
                        'user' => $user,
                        'feedback' => $feedback,
                        'bids' => $bids,
                        'purchases' => $purchases,
                        'auctions' => $auctions,
                        'comments' => $comments
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function profile() {
        $user = $this->loadModel('UserModel');

        if ($user->isLoggedIn()) {
            // feedback feedback
            $feedback[] = Session::flash('feedback');
            // loadModel views
            $this->view('account/profile', (object) array(
                        'user' => $user,
                        'feedback' => $feedback
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function create($params) {
        $user = $this->loadModel('UserModel');

        if ($user->isLoggedIn()) {
            $feedback = Session::flash('feedback');
            $input[] = Session::flash('inputs');
            $category_model = $this->loadModel('CategoryModel');
            $categories = $category_model->getCategories();
            $this->view('account/create/' . $params, (object) array(
                        'feedback' => (object) $feedback,
                        'inputs' => $input,
                        'categories' => (object) $categories
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function multiupload() {
        $feedback = Session::flash('feedback');
        $input[] = Session::flash('inputs');
        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getCategories();
        $this->view('account/create/multiupload', (object) array(
                    'feedback' => (object) $feedback,
                    'inputs' => $input,
                    'categories' => (object) $categories
                ), 'account');
    }

    public function update($params, $ID) {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $user = $this->loadModel('UserModel');
            $User_ID = $user->data()->Users_id;

            $auction_model = $this->loadModel('AuctionModel');
            $auctions = $auction_model->getAuctionsToUser($ID, $User_ID);

            $image_model = $this->loadModel('ImageModel');
            $images = $image_model->getImagesToAuction($ID);

            $category_model = $this->loadModel('CategoryModel');
            $categories = $category_model->getCategories();

            $feedback[] = Session::flash('feedback');
            $this->view('account/update/' . $params, (object) array(
                        'feedback' => (object) $feedback,
                        'auctions' => (object) $auctions,
                        'images' => (object) $images,
                        'categories' => (object) $categories
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function auctions() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $user = $this->loadModel('UserModel');
            $ID = $user->data()->Users_id;

            $model = $this->loadModel('AuctionModel');
            $auctions = $model->getUserAuctions($ID);

            $feedback[] = Session::flash('feedback');
            $this->view('account/auctions', (object) array(
                        'feedback' => (object) $feedback,
                        'auctions' => (object) $auctions
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function purchases() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $purchase_model = $this->loadModel('PurchaseModel');
            $purchases = $purchase_model->getUserPurchases($user->data()->Users_id);

            $feedback = Session::flash('feedback');
            $this->view('account/purchases', (object) array(
                        'user' => (object) $user,
                        'purchases' => (object) $purchases,
                        'feedback' => (object) $feedback
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function settings() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            $feedback = Session::flash('feedback');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function logout() {
        $model = $this->loadModel('UserModel');
        $user = $model->logout();
        Cache::clear();
        Session::flash('feedback', '<p style="color: green;">You have logged out successfully!</p>');
        Redirect::to(URL . 'login');
    }

}
