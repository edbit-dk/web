<?php

class Index extends Controller {

    public function page() {
        $user = $this->loadModel('UserModel');
        $this->adminView('pages/index', (object) array(
                    'user' => (object) $user
        ));
    }

}
