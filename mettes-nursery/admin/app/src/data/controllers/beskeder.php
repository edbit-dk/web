<?php

class Beskeder extends Controller {

    public function page() {
        $message_model = $this->loadModel('MessageModel');
        $messages = $message_model->getMessages();
        $this->adminView('pages/messages', (object) array(
                    'messages' => (object) $messages
        ));
    }

}
