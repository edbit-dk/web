<?php

/**
 * Class Contact
 */
class Contact extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/contact/index
     */
    public function index() {
        $errors[] = Session::flash('errors');
        // load views. 
        require TEMPLATES . 'header.php';
        require VIEWS . 'contact/index.php';
        require TEMPLATES . 'footer.php';
    }

    public function addMessage() {

        if (Input::exists()) {
            try {
                $contact_model = $this->loadModel('ContactModel');
                $contact_model->create(array(
                    'message_subject' => Input::escape(Input::get('subject')),
                    'message_text' => Input::escape(Input::get('message')),
                    'message_email' => Input::escape(Input::get('email'))
                ));

                Session::flash('errors', "<p>Besked sendt!</p>");
                Redirect::to(URL . 'contact');
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

}
