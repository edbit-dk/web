<?php

/**
 * Class Contact
 */
class Contact extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/contact/index
     */
    public function index()
    {
        // load views. 
        require 'application/views/_templates/header.php';
        require 'application/views/contact/index.php';
        require 'application/views/_templates/footer.php';

    }
    
        public function addMessage()
    {

        if (isset($_POST["submit_add_message"])) {
            $contact_model = $this->loadModel('ContactModel');
            $contact_model->addMessage($_POST["message"], $_POST["email"],  $_POST["subject"]);
        }

        // where to go after message has been added
        header('location: ' . URL . 'contact/index');
       
    }

}
