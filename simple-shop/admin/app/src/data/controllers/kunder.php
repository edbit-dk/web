<?php

class Kunder extends Controller {

    public function page() {
        $user_model = $this->loadModel('UserModel');
        $customers = $user_model->getUsers();
        $this->adminView('pages/customers', (object) array(
                    'customers' => (object) $customers
        ));
    }

    public function detaljer($ID) {
        $user_model = $this->loadModel('UserModel');
        $customers = $user_model->getUser($ID);
        $this->adminView('pages/customers', (object) array(
                    'customers' => (object) $customers
        ));
    }

}
