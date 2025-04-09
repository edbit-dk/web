<?php

/**
 * Description of delete
 *
 * @author ThomasElvin
 */
class Delete extends Controller {

    public function index() {
        Redirect::to(URL . 'error/404');
    }

    public function bid() {
        if (Input::exists()) {
            $ID = Input::get('id');
            //delete from bids
            $bids_model = $this->loadModel('BidsModel');
            $bids_model->delete($ID);

            $user = $this->loadModel('UserModel');
            if ($user->isLoggedIn() && $user->role('Admin')) {
                Redirect::to(URL . 'controlpanel/bids');
            } else {
                Redirect::to(URL . 'account/bids');
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function comment() {
        if (Input::exists()) {
            $ID = Input::get('id');

            $model = $this->loadModel('CommentModel');
            $model->delete($ID);

            $user = $this->loadModel('UserModel');
            if ($user->isLoggedIn() && $user->role('Admin')) {
                Session::flash('feedback', '<p style="color: green;">Comment deleted successfully!</p>');
                Redirect::to(URL . 'controlpanel/comments');
            } else {
                Session::flash('feedback', '<p style="color: green;">Comment deleted successfully!</p>');
                Redirect::to(URL . 'details/auction/' . $ID);
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function user() {
        if (Input::exists()) {
            $ID = Input::get('id');

            //delete auction
            $auction_model = $this->loadModel('AuctionModel');
            $auction_model->deleteUserAuctions($ID);

            //delete from comments
            $comment_model = $this->loadModel('CommentModel');
            $comment_model->deleteUserComments($ID);

            //delete from bids
            $bids_model = $this->loadModel('BidModel');
            $bids_model->deleteUserBids($ID);
            
              //delete from purchases
            $purchase_model = $this->loadModel('PurchaseModel');
            $purchase_model->deleteUserPurchases($ID);

            //delete from images  
            $image_model = $this->loadModel('ImageModel');
            $images = $image_model->getUserImages($ID);
            foreach ($images as $image) {
                unlink(UPLOADS_FOLDER . $image->url);
            }
            $image_model->deleteUserImages($ID);

            $user_model = $this->loadModel('UserModel');
            $user_model->delete($ID);

            $user = $this->loadModel('UserModel');
            if ($user->isLoggedIn() && $user->role('Admin')) {
                Session::flash('feedback', '<p style="color: green;">User deleted successfully!</p>');
                Redirect::to(URL . 'controlpanel');
            } else {
                Session::flash('feedback', '<p style="color: green;">User deleted successfully!</p>');
                Redirect::to(URL . 'login');
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function image() {
        if (Input::exists()) {
            $model = $this->loadModel('ImageModel');

            $model->delete(Input::get('id'));
            unlink(UPLOADS_FOLDER . Input::get('url'));

            $user = $this->loadModel('UserModel');
            if ($user->isLoggedIn() && $user->role('Admin')) {
                Session::flash('feedback', '<p style="color: green;">Image deleted successfully!</p>');
                Redirect::to(URL . 'controlpanel/images');
            } else {
                Session::flash('feedback', '<p style="color: green;">Image deleted successfully!</p>');
                Redirect::to(URL . 'account/update/auction/' . Input::get('ID'));
            }
        }
        Redirect::to(URL . 'error/404');
    }

    public function auction() {
        if (Input::exists()) {
            $ID = Input::get('id');
            //delete auction
            $auction_model = $this->loadModel('AuctionModel');
            $auction_model->delete($ID);

            //delete from comments
            $comment_model = $this->loadModel('CommentModel');
            $comment_model->delete($ID);

            //delete from comments
            $bids_model = $this->loadModel('BidModel');
            $bids_model->delete($ID);
            
              //delete from purchases
            $purchase_model = $this->loadModel('PurchaseModel');
            $purchase_model->delete($ID);

            //delete from images  
            $image_model = $this->loadModel('ImageModel');
            $images = $image_model->getImagesToAuction($ID);
            foreach ($images as $image) {
                unlink(UPLOADS_FOLDER . $image->url);
            }
            $image_model->delete($ID);

            $user = $this->loadModel('UserModel');
            if ($user->isLoggedIn() && $user->role('Admin')) {
                Session::flash('feedback', '<p style="color: green;">Auction deleted successfully!</p>');
                Redirect::to(URL . 'controlpanel/auctions');
            } else {
                Session::flash('feedback', '<p style="color: green;">Auction deleted successfully!</p>');
                Redirect::to(URL . 'account/auctions');
            }
        }

        Redirect::to(URL . 'error/404');
    }

}
