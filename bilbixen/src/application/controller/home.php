<?php

/**
 * Class Home
 */
class Home extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $cars_model = $this->loadModel('CarsModel');
        $cars = $cars_model->getRandomAllCarsByCategory();


        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

}
